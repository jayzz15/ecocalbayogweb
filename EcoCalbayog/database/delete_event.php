<?php
session_start();
header('Content-Type: application/json');
include __DIR__ . '/../connections/config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "success" => false,
        "message" => "User not logged in."
    ]);
    exit;
}

$userId = $_SESSION['user_id'];
$eventId = intval($_POST['event_id'] ?? 0);

if ($eventId <= 0) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid event ID."
    ]);
    exit;
}

$checkStmt = $conn->prepare("SELECT id FROM events WHERE id = ? AND creator_id = ?");
$checkStmt->bind_param("ii", $eventId, $userId);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows === 0) {
    echo json_encode([
        "success" => false,
        "message" => "You can only delete your own event."
    ]);
    exit;
}
$checkStmt->close();

$deleteParticipants = $conn->prepare("DELETE FROM event_participants WHERE event_id = ?");
$deleteParticipants->bind_param("i", $eventId);
$deleteParticipants->execute();
$deleteParticipants->close();

$deleteEvent = $conn->prepare("DELETE FROM events WHERE id = ? AND creator_id = ?");
$deleteEvent->bind_param("ii", $eventId, $userId);

if ($deleteEvent->execute()) {
    echo json_encode([
        "success" => true
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to delete event."
    ]);
}

$deleteEvent->close();
$conn->close();
?>