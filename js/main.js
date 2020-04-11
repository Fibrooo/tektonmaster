jQuery(document).ready(function(){

    jQuery(".popular__projects-slider").owlCarousel({
        items: 1,
        nav: true,
    });

    jQuery(".project__slider").owlCarousel({
        items: 3,
        loop: true,
        margin: 2,
        nav: true,
        center: true,
        responsive : {
            1200: {
                center: true,
                items: 2,
            },
            375: {
                center: false,
                items: 1
            },
            390: {
                center: false,
                items: 1
            },
            480: {
                center: false,
                items: 1
            },
            320: {
                center: false,
                items: 1
            }
        }
    });

    jQuery(".carousel_reviews").owlCarousel({
        margin: 30,
        nav: true,
        navSpeed: 9000,
        loop: true,
        responsive : {
            1920: {
                center: false,
                items: 2,
            },
            1440: {
                center: false,
                items: 2,
            },
            1200: {
                center: false,
                items: 2,
            },
            480: {
                center: false,
                items: 1,
                margin: 0
            },
            420: {
                center: false,
                items: 1,
                margin: 0
            },
            390: {
                center: false,
                items: 1,
                margin: 0
            },
            375: {
                center: false,
                items: 1,
                margin: 0
            },
            320: {
                center: false,
                items: 1,
                margin: 0
            },
            300: {
                center: false,
                items: 1,
                margin: 0
            }



        }
    });

    jQuery(".principles_carousel").owlCarousel({
        items: 3,
        nav: true,
        margin: 15,
        autoheight: true,
        responsive : {
            1920: {
                items: 3
            },
            1440: {
                items: 3
            },
            1170: {
                items: 3
            },
            768: {
                items: 2
            },
            375: {
                items: 1
            },
            390: {
                items: 1
            },
            320: {
                items: 1
            },
            480: {
                items: 1
            },
        }

    });

    
    jQuery(".projects__menu-carousel").owlCarousel({
        margin: 10,
        nav: true,
        loop: true,
        responsive : {
            1920: {
                center: true,
                items: 4,
            },
            1440: {
                center: true,
                items: 4,
            },
            1200: {
                center: true,
                items: 4,
            },
            480: {
                center: false,
                items: 1,
                margin: 0
            },
            420: {
                center: false,
                items: 1,
                margin: 0
            },
            390: {
                center: false,
                items: 1,
                margin: 0
            },
            375: {
                center: false,
                items: 1,
                margin: 0
            },
            320: {
                center: false,
                items: 1,
                margin: 0
            },
            300: {
                center: false,
                items: 1,
                margin: 0
            }



        }
    });

   
    
})