<?php
session_start();
include __DIR__ . '/../connections/config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "success" => false,
        "message" => "Please login to donate."
    ]);
    exit;
}

$user_id = $_SESSION['user_id'];
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
$message = isset($_POST['message']) ? $_POST['message'] : '';

if ($amount <= 0) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid donation amount."
    ]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO donations (user_id, amount, message) VALUES (?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("ids", $user_id, $amount, $message);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Donation successful!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error saving donation."]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Database error."]);
}

$conn->close();
?>
