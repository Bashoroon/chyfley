<?php
function findAndReplaceInFiles($directory, $search, $replace) {
    $fileList = glob($directory . '/*.*');
    
    foreach ($fileList as $file) {
        if (is_file($file)) {
            $content = file_get_contents($file);
            $newContent = str_replace($search, $replace, $content);

            // Check if the content has changed before writing back to the file
            if ($newContent !== $content) {
                file_put_contents($file, $newContent);
                echo "Replaced in: $file" . PHP_EOL;
            }
        }
    }
}

// Usage example:
$directory = '';
$search = '/excel';
$replace = '/portal';

findAndReplaceInFiles($directory, $search, $replace);
?>
