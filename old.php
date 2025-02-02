<?php
require_once 'language.php';
session_start();

// Hardcoded username and password for demo purposes
$valid_username = 'admin';
$valid_password = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['user'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error_message = $translations['invalid_credentials'] ?? 'Invalid username or password!';
    }
}



session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $translations['dashboard_title'];?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $translations['welcome_message']; ?>, <?php echo $_SESSION['user']; ?>!</h1>
    <p><?php echo $translations['wifi_settings']; ?></p>

    <form method="POST" id="languageForm">
        <select name="language" id="languageSelect" onchange="this.form.submit()">
            <option value="en">English</option>
            <option value="ja">日本語</option>
            <option value="ko">한국어</option>
        </select>
    </form>
    <a href="logout.php"><?php echo $translations['logout']; ?></a>
</body>
<script>
    // Get the selected language from PHP and set the correct option
    // var selectedLang = "<?php echo $lang; ?>";
    document.getElementById("languageSelect").value = "<?php echo $lang; ?>";
</script>

</html>
