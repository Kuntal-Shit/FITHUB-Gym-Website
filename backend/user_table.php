<?php
require 'database.php';

$query = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    height FLOAT,
    weight FLOAT,
    gender ENUM('Male', 'Female', 'Other'),
    workout_days INT,
    diet_plan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($query);
echo "✅ Users table is ready!";
?>
