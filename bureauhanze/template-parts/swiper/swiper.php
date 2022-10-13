<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/assets/js/swiper.min.js"></script>
<script>
const swiperGallery = new Swiper('.swiper-gallery', {
    direction: 'horizontal',
    loop: false,
    preloadImages: false,
    lazy: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    grabCursor: true,
    spaceBetween: 32,
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        }
    }
});

const swiperFrontpage = new Swiper('.swiper-frontpage', {
    direction: 'horizontal',
    loop: false,
    preloadImages: false,
    lazy: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    grabCursor: true,
    spaceBetween: 16,
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        }
    }
});

const swiperWebshop = new Swiper('.swiper-webshop', {
    direction: 'horizontal',
    loop: false,
    preloadImages: false,
    lazy: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    grabCursor: true,
    spaceBetween: 16,
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 5,
        }
    }
});

const swiperInspiration = new Swiper('.swiper-inspiration', {
    direction: 'horizontal',
    loop: false,
    preloadImages: false,
    lazy: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    grabCursor: true,
    spaceBetween: 16,
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 5,
        }
    }
});

const swiperBrands = new Swiper('.swiper-brands', {
    direction: 'horizontal',
    loop: true,
    autoplay: {
       delay: 1500,
       disableOnInteraction: false
    },
    preloadImages: false,
    lazy: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    grabCursor: true,
    spaceBetween: 32,
    breakpoints: {
        576: {
            slidesPerView: 4,
        },
        768: {
            slidesPerView: 5,
        },
        1024: {
            slidesPerView: 6,
        }
    }
});
</script>