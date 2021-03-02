(function () {
    let emailText = document.getElementById('email_buffer');
    emailText.addEventListener("click", () => {
        let clipboard = new ClipboardJS('#email_buffer');
        clipboard.on('success', function () {

            let emailCopy = document.getElementById('email_copy');
            emailCopy.innerHTML = '<h1 class="ml11">\n' +
                '  <span class="text-wrapper">\n' +
                '    <span class="line line1"></span>\n' +
                '    <span class="letters">cкопировано</span>\n' +
                '  </span>\n' +
                '</h1>';

            var textWrapper = document.querySelector('.ml11 .letters');
            textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

            anime.timeline({loop: true})
                .add({
                    targets: '.ml11 .line',
                    scaleY: [0, 1],
                    opacity: [0.5, 1],
                    easing: "easeOutExpo",
                    duration: 700
                })
                .add({
                    targets: '.ml11 .line',
                    translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
                    easing: "easeOutExpo",
                    duration: 700,
                    delay: 100
                })
                .add({
                    targets: '.ml11 .letter',
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                    duration: 300,
                    offset: '-=775',
                    delay: (el, i) => 34 * (i + 1)
                })
                .add({
                    targets: '.ml11',
                    opacity: 0,
                    duration: 1000,
                    easing: "easeOutExpo",
                    delay: 1000
                });

            function fadeOut() {
                emailCopy.innerHTML = '<a id="email_buffer" class="footer-email fade-out" data-clipboard-text="info@neva.ru">info@neva.ru</a>';
            }

            setTimeout(fadeOut, 3000);
        });
    });
})();

$(document).ready(function () {
    $('.mark1').click(function (){
        $('#block1').slideToggle(300);
        return false;
    });
    $('.mark2').click(function (){
        $('#block2').slideToggle(300);
        return false;
    });
    $('.mark3').click(function (){
        $('#block3').slideToggle(300);
        return false;
    });
    $('.mark4').click(function (){
        $('#block4').slideToggle(300);
        return false;
    });
    $('.mark5').click(function (){
        $('#block5').slideToggle(300);
        return false;
    });


    //TODO подставить данные остальных форм.
    $('#modal_get_price_submit').on('click', function () {
        var formName = $("#modal_form_name_get_price"),//прайс
            name = $('#modal_get_price_name'),
            email = $('#modal_get_price_email'),
            comment = $('#modal_get_price_comment'),
            agree = $('#modal_get_price_agree');

        if (!agree.prop('checked')) {
            onChangeSetError(agree)
        }

        if (name.val() === '') {
            onChangeSetError(name)
        }

        if (email.val() === '') {
            onChangeSetError(email)
        }
        var data = {
            form_name: formName.val(),
            name: name.val(),
            email: email.val(),
            comment: comment.val(),
        };
        if (ajax(data)) {
            $(this).addClass('check')
        }
    })

    $('#calculate_cost_submit').on('click', function () {
        var formName = $("#modal_form_name_calculate_cost"),//расчитать стоимость

            name = $('#modal_calculate_cost_name'),
            phone = $('#modal_calculate_cost_phone'),
            comment = $('#modal_calculate_cost_comment'),
            agree = $('#modal_calculate_cost_agree');

        if (!agree.prop('checked')) {
            onChangeSetError(agree)
        }

        if (name.val() === '') {
            onChangeSetError(name)
        }

        if (phone.val() === '') {
            onChangeSetError(phone)
        }

        var data = {
            form_name: formName.val(),
            name: name.val(),
            phone: phone.val(),
            comment: comment.val(),
        };
        if (ajax(data)) {
            $(this).addClass('check')
        }
    })

    $('#consultation_submit').on('click', function () {
        var formName = $("#modal_form_name_consultation"),//консультация

            name = $('#modal_consultation_name'),
            phone = $('#modal_consultation_phone'),
            agree = $('#modal_consultation_agree');

        if (!agree.prop('checked')) {
            onChangeSetError(agree)
        }

        if (name.val() === '') {
            onChangeSetError(name)
        }

        if (phone.val() === '') {
            onChangeSetError(phone)
        }

        var data = {
            form_name: formName.val(),
            name: name.val(),
            phone: phone.val(),
        };
        if (ajax(data)) {
            $(this).addClass('check')
        }
    })

    $('#question_submit').on('click', function () {
        var formName = $("#question_form_name"),//вопросы

            name = $('#question_name'),
            phone = $('#question_phone'),
            comment = $('#question_comment'),
            agree = $('#question_agree');

        if (!agree.prop('checked')) {
            onChangeSetError(agree)
        }

        if (name.val() === '') {
            onChangeSetError(name)
        }

        if (phone.val() === '') {
            onChangeSetError(phone)
        }

        var data = {
            form_name: formName.val(),
            name: name.val(),
            phone: phone.val(),
            comment: comment.val(),
        };
        if (ajax(data)) {
            $(this).addClass('check')
        }
    })

    $('input').on('change', function () {

        if (
            $(this).prop('type') === 'checkbox' &&
            $(this).prop('checked') === 'checked'
        ) {
            return
        }

        if ($(this).val !== '') {
            $(this).css({'color': 'black'})
            onChangeRemoveError($(this))
        } else {
            $(this).css({'color': '#828886'})
        }
    })

    function ajax(data) {
        $.ajax({
            type: 'POST',
            url: '/app.php',
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.result) {
                    return true
                }
            }
        });
    }


    function onChangeSetError(element) {
        element.css({'border-color': 'red'}).parent().find('span').css({'display': 'block'})
        if (element.prop('type') === 'checkbox' && $(this).prop('checked') !== 'checked') {
            element.next().css({'color': 'red'})
        }
    }

    function onChangeRemoveError(element) {
        element.css({'border-color': '#828886'}).parent().find('span').css({'display': 'none'})
        if (element.prop('type') === 'checkbox') {
            if (element.parent().parent().hasClass('very_light_blue')) {
                element.next().css({'color': '#C2D5FF'})
            } else {
                element.next().css({'color': 'black'})
            }
        }
    }
})
