<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* Custom background animation */
        body {
            --s: 25vmin;
            --p: calc(var(--s) / 2);
            --c1: pink;
            --c2: dodgerblue;
            --c3: white;
            --bg: var(--c3);
            --d: 4000ms;
            --e: cubic-bezier(0.76, 0, 0.24, 1);

            background-color: var(--bg);
            background-image:
                linear-gradient(45deg, var(--c1) 25%, transparent 25%),
                linear-gradient(-45deg, var(--c1) 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, var(--c2) 75%),
                linear-gradient(-45deg, transparent 75%, var(--c2) 75%);
            background-size: var(--s) var(--s);
            background-position:
                calc(var(--p) * 1) calc(var(--p) * 0),
                calc(var(--p) * -1) calc(var(--p) * 1),
                calc(var(--p) * 1) calc(var(--p) * -1),
                calc(var(--p) * -1) calc(var(--p) * 0);
            animation: color var(--d) var(--e) infinite, position var(--d) var(--e) infinite;
        }

        @keyframes color {
            0%, 25% { --bg: var(--c3); }
            26%, 50% { --bg: var(--c1); }
            51%, 75% { --bg: var(--c3); }
            76%, 100% { --bg: var(--c2); }
        }

        @keyframes position {
            0% { background-position: calc(var(--p) * 1) calc(var(--p) * 0), calc(var(--p) * -1) calc(var(--p) * 1), calc(var(--p) * 1) calc(var(--p) * -1), calc(var(--p) * -1) calc(var(--p) * 0); }
            25% { background-position: calc(var(--p) * 1) calc(var(--p) * 4), calc(var(--p) * -1) calc(var(--p) * 5), calc(var(--p) * 1) calc(var(--p) * 3), calc(var(--p) * -1) calc(var(--p) * 4); }
            50% { background-position: calc(var(--p) * 3) calc(var(--p) * 8), calc(var(--p) * -3) calc(var(--p) * 9), calc(var(--p) * 2) calc(var(--p) * 7), calc(var(--p) * -2) calc(var(--p) * 8); }
            75% { background-position: calc(var(--p) * 3) calc(var(--p) * 12), calc(var(--p) * -3) calc(var(--p) * 13), calc(var(--p) * 2) calc(var(--p) * 11), calc(var(--p) * -2) calc(var(--p) * 12); }
            100% { background-position: calc(var(--p) * 5) calc(var(--p) * 16), calc(var(--p) * -5) calc(var(--p) * 17), calc(var(--p) * 5) calc(var(--p) * 15), calc(var(--p) * -5) calc(var(--p) * 16); }
        }

        @media (prefers-reduced-motion) {
            body {
                animation: none;
            }
        }

        /* Login form styles */
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
        }

        .form-group {
            position: relative;
        }

        .form-group i {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #888;
        }

        .form-control {
            padding-left: 40px;
            border-radius: 20px;
        }

        .btn-primary {
            width: 100%;
            border-radius: 20px;
            padding: 10px;
        }

        .social-login {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .social-login a {
            text-align: center;
            flex-basis: 48%;
            padding: 10px;
            border-radius: 20px;
            color: #fff;
            text-decoration: none;
        }

        .google {
            background-color: #ea4335;
        }

        .facebook {
            background-color: #3b5998;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .alert {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-container animate__animated animate__fadeInUp">
        <h1>Login</h1>
        <form action="<?= BASEURL; ?>/login/index" method="POST">
            <div class="form-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="social-login">
            <a href="#" class="google"><i class="fab fa-google"></i> Google</a>
            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
        </div>
        <div class="register-link">
            <p><a href="<?= BASEURL; ?>/register">Don't have an account? Register here</a></p>
        </div>
        <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <?= htmlspecialchars($data['error']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>
