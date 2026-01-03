<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <title>Login | KOKUTHAN IMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GLOBAL -->
    <link rel="stylesheet" href="/kokuthan/public/css/base.css">

    <!-- AUTH ONLY -->
    <link rel="stylesheet" href="/kokuthan/public/css/auth.css">
</head>
<body>

<div class="login-wrapper">
    <form method="POST" action="/kokuthan/public/login" class="login-box">

        <h2>Login</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="error">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" class="btn">Ingia</button>
    </form>
</div>

</body>
</html>
