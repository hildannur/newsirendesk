<?php
header("Content-Type: application/json");

$file = __DIR__ . "/client_counter.txt";

if (!file_exists($file)) {
    file_put_contents($file, "0");
}

$action = $_GET["action"] ?? "get";

$handle = fopen($file, "c+");

if (!$handle) {
    echo json_encode([
        "success" => false,
        "count" => 0
    ]);
    exit;
}

flock($handle, LOCK_EX);

$count = (int) trim(stream_get_contents($handle));

if ($action === "increment") {
    $count++;
    ftruncate($handle, 0);
    rewind($handle);
    fwrite($handle, (string) $count);
}

flock($handle, LOCK_UN);
fclose($handle);

echo json_encode([
    "success" => true,
    "count" => $count
]);