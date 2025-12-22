document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener('scroll', function () {
    if (window.scrollY > 50) {
      document.getElementById('navbar_top').classList.add('fixed-top');
      // add padding top to show content behind navbar
      navbar_height = document.querySelector('.navbar').offsetHeight;
      document.body.style.paddingTop = navbar_height + 'px';
    } else {
      document.getElementById('navbar_top').classList.remove('fixed-top');
      // remove padding top from body
      document.body.style.paddingTop = '0';
    }
  });
});

$('.services').owlCarousel({
  loop: true,
  dots: false,
  autoplay: true,
  nav: false,
  autoplayTimeout: 2000,
  responsiveClass: true,
  responsive: {
    0: {
      items: 2,
      margin: 6
    },
    600: {
      items: 4,
      margin: 6
    },
    1000: {
      items: 5,
      margin: 8
    },
    1400: {
      items: 6,
      margin: 8
    }
  }
})

// services
$('.brand-slider').owlCarousel({
  loop: true,
  dots: false,
  autoplay: true,
  nav: false,
  autoplayTimeout: 2000,
  responsiveClass: true,
  responsive: {
    0: {
      items: 3,
      margin: 12
    },
    600: {
      items: 4,
      margin: 12
    },
    1000: {
      items: 6,
      margin: 12
    },
    1400: {
      items: 9,
      margin: 12
    }
  }
})

// flash sale
// $('.flash-sale').owlCarousel({
//   loop: true,
//   dots: false,
//   autoplay: true,
//   nav: false,
//   autoplayTimeout: 5000,
//   responsiveClass: true,
//   responsive: {
//     0: {
//       items: 2,
//     },
//     600: {
//       items: 3,
//     },
//     1000: {
//       items: 4,
//     },
//     1400: {
//       items: 4,
//     }
//   }
// })

// categories
$('.categories').owlCarousel({
  loop: true,
  dots: false,
  autoplay: true,
  nav: false,
  autoplayTimeout: 2000,
  responsiveClass: true,
  responsive: {
    0: {
      items: 3,
      margin: 12
    },
    600: {
      items: 4,
      margin: 12
    },
    1000: {
      items: 6,
      margin: 12
    },
    1400: {
      items: 8,
      margin: 12
    }
  }
})

// Feature
$('.feature').owlCarousel({
    loop: true,
    dots: false,
    autoplay: true,
    nav: false,
    // autoplayTimeout: 2000,
    responsiveClass: true,
    responsive: {
        0: {
            items: 2,

        },
        600: {
            items: 4
        },
        1000: {
            items: 5
        },
        1200: {
            items: 5,
        }
    }
})
// $('.services').owlCarousel({
//   loop: true,
//   dots: false,
//   autoplay: true,
//   nav: false,
//   autoplayTimeout: 2000,
//   responsiveClass: true,
//   responsive: {
//     0: {
//       items: 3,
//       margin: 12
//     },
//     600: {
//       items: 4,
//       margin: 12
//     },
//     1000: {
//       items: 6,
//       margin: 12
//     },
//     1400: {
//       items: 8,
//       margin: 12
//     }
//   }
// })



// $('.owl-carousel').owlCarousel({
//     loop: true,
//     dots: false,
//     autoplay: true,
//     nav: false,
//     // autoplayTimeout: 2000,
//     responsiveClass: true,
//     responsive: {
//         0: {
//             items: 2,
//             margin: 12
//         },
//         600: {
//             items: 4,
//             margin: 12
//         },
//         1000: {
//             items: 5,
//             margin: 12
//         },
//         1200: {
//             items: 5,
//             margin: 12
//         }
//     }
// })
