(function () {
    let emailText = document.getElementById('email_buffer');
    emailText.addEventListener("click", ()=>{
        let clipboard = new ClipboardJS('#email_buffer');
        clipboard.on('success', function(e) {
            emailText.setAttribute('data-tooltip', 'HTML<br>подсказка');
            emailText.show();
        });
    });
})();

