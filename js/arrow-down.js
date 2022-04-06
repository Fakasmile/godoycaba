import raf from 'raf';

let value;

const scroll = () => {
    const target = $(window).height();
    value += (target - $(window).scrollTop()) / 4;
    if (Math.abs(target - value) <= 1) {
        $(window).scrollTop(target);
    } else {
        $(window).scrollTop(value);
        raf(scroll);
    }
};

$('.arrow-down').on('click', () => {
    value = $(window).scrollTop();
    scroll();
});
