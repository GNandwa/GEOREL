<?php
session_start();

include("config.php");

// Check if the ID is set
if (isset($_GET['id'])) {
    $mealId = intval($_GET['id']);

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM meals WHERE id = ?");
    $stmt->bind_param("i", $mealId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
