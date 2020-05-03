/**
 * Jquery Accordion
 */

jQuery(document).ready(function($) {
  // Front Page Project List Accordion
  $(function($) {
    $(".accordion")
      .find(".accordion-toggle")
      .click(function() {
        $(this)
          .next()
          .slideToggle("slow");
        //   $(".accordion-content").not($(this).next()).slideUp("slow");
        $(this)
          .find(".fa-caret-down")
          .toggleClass("fa-rotate-180");
      });
  });
});
