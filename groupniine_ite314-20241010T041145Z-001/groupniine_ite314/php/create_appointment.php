<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $client_id = $con->real_escape_string($data['client_id']);
    $staff_id = $con->real_escape_string($data['staff_id']);
    $service_id = $con->real_escape_string($data['service_id']);
    $appointment_date = $con->real_escape_string($data['appointment_date']);
    $appointment_time = $con->real_escape_string($data['appointment_time']);
    $appointment_duration = $con->real_escape_string($data['appointment_duration']);
    $notes = $con->real_escape_string($data['notes']);

    $sql = "INSERT INTO spa_appointments (client_id, staff_id, service_id, appointment_date, appointment_time, appointment_duration, notes) 
            VALUES ('$client_id', '$staff_id', '$service_id', '$appointment_date', '$appointment_time', '$appointment_duration', '$notes')";

    if ($con->query($sql) === TRUE) {
        echo json_encode(["message" => "Appointment created successfully"]);
    } else {
        echo json_encode(["error" => $con->error]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}

$con->close();
?>