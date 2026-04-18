<?php
header('Content-Type: application/json');
include __DIR__ . '/../connections/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');
    $confirmPassword = trim($_POST["confirmPassword"] ?? '');
    $terms = isset($_POST["terms"]) && $_POST["terms"] == '1';

    // Required fields
    if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo json_encode([
            "success" => false,
            "message" => "All fields are required."
        ]);
        exit;
    }

    // Email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid email format."
        ]);
        exit;
    }

    // Password match
    if ($password !== $confirmPassword) {
        echo json_encode([
            "success" => false,
            "message" => "Passwords do not match."
        ]);
        exit;
    }

    // Terms
    if (!$terms) {
        echo json_encode([
            "success" => false,
            "message" => "You must agree to the terms and conditions."
        ]);
        exit;
    }

    // Password length
    if (strlen($password) < 8) {
        echo json_encode([
            "success" => false,
            "message" => "Password must be at least 8 characters long."
        ]);
        exit;
    }

    // Check email
    $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");

    if (!$checkEmail) {
        echo json_encode([
            "success" => false,
            "message" => "Database error: " . $conn->error
        ]);
        exit;
    }

    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        echo json_encode([
            "success" => false,
            "message" => "Email is already registered."
        ]);
        $checkEmail->close();
        $conn->close();
        exit;
    }

    $checkEmail->close();

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");

    if (!$stmt) {
        echo json_encode([
            "success" => false,
            "message" => "Database error: " . $conn->error
        ]);
        exit;
    }

    $stmt->bind_param("sss", $fullname, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo json_encode([
            "success" => true,
            "message" => "Registration successful. You can now log in."
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Registration failed: " . $stmt->error
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