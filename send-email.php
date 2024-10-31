<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data['email'];
    $items = $data['items'];

    $subject = "New Order from Vivicious Cakes";
    $message = "You have received a new order:\n\n" . implode("\n", $items);
    $headers = "From: no-reply@viviciouscakes.com";

    if (mail($email, $subject, $message, $headers)) {
        echo json_encode(["message" => "Order confirmation sent to $email"]);
    } else {
        echo json_encode(["message" => "Failed to send confirmation email"]);
    }
} else {
    echo json_encode(["message" => "Invalid request"]);
}
?>
