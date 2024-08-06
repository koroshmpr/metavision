require('./bootstrap');
import $ from 'jquery';
import 'swiper/css';
import Swiper from 'swiper/bundle';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Masonry from 'masonry-layout';

let masonry;

document.addEventListener('DOMContentLoaded', function () {
    AOS.init();
    let lan = currentLanguage.language;
    const toggleScrollClass = function () {
        if (window.scrollY > 30) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    };
    window.addEventListener('scroll', toggleScrollClass);

    function addCollapse(menuId, iconClass) {
        // Select the menu by its ID
        let menu = $(`#${menuId}`);

        // Counter for generating unique IDs
        let uniqueIdCounter = 1;

        // Find <li> elements with the "menu-item-has-children" class
        menu.find('li.menu-item-has-children').each(function () {
            let listItem = $(this);

            // Find the anchor link
            let anchor = listItem.children('a');
            let anchorHref = anchor.attr('href');
            let hasLink = anchorHref && anchorHref !== '#';

            // Generate a unique ID for the submenu
            let submenuId = `${menuId}-submenu-${uniqueIdCounter}`;

            // Add a button after the anchor link
            anchor.after(`<button type="button" aria-label="dropdown toggler" class="btn btn-link ${iconClass} collapsed" data-bs-toggle="collapse" data-bs-target="#${submenuId}">
                    <svg  width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                    </svg>
                </button>`);

            // Set attributes for Bootstrap collapse
            let submenu = listItem.find('ul.sub-menu');
            submenu.attr('id', submenuId);
            submenu.addClass('collapse');

            // Increment the unique ID counter
            uniqueIdCounter++;

            if (hasLink == false) {
                anchor.removeAttr('href'); // Remove href to prevent navigation
                anchor.attr('data-bs-toggle', 'collapse');
                anchor.attr('data-bs-target', `#${submenuId}`);
            }

            // Prevent the button from following the link
            anchor.next('button').on('click', function (event) {
                event.preventDefault();
            });
        });
    }


    addCollapse('navbarTogglerMenu' ,'text-white');
    addCollapse('navbarHomeMenu' ,'text-white');

    const backToTop = document.getElementById("backToTop");

    function backtoTopHandler() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    if (backToTop) {
        backToTop.addEventListener('click', backtoTopHandler)
    }
    const postSlider = new Swiper('.post_swiper', {
        loop: false,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 20,
        grabCursor: true,
        centeredSlides: true,
        direction: 'horizontal',
        breakpoints: {
            968: {
                slidesPerView: 4,
                centeredSlides: false,
                autoplay : false
            },
        },
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.post-pagination',
            bulletActiveClass: 'active',
            clickable: true
        },
        navigation: {
            nextEl: '.post-button-next',
            prevEl: '.post-button-prev',
        },
        disableOnInteraction: false,
    });
    const solutionSlider = new Swiper('.solution_swiper', {
        loop: true,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1.5,
        spaceBetween: 15,
        mousewheel: {
            invert: false,
            sensitivity: 3
        },
        grabCursor: true,
        centeredSlides: true,
        direction: 'horizontal',
        breakpoints: {
            968: {
                slidesPerView: 2.7,
                spaceBetween: 20,
            },
        },
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.solution-pagination',
            bulletActiveClass: 'active',
            clickable: true
        },
        navigation: {
            nextEl: '.solution-button-next',
            prevEl: '.solution-button-prev',
        },
        disableOnInteraction: false,
    });
    const swiper = new Swiper('.product_image_swiper', {
        loop: false,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 20,
        grabCursor: true,
        centeredSlides: true,
        direction: 'horizontal',
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        disableOnInteraction: false,
    });
    const heroSlider = new Swiper('.hero_slider', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 0,
        grabCursor: true,
        mousewheel: {
            invert: false,
            sensitivity: 3
        },
        speed: 1500,
        keyboard: {
            enabled: true,
            onlyInViewport: true, // Ensures the keyboard control only works when Swiper is in viewport
        },
        breakpoints: {
            968: {
                direction: 'horizontal',
                speed: 1500,
            },
        },
        effect: 'slide',
        on: {
            init: function () {
                const slides = this.slides;

                // Add 'aos-animate' class to all slides except the first one during initialization
                slides.forEach(function (slide, index) {
                    if (index != 0) {
                        let elementsWithAos = slide.querySelectorAll('[data-aos]');
                        elementsWithAos.forEach(function (element) {
                            element.classList.remove('aos-animate');
                        });
                    }
                });
            },
            slideChange: function () {
                const activeSlideIndex = this.realIndex;
                const slides = this.slides;

                // Remove 'aos-animate' class from all elements
                slides.forEach(function (slide) {
                    let elementsWithAos = slide.querySelectorAll('[data-aos]');
                    elementsWithAos.forEach(function (element) {
                        element.classList.remove('aos-animate');
                    });
                });

                // Add 'aos-animate' class to the active slide elements
                let activeSlideElements = slides[activeSlideIndex].querySelectorAll('[data-aos]');
                activeSlideElements.forEach(function (element) {
                    element.classList.add('aos-animate');
                });
            }
        }
    });

})
$(document).ready(function () {
    const categoryContainer = $('.category_container');
    const firstImageUrl = categoryContainer.first().data('image');
    const bgElement = categoryContainer.first().closest('.swiper-slide');
    bgElement.css('background-image', `url(${firstImageUrl})`);

    // Add hover functionality to each category_container
    categoryContainer.each(function(index) {
        $(this).hover(
            function() {
                const imageUrl = $(this).data('image');
                const bgElement = $(this).closest('.swiper-slide');
                bgElement.css('background-image', `url(${imageUrl})`);
            }
        );
    });
    let masonryGrid = document.querySelector(".masonry");
    if (masonryGrid) {
        masonry = new Masonry(masonryGrid, {
            itemSelector: ".masonry-item",
            columnWidth: ".masonry-item",
            originLeft: false,
            transitionDuration: '0.5s',
        });
    }
    const searchInput = document.getElementById('faq-search');
    const faqItems = document.querySelectorAll('.masonry-item');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const searchTerm = this.value.trim().toLowerCase();

            faqItems.forEach(function (item) {
                const question = item.querySelector('h6').textContent.trim().toLowerCase();
                if (question.includes(searchTerm)) {
                    item.style.display = 'unset';
                    masonry.layout();
                } else {
                    item.style.display = 'none';
                    masonry.layout();
                }
            });
        });
    }
});
