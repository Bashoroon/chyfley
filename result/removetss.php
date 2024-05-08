<?php
// Define the directory path where you want to perform the search and replace
$directory = 'C:\xampp\htdocs\chyf\result';

// Define the string to search for and its replacement
$search = 'CHYFLEY';
$replace = 'CHYFLEY';

// Recursively search and replace in all files within the directory
recursiveSearchAndReplace($directory, $search, $replace);

function recursiveSearchAndReplace($directory, $search, $replace) {
    // Open the directory for reading
    $dir = opendir($directory);

    // Loop through each file and directory
    while (($file = readdir($dir)) !== false) {
        // Skip current and parent directory entries
        if ($file == '.' || $file == '..') {
            continue;
        }

        // Get the full path of the file or directory
        $path = $directory . '/' . $file;

        // If it's a directory, recursively search and replace within it
        if (is_dir($path)) {
            recursiveSearchAndReplace($path, $search, $replace);
        } else {
            // If it's a file, perform search and replace
            if (is_file($path)) {
                // Read the contents of the file
                $content = file_get_contents($path);

                // Perform search and replace
                $content = str_replace($search, $replace, $content);

                // Write the modified content back to the file
                file_put_contents($path, $content);
            }
        }
    }

    // Close the directory handle
    closedir($dir);
}
?>
