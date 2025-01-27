<?php
session_start();
include 'language.php';

// Handle language change request
if (isset($_POST['language'])) {
    $lang = $_POST['language'];
    if (in_array($lang, ['en', 'ja'])) {
        $_SESSION['lang'] = $lang;
    }
}

// Load the updated translations after changing the language
$lang = getLanguage(); // Reload language from session
$lang_file = __DIR__ . "/languages/{$lang}.json";
$translations = json_decode(file_get_contents($lang_file), true) ?? [];

// Return updated translations as JSON
echo json_encode([
    'welcome_message' => $translations['welcome_message'] ?? 'Welcome',
]);
?>
