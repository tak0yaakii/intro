<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM spa_appointments";
    $result = $con->query($sql);

    if ($result) {
        $appointments = [];
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }
        echo json_encode($appointments);
    } else {
        echo json_encode(["error" => $con->error]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}

$con->close();
?>