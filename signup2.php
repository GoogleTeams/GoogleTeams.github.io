<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Username = $_POST["Username"];
    $password = $_POST["password"];

    // Prepare data to be saved in JSON format
    $data = array(
        'Username' => $Username,
        'password' => $password
    );

    // Read existing data from JSON file
    $jsonData = file_get_contents('products.json');
    $existingData = json_decode($jsonData, true);

    // Append new data to existing data
    $existingData[] = $data;

    // Encode the updated data array to JSON
    $jsonData = json_encode($existingData, JSON_PRETTY_PRINT);

    // Write the JSON data back to the file
    file_put_contents('products.json', $jsonData);

    // Redirect back to the form page after submission
    header("Location: success.html");
    exit();
}
?>
