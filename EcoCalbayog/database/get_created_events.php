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

$stmt = $conn->prepare("SELECT events.id, events.title, events.description, events.event_date, events.event_time,
                               events.location, events.category, events.max_participants,
                               events.contact, events.meeting_point,
                               users.fullname AS creator
                        FROM events
                        INNER JOIN users ON events.creator_id = users.id
                        WHERE events.creator_id = ?
                        ORDER BY events.event_date ASC");

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
        "maxParticipants" => $row["max_participants"],
        "creator" => $row["creator"],
        "contact" => $row["contact"],
        "meetingPoint" => $row["meeting_point"]
    ];
}

echo json_encode([
    "success" => true,
    "events" => $events
]);

$stmt->close();
$conn->close();
?>