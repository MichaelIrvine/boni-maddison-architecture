// Front Page Script
(function(){
    const fpIntroParagraph = document.querySelector(".fp-about-paragraph");
    const fpProjectList = document.querySelector(".project-list-container");

    const waypoint = new Waypoint({
      element: document.querySelector(".fp-second-row"),
      handler: function() {
        fpIntroParagraph.classList.remove("hidden-up");
        fpProjectList.classList.remove("hidden-up");
      },
      offset: '75%'
    });

})();
