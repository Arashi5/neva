(function () {
    let emailText = document.getElementById('email_buffer');
    emailText.addEventListener("click", ()=>{
        let clipboard = new ClipboardJS('#email_buffer');
        clipboard.on('success', function(e) {

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
                    scaleY: [0,1],
                    opacity: [0.5,1],
                    easing: "easeOutExpo",
                    duration: 700
                })
                .add({
                    targets: '.ml11 .line',
                    translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
                    easing: "easeOutExpo",
                    duration: 700,
                    delay: 100
                }).add({
                targets: '.ml11 .letter',
                opacity: [0,1],
                easing: "easeOutExpo",
                duration: 300,
                offset: '-=775',
                delay: (el, i) => 34 * (i+1)
            }).add({
                targets: '.ml11',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
            function fadeOut() {
                emailCopy.innerHTML = '<a id="email_buffer" class="footer-email" data-clipboard-text="info@neva.ru">info@neva.ru</a>';
            }
            setTimeout(fadeOut, 3000);
        });
    });


})();

