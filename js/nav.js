import throttle from 'lodash.throttle';

$('.mobile-nav-toggle').on('click', (e) => {
    e.preventDefault();
    $('nav').addClass('animate').toggleClass('visible');
    $('html,body').css('overflow', $('nav').hasClass('visible') ? 'hidden' : 'auto');
});

const addShadow = () => $('.site-header').toggleClass('shadow', $(window).scrollTop() > 0);
$(window).on('scroll', throttle(addShadow, 300));
