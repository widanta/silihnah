<!-- end content -->
</div>

<footer class="footer">
    <div><a href="">Silihnah </a>© 2022 creativeLabs.</div>
    <div class="ms-auto">Powered by&nbsp;<a href="">Silihnah.com</a></div>
</footer>
</div>
<!-- CoreUI and necessary plugins-->
<script src="<?= BASE_URL; ?>/assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="<?= BASE_URL; ?>/assets/vendors/simplebar/js/simplebar.min.js"></script>
<script src="<?= BASE_URL; ?>/assets/vendors/chart.js/js/chart.min.js"></script>
<script src="<?= BASE_URL; ?>/assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="<?= BASE_URL; ?>/assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?= BASE_URL; ?>/assets/js/main.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var showHidePassword1 = document.getElementById('show_hide_password_1');
        var passwordInput1 = showHidePassword1.querySelector('input');
        var toggleIcon1 = showHidePassword1.querySelector('span i');

        toggleIcon1.classList.add('fa-solid', 'fa-eye-slash');

        showHidePassword1.querySelector('span').addEventListener('click', function(event) {
            event.preventDefault();
            if (passwordInput1.type === 'text') {
                passwordInput1.type = 'password';
                toggleIcon1.classList.add('fa-eye-slash');
                toggleIcon1.classList.remove('fa-eye');
            } else if (passwordInput1.type === 'password') {
                passwordInput1.type = 'text';
                toggleIcon1.classList.remove('fa-eye-slash');
                toggleIcon1.classList.add('fa-eye');
            }
        });

        var showHidePassword2 = document.getElementById('show_hide_password_2');
        var passwordInput2 = showHidePassword2.querySelector('input');
        var toggleIcon2 = showHidePassword2.querySelector('span i');

        toggleIcon2.classList.add('fa-solid', 'fa-eye-slash');

        showHidePassword2.querySelector('span').addEventListener('click', function(event) {
            event.preventDefault();
            if (passwordInput2.type === 'text') {
                passwordInput2.type = 'password';
                toggleIcon2.classList.add('fa-eye-slash');
                toggleIcon2.classList.remove('fa-eye');
            } else if (passwordInput2.type === 'password') {
                passwordInput2.type = 'text';
                toggleIcon2.classList.remove('fa-eye-slash');
                toggleIcon2.classList.add('fa-eye');
            }
        });
    });
</script>
</body>

</html>