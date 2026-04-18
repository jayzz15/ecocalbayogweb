<?php
session_start();
header('Content-Type: application/json');
include __DIR__ . '/../connections/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');

    // Required fields
    if (empty($email) || empty($password)) {
        echo json_encode([
            "success" => false,
            "message" => "Email and password are required."
        ]);
        exit;
    }

    // Email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid email address."
        ]);
        exit;
    }

    $stmt = $conn->prepare("SELECT id, fullname, email, password FROM users WHERE email = ?");

    if (!$stmt) {
        echo json_encode([
            "success" => false,
            "message" => "Database error: " . $conn->error
        ]);
        exit;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["fullname"] = $user["fullname"];
            $_SESSION["email"] = $user["email"];

            $redirectUrl = ($user["email"] === 'admin@gmail.com') ? "admin_dashboard.php" : "dashboardUpdate.php";

            echo json_encode([
                "success" => true,
                "message" => "Login successful. Welcome back, " . $user["fullname"] . "!",
                "redirect" => $redirectUrl
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Invalid email or password."
            ]);
        }
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Invalid email or password."
        ]);
    }

    $stmt->close();
    $conn->close();
    exit;
}

echo json_encode([
    "success" => false,
    "message" => "Invalid request method."
]);
exit;
?>