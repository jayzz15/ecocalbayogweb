<?php
header('Content-Type: application/json');
include __DIR__ . '/../connections/config.php';

$sql = "SELECT events.id, events.title, events.description, events.event_date, events.event_time,
               events.location, events.category, events.max_participants,
               events.contact, events.meeting_point,
               users.fullname AS creator
        FROM events
        INNER JOIN users ON events.creator_id = users.id
        ORDER BY events.event_date ASC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode([
        "success" => false,
        "message" => "Query error: " . mysqli_error($conn)
    ]);
    exit;
}

$events = [];

while ($row = mysqli_fetch_assoc($result)) {
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

$conn->close();
?>