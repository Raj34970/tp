<?php
// Start the session
session_start();

// Get the JSON data from the request
$jsonData = file_get_contents('php://input');

// Generate a unique ID
$uniqueID = uniqid();

// Decode the JSON data into an associative array
$data = json_decode($jsonData, true);

// Add the unique ID to the data array
$data['id'] = $uniqueID;

// Check if the user's JSON file exists
$filename = $_SESSION['email'] . '.json';
$filePath = 'JSON/' . $filename;

if (file_exists($filePath)) {
    // If the user's JSON file exists, read the existing data from the file
    $existingData = file_get_contents($filePath);
    $existingDataArray = json_decode($existingData, true);

    // Find the index of the existing data with the same ID
    $index = -1;
    foreach ($existingDataArray as $key => $item) {
        if (isset($item['id']) && $item['id'] === $uniqueID) {
            $index = $key;
            break;
        }
    }

    if ($index !== -1) {
        // If the existing data with the same ID is found, overwrite it with the new data
        $existingDataArray[$index] = $data;
    } else {
        // If the existing data with the same ID is not found, append the new data
        $existingDataArray[] = $data;
    }

    // Write the updated data to the file
    $newJsonData = json_encode($existingDataArray, JSON_UNESCAPED_UNICODE);
    file_put_contents($filePath, $newJsonData);
} else {
    // If the user's JSON file does not exist, create a new file with the user's email as the filename
    $jsonDataWithID = json_encode([$data], JSON_UNESCAPED_UNICODE);
    file_put_contents($filePath, $jsonDataWithID);
}

// Send a response to the client
header('Content-Type: application/json');
$response = ['status' => 'success'];
echo json_encode($response);
?>
