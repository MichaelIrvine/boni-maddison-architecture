jQuery(document).ready(function ($) {
  $('.slick-gallery__front-page').slick({
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 7500,
    speed: 2000,
    adaptiveHeight: false,
    fade: true,
    arrows: false,
    pauseOnHover: false,
    pauseOnFocus: false,
    cssEase: 'ease-in-out',
  });

  $('.slick-gallery__about').slick({
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 300,
    adaptiveHeight: false,
    fade: true,
    arrows: false,
  });

  $('.slick-gallery__projects-main').slick({
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 300,
    adaptiveHeight: false,
    fade: true,
    arrows: false,
  });

  $('.slick-gallery__projects').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    cssEase: 'ease',
    pauseOnHover: false,
    autoplaySpeed: 3000,
    speed: 800,
    adaptiveHeight: false,
    fade: true,
    arrows: true,
    dots: false,
    nextArrow:
      '<button class="projects-gallery-next project-gallery-arrow" aria-label="Next" type="button">Next&#x2192;</button>',
    prevArrow:
      '<button class="projects-gallery-previous project-gallery-arrow" aria-label="Previous" type="button">&#x2190;Previous</button>',
    responsive: [
      {
        breakpoint: 475,
        settings: {
          arrows: false,
        },
      },
    ],
  });
});
