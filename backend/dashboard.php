<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Access denied.");
}

require 'database.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo "Welcome, " . $user['name'] . "! Your fitness details:<br>";
echo "Height: " . $user['height'] . " cm<br>";
echo "Weight: " . $user['weight'] . " kg<br>";
echo "Workout Days: " . $user['workout_days'] . " per week<br>";
echo "Diet Plan: " . $user['diet_plan'];
?>
