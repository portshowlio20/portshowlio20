
  <form method="POST" id="filter" action="" style="display: flex;">

<div id="works-students-toggle">
   <div>
     <input type="radio" id="works-toggle" name="mainToggle" value="works"
           checked>
     <label for="works-toggle">Works</label>
   </div>

   <div>
     <input type="radio" id="students-toggle" name="mainToggle" value="students">
     <label for="students-toggle">Students</label>
   </div>
</div>

<div id="works-filters">
<?php
$cat_args = [
  'exclude' => [1], // "Uncategorized"
  'option_all' => 'All',
];

$categories = get_categories($cat_args);
foreach ($categories as $cat): ?>
   <div >
     <input
       type="checkbox"
       id="works-<?php echo $cat->slug; ?>"
       value="<?php echo $cat->term_id; ?>"
       checked
     >
     <label for="works-<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></label>
   </div>
 <?php endforeach;
?>
</div>

<div id="students-filters">

<!-- 🚨 THE VALUE OF THE VALUE ATTR ASSIGNED HERE SHOULD BE QUESTIONED -->
<?php
$field = get_field_object('field_5ec0822387980'); // 🚨 field key is also brittle !!
if ($field['choices']): ?>
     <?php foreach ($field['choices'] as $value => $label): ?>
     <div>
       <input
         type="checkbox"
         id="students-<?php echo $label; ?>"
         value="<?php echo $label; ?>"
         checked
       >
       <label for="students-<?php echo $label; ?>"><?php echo $label; ?></label>
     </div>
     <?php endforeach; ?>
 <?php endif;
?>

</div>

</form>