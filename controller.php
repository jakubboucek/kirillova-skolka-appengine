<?php
declare(strict_types=1);

switch ($_SERVER['REQUEST_URI']) {
    case '/data/items.json':
        require __DIR__ . '/data/items-json.php';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}
