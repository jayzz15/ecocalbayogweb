<?php
session_start();
header('Content-Type: application/json');
include __DIR__ . '/../connections/config.php';

$eventId = intval($_GET['event_id'] ?? 0);

if ($eventId <= 0) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid event ID."
    ]);
    exit;
}

$stmt = $conn->prepare("SELECT users.id, users.fullname, users.email
                        FROM event_participants
                        INNER JOIN users ON event_participants.user_id = users.id
                        WHERE event_participants.event_id = ?
                        ORDER BY users.fullname ASC");

if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => "Database error: " . $conn->error
    ]);
    exit;
}

$stmt->bind_param("i", $eventId);
$stmt->execute();
$result = $stmt->get_result();

$participants = [];

while ($row = $result->fetch_assoc()) {
    $participants[] = [
        "id" => $row["id"],
        "fullname" => $row["fullname"],
        "email" => $row["email"]
    ];
}

echo json_encode([
    "success" => true,
    "participants" => $participants
]);

$stmt->close();
$conn->close();
?>