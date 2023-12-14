<?php
    $uri = parse_url($_SERVER['REQUEST_URI']);
    $path = $uri['path'];

    $routes = [
        '/' => 'controllers/indexController.php',
        '/index.php' => 'controllers/indexController.php',
        '/about' => 'controllers/aboutController.php',
        '/blog' => 'controllers/blogController.php',
        '/category' => 'controllers/categoryController.php',
        '/contact' => 'controllers/contactController.php',
        '/search' => 'controllers/searchController.php',
        '/single' => 'controllers/singleController.php',

        '/add' => 'controllers/admin/addController.php',
    ];

    routeToCOntroller($path, $routes);