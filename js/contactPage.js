// Contact Page
(function () {
  const contactInfo = document.querySelector('.contact-text-details');

  const waypoint = new Waypoint({
    element: document.querySelector('.contact-main'),
    handler: function () {
      contactInfo.classList.remove('hidden-up');
    },
    offset: '100%',
  });
})();
