<?php
header("Content-Type: application/json");
require_once "db.php";

$name = trim($_POST["name"] ?? "");
$age = intval($_POST["age"] ?? 0);

if ($name === "" || $age < 1 || $age > 120) {
    echo json_encode([
        "success" => false,
        "message" => "Please enter a valid name and age."
    ]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO people (name, age, status) VALUES (?, ?, 0)");
$stmt->bind_param("si", $name, $age);

if ($stmt->execute()) {
    $id = $stmt->insert_id;

    echo json_encode([
        "success" => true,
        "id" => $id,
        "name" => htmlspecialchars($name, ENT_QUOTES, "UTF-8"),
        "age" => $age,
        "status" => 0
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Could not save the data."
    ]);
}

$stmt->close();
$conn->close();
?>