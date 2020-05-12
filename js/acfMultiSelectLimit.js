(function ($) {
  console.log("hello");
  acf.add_filter("select2_args", function (args, $select, settings) {
    // limit to 3
    args.maximumSelectionLength = 4;
    return args;
  });
  // remove data-name="term-parent" option
})(jQuery);
