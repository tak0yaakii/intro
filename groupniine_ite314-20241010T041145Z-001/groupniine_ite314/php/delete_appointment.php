<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $appointment_id = $con->real_escape_string($data['appointment_id']);

    $sql = "DELETE FROM spa_appointments WHERE appointment_id = '$appointment_id'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(["message" => "Appointment deleted successfully"]);
    } else {
        echo json_encode(["error" => $con->error]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}

$con->close();
?>