<?php
declare(strict_types=1);


$uri = $_SERVER['REQUEST_URI'];

if($uri === '/data/items.json') {
	$buggy = false;
	return require __DIR__ . '/data/items-json.php';
}

if($uri === '/data/items.buggy.json') {
	$buggy = true;
	return require __DIR__ . '/data/items-json.php';
}

http_response_code(404);
exit('Not Found');
