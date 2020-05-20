<?php

/**
 * Validate the categories input incase they add a custom category at the end!
 */
add_filter('acf/validate_value/name=project_tags', 'acf_focus_to_four', 10, 4);
add_filter('acf/validate_value/name=your_roles', 'acf_focus_to_four', 10, 4);
add_filter('acf/validate_value/name=roles', 'acf_focus_to_four', 10, 4);
add_filter('acf/validate_value/name=focus', 'acf_focus_to_four', 10, 4);
function acf_focus_to_four($valid, $value, $field, $input_name)
{
  // Bail early if value is already invalid.
  if ($valid !== true) {
    return $valid;
  }
  if (is_array($value) && count($value) > 4 !== false) {
    return __("You may only pick up to 4 types.");
  }
  return $valid;
}
