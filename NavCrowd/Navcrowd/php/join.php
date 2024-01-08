<?php

if (isset($_POST["submit"])) {
    $product_description = $_POST["product_description"];
    $contact_info = $_POST["contact_info"];


    //databse connection
    $conn = new mysqli('localhost', 'root', '', 'listings');

    if ($conn->connect_error) {
        die('Failed to connect' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into list (product_description, contact_info) values(?, ?)");
        $stmt->bind_param("ss", $product_description, $contact_info,);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("location: ../listing-success.html");
    }
}
