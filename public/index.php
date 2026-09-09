<?php
spl_autoload_register(function ($class) {
    $class = str_replace('App\\', '', $class);
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

require_once __DIR__ . '/../routes/web.php';