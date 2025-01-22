<?php
// Define the language file path
define('LANGUAGE_FILE', 'language.txt');

// Function to read the current language from the file
function getLanguage() {
    if (file_exists(LANGUAGE_FILE)) {
        $lang = trim(file_get_contents(LANGUAGE_FILE));
        return in_array($lang, ['en', 'ja','ko']) ? $lang : 'en';
    }
    return 'en'; // Default to English if file doesn't exist
}

// Function to update the language in the file
function setLanguage($newLang) {
    if (in_array($newLang, ['en', 'ja','ko'])) {
        file_put_contents(LANGUAGE_FILE, $newLang);
    }
}

// Check if the language is being changed via form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['language'])) {
    setLanguage($_POST['language']);
    header("Location: {$_SERVER['PHP_SELF']}"); // Prevent resubmission
    exit;
}

// Load the selected language
$lang = getLanguage();

// Load translations from JSON files
$lang_file = __DIR__ . "/languages/{$lang}.json";
$translations = json_decode(file_get_contents($lang_file), true) ?? [];

?>
