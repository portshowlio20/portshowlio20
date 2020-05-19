(function ($) {
  console.log("hello");
  acf.add_filter("select2_args", function (args, $select, settings) {
    args.maximumSelectionLength = 4;
    return args;
  });
})(jQuery);
