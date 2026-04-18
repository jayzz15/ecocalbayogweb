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
$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$date = trim($_POST['date'] ?? '');
$time = trim($_POST['time'] ?? '');
$location = trim($_POST['location'] ?? '');
$category = trim($_POST['category'] ?? '');
$contact = trim($_POST['contact'] ?? '');
$meetingPoint = trim($_POST['meetingPoint'] ?? '');
$maxParticipants = $_POST['maxParticipants'] !== '' ? intval($_POST['maxParticipants']) : null;

if (!$eventId || !$title || !$description || !$date || !$time || !$location || !$category) {
    echo json_encode([
        "success" => false,
        "message" => "Please fill in all required fields."
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
        "message" => "You can only edit your own event."
    ]);
    exit;
}
$checkStmt->close();

$stmt = $conn->prepare("UPDATE events
                        SET title = ?, description = ?, event_date = ?, event_time = ?, location = ?, category = ?,
                            max_participants = ?, contact = ?, meeting_point = ?
                        WHERE id = ? AND creator_id = ?");

$stmt->bind_param(
    "ssssssissii",
    $title,
    $description,
    $date,
    $time,
    $location,
    $category,
    $maxParticipants,
    $contact,
    $meetingPoint,
    $eventId,
    $userId
);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to update event."
    ]);
}

$stmt->close();
$conn->close();
?>