<?php
session_start();
include __DIR__ . '/../connections/config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "success" => false,
        "message" => "No logged in user."
    ]);
    exit;
}

$userId = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, fullname, email, barangay, phone FROM users WHERE id = ?");

if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => "Database error: " . $conn->error
    ]);
    exit;
}

$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $joinedEvents = [];
    $stmt_ev = $conn->prepare("SELECT event_id FROM event_participants WHERE user_id = ?");
    $stmt_ev->bind_param("i", $userId);
    if ($stmt_ev->execute()) {
        $res_ev = $stmt_ev->get_result();
        while($ev_row = $res_ev->fetch_assoc()) {
            $joinedEvents[] = $ev_row['event_id'];
        }
    }
    $stmt_ev->close();

    $donations = [];
    $stmt_don = $conn->prepare("SELECT amount FROM donations WHERE user_id = ?");
    $stmt_don->bind_param("i", $userId);
    if ($stmt_don->execute()) {
        $res_don = $stmt_don->get_result();
        while($don_row = $res_don->fetch_assoc()) {
            $donations[] = ["amount" => floatval($don_row['amount'])];
        }
    }
    $stmt_don->close();

    echo json_encode([
        "success" => true,
        "user" => [
            "id" => $row["id"],
            "name" => $row["fullname"],
            "email" => $row["email"],
            "barangay" => $row["barangay"],
            "phone" => $row["phone"],
            "joinedEvents" => $joinedEvents,
            "donations" => $donations
        ]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "User not found."
    ]);
}

$stmt->close();
$conn->close();
?>