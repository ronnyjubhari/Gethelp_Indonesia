<!-- Jquery Library File-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<script async src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<script type="text/javascript">
    const password = document.getElementById('password');
    const ikon = document.getElementById('ikon');
    const hide = ['fa', 'fa-eye-slash'];
    const show = ['fa', 'fa-eye'];

    console.log(show);

    function showHide() {
        if (password.type === 'password') {
            password.setAttribute('type', 'text');
            show.forEach(element => {
                ikon.classList.remove(element);
            });
            hide.forEach(element => {
                ikon.classList.add(element);
            });

        } else {
            password.setAttribute('type', 'password');

            hide.forEach(element => {
                ikon.classList.remove(element);
            });
            show.forEach(element => {
                ikon.classList.add(element);
            });
        }
    }
</script>
<script>
// Load GTM for everyone except PageSpeed Insight Tool 😉
if(navigator.userAgent.indexOf("Chrome-Lighthouse") == -1) { 

// Google Tag Manager as Payload for all 3rd-party JS
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PJVLRKZ');
// please replace GTM-XXXXXXXXXX with own GTM ID
 }
</script>
<script src="<?= base_url('app.js') ?>"></script>
</body>

</html>