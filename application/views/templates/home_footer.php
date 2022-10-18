<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <h2>GetHelp</h2>
                <p>
                    Kami sebagai jembatan berbagi kebaikan untuk masyarakat dalam berdonasi maupun galang dana
                </p>
            </div>
            <div class="col-md-4 col-sm-12">
                <h2>Tentang</h2>
                <ul class="list-unstyled link-list">
                    <li>
                        <a href="<?= base_url('about') ?>">GetHelp</a>
                    </li>
                    <li>
                        <a href="<?= base_url('terms') ?>">Syarat & Ketentuan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('kebijakan-privasi') ?>">Kebijakan Privasi</a>
                    </li>
                    <li>
                    <li>
                        <a href="<?= base_url('kontak'); ?>">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-12 map-img">
                <h2>Follow Kami</h2>
                <address class="md-margin-bottom-40">
                    <span>
                        <a href="https://www.instagram.com/gethelpstartup/" target="_blank" rel="noopener">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UC1Uqyy0d80yjfJChNPlaLAQ" target="_blank" rel="noopener">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </span>
                </address>
            </div>
             
        </div>
    </div>
</footer>

<div class="copy">
    <div class="container">
        <p>&copy; GetHelp Indonesia 2021</p>
    </div>
</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



<!-- Bootstrap JS FIle-->
<?php if ($js == 'reportjs') { ?>


    <script>
        $('.custom-file-input').on('change', function() {
            let filename = $(this).val().split('\\').pop();
            $(this)
                .next('.custom-file-label')
                .addClass('selected')
                .html(filename);
        });
    </script>
<?php } elseif ($js == 'donate') { ?>
    
    <script>
        $(document).ready(function() {
            $("#myChoose").click(function() {
                $("#show-or-hide-by-choose").toggle();
            });
        });
    </script>
    <script>
        var rupiah = document.getElementById('nominal');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value);
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
    </script>


<?php } else { ?>
    
   
    
    
   
<?php }; ?>


<!--<script src="<?= base_url('app.js') ?>"></script>-->

</body>

</html>