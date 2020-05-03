// Front Page Script
(function() {
  const projectsRowOne = document.querySelector(".project-archive-column_1");
  const projectsRowTwo = document.querySelector(".project-archive-column_2");

  const waypoint = new Waypoint({
    element: document.querySelector(".projects-main"),
    handler: function() {
      projectsRowOne.classList.remove("hidden-up");
      projectsRowTwo.classList.remove("hidden-up");
    },
    offset: "100%"
  });
})();
