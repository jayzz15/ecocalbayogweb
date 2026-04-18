<?php
session_start();
include __DIR__ . '/../connections/config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "User not logged in."]);
    exit;
}

$eventId = intval($_POST['event_id'] ?? 0);
$userId = $_SESSION['user_id'];

if ($eventId <= 0) {
    echo json_encode(["success" => false, "message" => "Invalid event ID."]);
    exit;
}

$check = $conn->prepare("SELECT id FROM event_participants WHERE event_id = ? AND user_id = ?");
$check->bind_param("ii", $eventId, $userId);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "You already joined this event."]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO event_participants (event_id, user_id) VALUES (?, ?)");
$stmt->bind_param("ii", $eventId, $userId);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Joined event successfully!"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to join event."]);
}
?>