<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Autentikasi</title>

    <!-- Custom fonts for this template-->
    <link href="/dashboardAssets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/dashboardAssets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .password-toggle-wrapper {
            position: relative;
        }

        .password-toggle-wrapper .form-control {
            padding-right: 3rem;
        }

        .password-toggle-button {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #858796;
            padding: 0;
            line-height: 1;
            cursor: pointer;
        }

        .password-toggle-button:focus {
            outline: none;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">
        @yield('auth')
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/dashboardAssets/vendor/jquery/jquery.min.js"></script>
    <script src="/dashboardAssets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/dashboardAssets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/dashboardAssets/js/sb-admin-2.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-toggle-password]').forEach(function (button) {
                button.addEventListener('click', function () {
                    var input = document.getElementById(this.getAttribute('data-target'));
                    var icon = this.querySelector('i');

                    if (!input || !icon) {
                        return;
                    }

                    var isPassword = input.getAttribute('type') === 'password';
                    input.setAttribute('type', isPassword ? 'text' : 'password');
                    icon.classList.toggle('fa-eye', !isPassword);
                    icon.classList.toggle('fa-eye-slash', isPassword);
                });
            });
        });
    </script>

</body>

</html>
