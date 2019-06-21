<?php
declare(strict_types=1);

header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');

if($buggy) {
    $random = random_int(0, 10);

    // Bug 1 - Fatal error
    if($random === 0) {
        throw new Exception("Error Processing Request", 1);
    }

    // Bug 2 - string (invalid JSON)
    if($random === 1) {
        die("ahoj");
    }

    // Bug 3 - string (valid JSON)
    if($random === 2) {
        die("\"ahoj\"");
    }
}

// in other cases send regular JSON data
header('Content-type: application/json; charset=utf-8');
$items = [
    "0" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.",
    "1" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.",
    "2" => "Pellentesque sapien. Praesent id justo in neque elementum ultrices.",
    "3" => "Etiam egestas wisi a erat.",
    "4" => "Pellentesque sapien.",
    "5" => "Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede.",
    "6" => "Nullam lectus justo, vulputate eget mollis sed, tempor sed magna.",
    "11" => "Aliquam erat volutpat. Praesent in mauris eu tortor porttitor accumsan.",
    "8" => "Etiam posuere lacus quis dolor.",
];

echo json_encode($items, JSON_PRETTY_PRINT);
