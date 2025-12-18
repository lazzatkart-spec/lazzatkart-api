<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
require_once "db.php";

$data = json_decode(file_get_contents("php://input"), true);

try {
    $stmt = $pdo->prepare("INSERT INTO orders (name, address, phone, items) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $data['name'],
        $data['address'],
        $data['phone'],
        json_encode($data['items'])
    ]);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>

