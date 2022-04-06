import 'slick-carousel';

$('.slideshow').each((_, container) => {
    $(container).slick({
        cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
        useCSS: true,
        useTransform: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        dots: true,
        pauseOnDotsHover: true,
        customPaging: () => '',
    });
});
