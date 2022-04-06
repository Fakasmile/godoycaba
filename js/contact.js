$('[data-contactform]').each((_, el) => {
    const form = $(el);
    const controls = form.find('input, textarea, button');
    const inputs = form.find('input, textarea');
    const submitButton = form.find('button[type="submit"]');
    const submitText = submitButton.html();
    const loadingText = submitButton.attr('data-loading-text');

    form.on('submit', (e) => {
        e.preventDefault();

        const xhr = $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
        });

        controls.prop('disabled', true);
        submitButton.html(loadingText);

        form.find('.error').remove();
        form.find('.success').hide();

        xhr.fail(() => {
            const errors = xhr.responseJSON;
            Object.keys(errors).forEach(field => {
                form.find(`[name="${field}"]`)
                    .after(`<p class="error">${errors[field].join('<br>')}</p>`);
            });
        });

        xhr.done(() => {
            inputs.val('');
            form.addClass('success');
        });

        xhr.always(() => {
            controls.prop('disabled', false);
            submitButton.html(submitText);
        });
    });
});
