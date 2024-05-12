<?php
//autoloade.php
spl_autoload_register(function ($class) {
    // Assuming classes are in the 'Styler' namespace and reside in the 'Styler' directory.
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});
