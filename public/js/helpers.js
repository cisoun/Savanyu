function showErrorsInForm(form, response) {
    form.forEach(function(input) {
        var inputElement = $('input[name="' + input + '"]');
        var errorElement = $('[data-for="' + input + '"]');
        
        if (response.responseJSON != null && response.responseJSON.hasOwnProperty(input)) {
            inputElement.addClass('is-invalid');
            errorElement.removeClass('d-none');
            errorElement.html(response.responseJSON[input]);
        } else {
            inputElement.removeClass('is-invalid');
            errorElement.addClass('d-none');
        }
    });
}

function toTop() {
    $('html,body').animate({
        scrollTop: 0
    }, 200);
}

export { showErrorsInForm, toTop };