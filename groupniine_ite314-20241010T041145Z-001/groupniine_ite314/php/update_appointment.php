<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $appointment_id = $con->real_escape_string($data['appointment_id']);
    $client_id = $con->real_escape_string($data['client_id']);
    $service_id = $con->real_escape_string($data['service_id']);
    $appointment_date = $con->real_escape_string($data['appointment_date']);
    $appointment_time = $con->real_escape_string($data['appointment_time']);
    $appointment_duration = $con->real_escape_string($data['appointment_duration']);
    $appointment_status = $con->real_escape_string($data['appointment_status']);
    $notes = $con->real_escape_string($data['notes']);

    $sql = "UPDATE spa_appointments SET 
            client_id = '$client_id',
            service_id = '$service_id',
            appointment_date = '$appointment_date',
            appointment_time = '$appointment_time',
            appointment_duration = '$appointment_duration',
            appointment_status = '$appointment_status',
            notes = '$notes'
            WHERE appointment_id = '$appointment_id'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(["message" => "Appointment updated successfully"]);
    } else {
        echo json_encode(["error" => $con->error]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}

$con->close();
?>