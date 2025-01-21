<?php include 'language.php'; ?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title><?php echo $translations['login_title']; ?></title>
</head>
<body>
    <div class="login-container">
        <h2><?php echo $translations['login_title']?></h2>

        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="<?php echo $translations['username_placeholder']; ?>" required>
            <input type="password" name="password" placeholder="<?php echo $translations['password_placeholder']; ?>" required>
            <button type="submit"><?php echo $translations['login_button']; ?></button>
        </form>
    </div>
</body>
</html>
