<?php
header("Content-Type: application/json");
require_once "db.php";

$id = intval($_POST["id"] ?? 0);

if ($id <= 0) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid ID."
    ]);
    exit;
}

$stmt = $conn->prepare("UPDATE people SET status = CASE WHEN status = 0 THEN 1 ELSE 0 END WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    $stmt->close();

    $stmt = $conn->prepare("SELECT status FROM people WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo json_encode([
        "success" => true,
        "status" => intval($row["status"])
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Could not update status."
    ]);
}

$stmt->close();
$conn->close();
?>