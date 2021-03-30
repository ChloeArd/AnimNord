<?php

/**
 * Return true if all params are set, false if at least one is missing.
 * @param string ...$params
 * @return bool
 */
function issetPostParams(string ...$params): bool {
    foreach ($params as $param) {
        if (!isset($_POST[$param])) {
        // If only one given parameter is not there, then I return false.
           return false;
        }
    }
    //If we get this far, it means that all the parameters are present.
    return true;
}

/**
 * * Clean up the content of a variable.
 * @param $data
 * @return string
 */
function sanitize($data) {
    // Remove superfluous spaces at the start and end of the string.
    $data = trim($data);
    // Remove backslashes that hackers might use to escape special characters.
    $data = stripslashes($data);
    // Transform some special characters into HTML entities to make them harmless.
    $data = htmlspecialchars($data);
    // Add slashes to avoid closing strings in the form.
    $data = addslashes($data);
    return $data;
}