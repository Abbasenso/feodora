const swiper = new Swiper(".newArrival", {
    slidesPerView: 2,
    
    // centeredSlides: true,
    spaceBetween: 10,
    // loop: true,
    navigation: {
        nextEl: ".slide-right",
        prevEl: ".slide-left",
    },

    // Responsive breakpoints
    breakpoints: {

        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
        872: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        998: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
        1268: {
            slidesPerView: 5,
            spaceBetween: 15,
        }
    },
});

const bestSeller = new Swiper("#bestSeller", {
    slidesPerView: 2,
    
    // centeredSlides: true,
    spaceBetween: 10,
    // loop: true,
    navigation: {
        nextEl: ".slide-right-b",
        prevEl: ".slide-left-b",
    },

    // Responsive breakpoints
    breakpoints: {

        // when window width is >= 640px
        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
        872: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        998: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
        1268: {
            slidesPerView: 5,
            spaceBetween: 15,
        }
    },
});

const recentlyViewed = new Swiper(".recentlyViewed", {
    slidesPerView: 2,
    
    // centeredSlides: true,
    spaceBetween: 10,
    // loop: true,
    navigation: {
        nextEl: ".slide-right-r",
        prevEl: ".slide-left-r",
    },

    // Responsive breakpoints
    breakpoints: {

        // when window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
        872: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        998: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
        1268: {
            slidesPerView: 5,
            spaceBetween: 15,
        }
    },
});

const threePoster = new Swiper(".threePoster", {
    // Default parameters
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    autoplay: {
        delay: 2500,
    },
    // Responsive breakpoints
    breakpoints: {

        // when window width is >= 640px
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
            // loop: false,
        },
        1168: {
            slidesPerView: 3,
            spaceBetween: 10,
            loop: false,
        }
        // 100: {
        //     loop: true
        // }
    },
});

const twoPoster = new Swiper(".twoPoster", {
    // Default parameters
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    autoplay: {
        delay: 3000,
    },
    // Responsive breakpoints
    breakpoints: {

        // when window width is >= 640px
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
            // loop: false,
        }
    },
});

const topBanner = new Swiper(".topBanner", {
    // Default parameters
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 2500,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
});

const magazineTop = new Swiper(".magazineTop", {
    // Default parameters
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 2500,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
});


// profile drop down 
const profileBox = document.getElementById('profileBox')
const profileItems = document.getElementById('proItem')

const profileBOxClicked = profileBox.addEventListener('click', () => {
    profileBox.classList.toggle('active')
    profileItems.classList.toggle('active')
})