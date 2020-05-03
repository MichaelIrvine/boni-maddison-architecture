/**
 * Front Page
 */

// Header  -- Logo and Nav
const bmaLogo = document.querySelector('.site-branding');
const navMenu = document.querySelector('.main-navigation');

// Hero Image Text
const fpTitleTextWrap = document.querySelector('.fp-hero-text-wrapper');

// Array for different layers of logo SVG
const svgLayerArr = [
  document.querySelector('.fp-hero-text-wrapper svg #Layer_1'),
  document.querySelector('.fp-hero-text-wrapper svg #Layer_2'),
  document.querySelector('.fp-hero-text-wrapper svg #Layer_3'),
];

// Select the body tag
const body = document.querySelector('body');

// Front Page Hero Image
const fpHeroImage = document.querySelector('.fp-image');

// Fades in Front Page Hero
const heroFader = function () {
  // Check if page is home page
  if (body.classList.contains('home')) {
    //  Fade in BMA on load
    svgLayerArr.forEach((element) => {
      element.classList.add('active');
    });

    setTimeout(() => {
      fpHeroImage.classList.replace('hidden', 'hidden-darkest');
    }, 2800);
  }
};

// window.addEventListener("load", heroFader);

// On Scroll Fade Logo & Nav In - Fade Hero Text out
const scrollTransition = function () {
  if (body.classList.contains('home')) {
    if (window.scrollY >= 20) {
      fpHeroImage.classList.replace('hidden-darkest', 'semi-revealed');
    }

    if (window.scrollY >= 50) {
      bmaLogo.classList.replace('hidden', 'revealed');
      navMenu.classList.replace('hidden-half', 'reveled');
      fpTitleTextWrap.classList.add('hidden');
    } else {
      bmaLogo.classList.replace('hidden', 'revealed');
      navMenu.classList.replace('hidden-half', 'revealed');
    }
  }
};

// window.addEventListener("scroll", scrollTransition);

/**
 * Contact Page
 */

//  Background Image Fade In

const contactImgFade = function () {
  const main = document.querySelector('main');
  const bgImg = document.querySelector('.contact-hero img');
  const contactText = document.querySelector('.contact-text-details');
  if (main.classList.contains('contact-main')) {
    contactText.classList.replace('hidden', 'revealed');
    bgImg.classList.replace('hidden', 'hidden-half');
  }
};

window.addEventListener('load', contactImgFade);

/**
 * About Page
 */

//  Background Image Fade In

const aboutImgFade = function () {
  const main = document.querySelector('main');
  const aboutTitle = document.querySelector('.about-title');
  const bgImg = document.querySelector('.about-hero img');

  if (main.classList.contains('about-main')) {
    aboutTitle.classList.replace('hidden', 'revealed');
    bgImg.classList.replace('hidden', 'semi-revealed');

    window.addEventListener('scroll', function () {
      const aboutText = document.querySelector('.about-history-text');

      if (window.scrollY >= 200) {
        aboutText.classList.replace('hidden', 'revealed');
      }
    });
  }
};

window.addEventListener('load', aboutImgFade);

/**
 * Header Display for every other page
 */

const showHeader = function () {
  if (!body.classList.contains('home')) {
    bmaLogo.classList.replace('hidden', 'revealed');
    navMenu.classList.replace('hidden-half', 'revealed');
  }
};

window.addEventListener('load', showHeader);

/**
 * Jquery
 */

jQuery(document).ready(function ($) {
  // Front Page Project List Accordion
  $(function ($) {
    $('.accordion')
      .find('.accordion-toggle')
      .click(function () {
        $(this).next().slideToggle('slow');
        //   $(".accordion-content").not($(this).next()).slideUp("slow");
        $(this).find('.fa-caret-down').toggleClass('fa-rotate-180');
      });
  });
}); // End of Jquery
