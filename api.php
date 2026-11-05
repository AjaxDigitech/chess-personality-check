<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// --- UPDATE THESE WITH YOUR HOSTINGER DB DETAILS ---
$host = 'localhost'; 
$db   = 'u740418765_chessdbxd';
$user = 'u740418765_chessuserxd';
$pass = 'Z:eTKqK29p88'; // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(['error' => 'Database connection failed']));
}

$action = $_GET['action'] ?? '';

if ($action === 'get') {
    $stmt = $pdo->query("SELECT page_views, tests_completed, total_likes FROM global_stats WHERE id = 1");
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
} 
elseif ($action === 'view') {
    $pdo->query("UPDATE global_stats SET page_views = page_views + 1 WHERE id = 1");
    echo json_encode(['success' => true]);
} 
elseif ($action === 'like') {
    $pdo->query("UPDATE global_stats SET total_likes = total_likes + 1 WHERE id = 1");
    $stmt = $pdo->query("SELECT total_likes FROM global_stats WHERE id = 1");
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
} 
elseif ($action === 'complete') {
    $pdo->query("UPDATE global_stats SET tests_completed = tests_completed + 1 WHERE id = 1");
    echo json_encode(['success' => true]);
}
?>
