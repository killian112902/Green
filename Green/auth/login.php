<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /Green/');
    exit;
}


$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = 'Please fill both fields.';
    header('Location: /Green/');
    exit;
}

$mysqli = require __DIR__ . '/../config/db.php';

// Prepared statement to fetch the user
$stmt = $mysqli->prepare('SELECT id, name, email, password_hash FROM users WHERE email = ? LIMIT 1');
if (!$stmt) {
    error_log('Prepare failed: ' . $mysqli->error);
    $_SESSION['login_error'] = 'Server error. Please try again later.';
    header('Location: /Green/');
    exit;
}
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    $_SESSION['login_error'] = 'Invalid email or password.';
    header('Location: /Green/');
    exit;
}

$hash = $user['password_hash'];
if (!password_verify($password, $hash)) {
    $_SESSION['login_error'] = 'Invalid email or password.';
    header('Location: /Green/');
    exit;
}

// Authentication successful
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'] ?? $user['email'];

header('Location: /Green/welcome.php');
exit;
