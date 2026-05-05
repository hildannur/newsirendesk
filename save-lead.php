<?php
header("Content-Type: application/json");
date_default_timezone_set("Asia/Jakarta");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "success" => false,
        "message" => "Method tidak valid."
    ]);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);

$name = trim($input["name"] ?? "");
$service = trim($input["service"] ?? "");
$message = trim($input["message"] ?? "");

if ($name === "" || $service === "") {
    echo json_encode([
        "success" => false,
        "message" => "Nama dan kebutuhan wajib diisi."
    ]);
    exit;
}

$leadsFile = __DIR__ . "/leads.json";
$counterFile = __DIR__ . "/client_counter.txt";

if (!file_exists($leadsFile)) {
    file_put_contents($leadsFile, json_encode([]));
}

$leads = json_decode(file_get_contents($leadsFile), true);

if (!is_array($leads)) {
    $leads = [];
}

$newLead = [
    "id" => time(),
    "name" => htmlspecialchars($name, ENT_QUOTES, "UTF-8"),
    "service" => htmlspecialchars($service, ENT_QUOTES, "UTF-8"),
    "message" => htmlspecialchars($message, ENT_QUOTES, "UTF-8"),
    "date" => date("d F Y"),
    "time" => date("H:i"),
    "created_at" => date("Y-m-d H:i:s")
];

array_unshift($leads, $newLead);

file_put_contents(
    $leadsFile,
    json_encode($leads, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);

$clientCount = count($leads);
file_put_contents($counterFile, (string) $clientCount);

echo json_encode([
    "success" => true,
    "message" => "Data berhasil masuk ke halaman admin.",
    "count" => $clientCount
]);