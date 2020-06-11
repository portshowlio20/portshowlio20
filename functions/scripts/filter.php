<?php

/**
 * Handle filter AJAX request
 */

add_action('wp_enqueue_scripts', 'add_filter_script');
function add_filter_script()
{
  wp_enqueue_script(
    'filter', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/index/filter.js', // this is the location of your script file
    ['jquery', 'canvas_noise'], // this array lists the scripts upon which your script depends
    null,
    true
  );

  wp_localize_script('filter', 'wp_ajax', [
    'ajax_url' => admin_url('admin-ajax.php'),
    'security' => wp_create_nonce('wp-ajax-nonce'),
  ]);
}

add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax()
{
  // 1. first things first, if you're not legit, we bail
  if (!check_ajax_referer('wp-ajax-nonce', 'security', false)) {
    wp_send_json_error('Invalid security token sent.');
    wp_die();
  }

  // 2. collect & data
  $toggle = $_POST['toggle'];
  $filters = $_POST['filters'];

  // 3. prepare args for queries (works filters, students filters)
  $works_args = [
    'post_type' => 'projects',
    'category__not_in' => 1,
    'orderby' => 'rand',
    'post_status' => 'publish',
    'posts_per_page' => -1,
  ];

  if (isset($filters)) {
    // convert array of strings to an array of integers
    $filters = array_map('intval', $filters);
    $works_args['tax_query'] = [
      ['taxonomy' => 'category', 'field' => 'term_id', 'terms' => $filters],
    ];
  }

  //https://wordpress.stackexchange.com/questions/199627/how-would-i-format-a-query-that-depends-on-post-parent-taxonomy
  // make array of all child categorie IDs from the $filter THEN check against THAT array
  // 3b. students filters
  if (isset($filters)) {
    $temp_parent_and_child_cat_array = [];
    foreach ($filters as $filter) {
      $child_cats = get_categories(['parent' => $filter]);

      array_push($temp_parent_and_child_cat_array, $filter);

      foreach ($child_cats as $child) {
        array_push($temp_parent_and_child_cat_array, $child->term_id);
      }
    }

    $meta_query_array = ['relation' => 'OR'];
    foreach ($temp_parent_and_child_cat_array as $filter) {
      $meta_query_array[] = [
        'key' => 'focus',
        'value' => sprintf(':"%s";', $filter),
        'compare' => 'LIKE',
      ];
    }

    // echo '<pre>' . var_dump($temp_parent_and_child_cat_array) . '</pre>';
    // echo '<pre>' . var_dump($meta_query_array) . '</pre>';

    $students_args = [
      'role' => 'author',
      'meta_query' => $meta_query_array,
    ];
  }

  // 4. create conditional WP queries based on:
  if ($filters == null && $toggle == "works") {
    echo '<div class="no-results">';
    echo "Can't find any works. For best results, please select at least one filter. 🤠";
    echo '</div>';
  } elseif ($filters == null && $toggle == "students") {
    echo '<div class="no-results">';
    echo "Can't find any students. For best results, please select at least one filter. 🤠";
    echo '</div>';
  } elseif ($toggle == "works") {
    $works_query = new WP_Query($works_args);
    if ($works_query->have_posts()) {
      while ($works_query->have_posts()):
        $works_query->the_post();
        get_template_part('components/grid-cards/project', 'card');
      endwhile;
    } else {
      echo '<div class="no-results">';
      echo "[ 404 ] Nothin' found. Try some new filters!";
      echo '</div>';
    }
    wp_reset_postdata();
  } elseif ($toggle == "students") {
    $students_query = new WP_User_Query($students_args);

    // echo '<pre>' . var_dump($students_query->results) . '</pre>';

    $students_results = $students_query->results;
    shuffle($students_results);

    if (!empty($students_results)) {
      foreach ($students_results as $student) {
        set_query_var('student_id', absint($student->ID));
        get_template_part('components/grid-cards/student', 'card');
      }
    } else {
      echo '<div class="no-results">';
      echo "[ 404 ] Nothin' found. Try some new filters!";
      echo '</div>';
    }
    wp_reset_query();
  }

  die();
}
