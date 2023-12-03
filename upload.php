    <?php
    $firebaseConfig = [
        'project_id' => 'your_project_id',
        'api_key' => 'your_api_key',
        // Add other configuration details here
    ];
    
    $filePath = '/path/to/your/file.jpg'; // Replace this with the path to your file
    $fileName = 'uploaded_file.jpg'; // Name for the file in Firebase Storage
    
    // Firebase Storage URL
    $storageUrl = "https://firebasestorage.googleapis.com/v0/b/{$firebaseConfig['project_id']}.appspot.com/o/{$fileName}?uploadType=media";
    
    $fileContent = file_get_contents($filePath);
    
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $storageUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $fileContent,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/octet-stream',
            'Authorization: Bearer ' . $firebaseConfig['api_key'],
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error: " . $err;
    } else {
        echo "File uploaded successfully!";
    }
    ?>
