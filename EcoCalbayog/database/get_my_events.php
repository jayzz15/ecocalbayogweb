<?php
session_start();
include __DIR__ . '/../connections/config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "User not logged in."]);
    exit;
}

$userId = $_SESSION['user_id'];

$sql = "SELECT events.id, events.title, events.description, events.event_date, events.event_time,
               events.location, events.category, events.contact, events.meeting_point,
               users.fullname AS creator
        FROM event_participants
        INNER JOIN events ON event_participants.event_id = events.id
        INNER JOIN users ON events.creator_id = users.id
        WHERE event_participants.user_id = ?
        ORDER BY events.event_date ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        "id" => (int)$row["id"],
        "title" => $row["title"],
        "description" => $row["description"],
        "date" => $row["event_date"],
        "time" => $row["event_time"],
        "location" => $row["location"],
        "category" => $row["category"],
        "creator" => $row["creator"]
    ];
}

echo json_encode([
    "success" => true,
    "events" => $events
]);
?>