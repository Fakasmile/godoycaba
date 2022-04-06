$('.appraisal').show();

$('[data-action="appraisal"]').on('click', () => {
    $('.appraisal').addClass('visible');
    $('[data-action="appraisal"]').parent().addClass('active');
});

$('.appraisal [data-action="close"]').on('click', () => {
    $('.appraisal').removeClass('visible');
    $('[data-action="appraisal"]').parent().removeClass('active');
});
