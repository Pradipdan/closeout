<script src="{{ asset('site/js/aos.js') }}"></script>
<script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('site/js/demo.js') }}"></script>
<script src="{{ asset('site/js/email-decode.min.js') }}"></script>
<script src="{{ asset('site/js/Drift.min.js') }}"></script>
<script src="{{ asset('site/js/glightbox.min.js') }}"></script>
<script src="{{ asset('site/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('site/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('site/js/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('site/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('site/js/validate.js') }}"></script>
{{-- <script src="{{ asset('site/js/vcd15cbe7772f49c399c6a5babf22c1241717689176015')}}"></script> --}}
{{-- <script src="{{ asset('site/js/js')}}"></script> --}}


<!-- jQuery (Google CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



<script src="{{ asset('site/js/main.js') }}"></script>


<script>
    var swiper = new Swiper(".mySwiper_new", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>



<script>
    $(document).ready(function() {
        $('.password_toggle').click(function() {
            let passwordField = $('#password');
            let fieldType = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', fieldType);

            // Toggle Bootstrap Icons
            let icon = $(this).find('i');
            if (fieldType === 'password') {
                icon.removeClass('bi-eye').addClass('bi-eye-slash-fill');
            } else {
                icon.removeClass('bi-eye-slash-fill').addClass('bi-eye');
            }
        });
    });


    $(document).ready(function() {
        $('.confirm_password_toggle').click(function() {
            let passwordField = $('#confirm_password');
            let fieldType = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', fieldType);

            // Toggle Bootstrap Icons
            let icon = $(this).find('i');
            if (fieldType === 'password') {
                icon.removeClass('bi-eye').addClass('bi-eye-slash-fill');
            } else {
                icon.removeClass('bi-eye-slash-fill').addClass('bi-eye');
            }
        });
    });


    $(document).ready(function() {
        $('.site_login_view_password').click(function() {
            let passwordField = $('#login-password');
            let fieldType = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', fieldType);

            // Toggle Bootstrap Icons
            let icon = $(this).find('i');
            if (fieldType === 'password') {
                icon.removeClass('bi-eye').addClass('bi-eye-slash-fill');
            } else {
                icon.removeClass('bi-eye-slash-fill').addClass('bi-eye');
            }
        });
    });
</script>
