<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $height = floatval($_POST['height']);
    $weight = floatval($_POST['weight']);
    $gender = $_POST['gender'];
    $workout_days = intval($_POST['workout_days']);
    $diet_plan = trim($_POST['diet_plan']);

    try {
        // Check if email already exists
        $check_stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $check_stmt->execute([$email]);

        if ($check_stmt->rowCount() > 0) {
            die("❌ Error: Email is already registered. Please use a different email.");
        }

        // Insert user into the database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, height, weight, gender, workout_days, diet_plan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $password, $height, $weight, $gender, $workout_days, $diet_plan]);

        echo "✅ Registration successful!";
    } catch (PDOException $e) {
        die("❌ Error: " . $e->getMessage());
    }
}
?>
