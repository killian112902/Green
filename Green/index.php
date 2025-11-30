<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Green Store</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Local styles -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/home.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

    <?php include 'components/navbar.php';?>

    <?php include 'navigations/home.php';?>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <?php if(!empty($_SESSION['login_error'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                var msg = <?php echo json_encode($_SESSION['login_error']); ?>;
                var errEl = document.getElementById('loginError');
                if(errEl){
                    errEl.textContent = msg;
                    errEl.classList.remove('d-none');
                }
                var myModalEl = document.getElementById('loginModal');
                if(myModalEl){
                    var myModal = new bootstrap.Modal(myModalEl);
                    myModal.show();
                }
            });
        </script>
        <?php unset($_SESSION['login_error']); endif; ?>
        <script>
            // Password visibility toggle for the login modal
            document.addEventListener('click', function (e) {
                var toggle = e.target.closest('#togglePassword');
                if (!toggle) return;
                var input = document.getElementById('password');
                var icon = document.getElementById('togglePasswordIcon');
                if (!input || !icon) return;
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        </script>
</body>
</html>