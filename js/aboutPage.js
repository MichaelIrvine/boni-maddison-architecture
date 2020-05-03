// Front Page Script
(function() {
  const aboutRowOne = document.querySelector(".about-history-text_row-1");
  const aboutRowTwo = document.querySelector(".about-history-text_row-2");

  const waypoint = new Waypoint({
    element: document.querySelector(".about-main"),
    handler: function() {
      aboutRowOne.classList.remove("hidden-up");
      aboutRowTwo.classList.remove("hidden-up");
    },
    offset: "100%"
  });
})();
