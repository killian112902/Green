<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: /Green/');
    exit;
}
$name = htmlspecialchars($_SESSION['user_name'] ?? 'User');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height:100vh; background:#f6f9f6;">
  <div class="text-center p-4">
    <h1 class="mb-3">Welcome, <?php echo $name; ?>!</h1>
    <p>You are now logged in.</p>
    <a href="/Green/auth/logout.php" class="btn btn-outline-secondary mt-3">Log out</a>
  </div>
</body>
</html>
