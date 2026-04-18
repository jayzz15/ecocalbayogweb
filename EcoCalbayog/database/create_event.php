<?php
session_start();
include __DIR__ . '/../connections/config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "User not logged in."]);
    exit;
}

$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$date = trim($_POST['date'] ?? '');
$time = trim($_POST['time'] ?? '');
$location = trim($_POST['location'] ?? '');
$category = trim($_POST['category'] ?? '');
$contact = trim($_POST['contact'] ?? '');
$meetingPoint = trim($_POST['meetingPoint'] ?? '');
$maxParticipants = !empty($_POST['maxParticipants']) ? intval($_POST['maxParticipants']) : null;

if (empty($title) || empty($description) || empty($date) || empty($time) || empty($maxParticipants) || empty($location) || empty($category)) {
    echo json_encode(["success" => false, "message" => "Please fill in all required fields."]);
    exit;
}

$userId = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO events (title, description, event_date, event_time, location, category, creator_id, contact, meeting_point, max_participants)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssissi", $title, $description, $date, $time, $location, $category, $userId, $contact, $meetingPoint, $maxParticipants);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Event created successfully!"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to create event."]);
}
?>