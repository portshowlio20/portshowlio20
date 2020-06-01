<footer class="entry-footer">
  <div class="explore-more">
    <div class="container">
      <div class="subhead">More creatives to explore</div>
      <div class="grid" data-active="students">

        <?php
        $tags = get_field('focus');
        $tag_list = [];
        foreach ($tags as $tag) {
          array_push($tag_list, $tag->term_id);
        }

        $temp_parent_cat_array = [];
        foreach ($tag_list as $tag) {
          $child = get_category($tag);
          $parent_cat = $child->parent;

          if ($parent_cat != 0) {
            array_push($temp_parent_cat_array, $parent_cat);
          }
        }

        $final_cat_array = array_merge($tag_list, $temp_parent_cat_array);

        $meta_query_array = ['relation' => 'OR'];

        foreach ($final_cat_array as $filter) {
          // 1. make a temp array with first item of: 'key' => 'focus'
          $temp_key = ['key' => 'focus'];
          // 2. add second item of temp array: 'value' => $item in filters,
          $temp_value = ['value' => $filter];
          $temp_compare = ['compare' => 'LIKE'];
          // array_push($temp_array, $temp_item);
          $temp_merge = $temp_key + $temp_value + $temp_compare;
          // 3. push this temp array to $meta_query_array
          array_push($meta_query_array, $temp_merge);
        }

        $students_args = [
          'role' => 'author',
          'orderby' => 'rand',
          'meta_query' => $meta_query_array,
          'number' => 4,
        ];

        $the_query = new WP_User_Query($students_args);

        // echo '<pre style="position: absolute; width: 100%; z-index: 1000; background: white;">';
        // echo var_dump($the_query->results);
        // echo '</pre>';

        if (!empty($the_query->results)) {
          foreach ($the_query->results as $student) {
            set_query_var('student_id', absint($student->ID));
            get_template_part('components/grid-cards/student', 'card');
          }
        } else {
          echo '<div class="no-results">';
          echo "[ 404 ] Nothin' found. Try some new filters!";
          echo '</div>';
        }
        wp_reset_query();
        ?>

      </div>
    </div>
  </div>
</footer>