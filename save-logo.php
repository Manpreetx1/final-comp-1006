<?php

session_start();


if (empty($_SESSION['username'])) {

    header("Location: login.php");
    exit();
}


if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    
    $fileType = $_FILES['logo']['type'];
    if ($fileType === 'image/png') {
        
        $uploadDir = 'img/';

        
        $filename = uniqid('logo_') . '.png';

        
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadDir . $filename)) {
         
            echo "Logo uploaded successfully.";
        } else {
        
            echo "Failed to upload logo. Please try again.";
        }
    } else {
        
        echo "Invalid file type. Please upload a PNG image.";
    }
} else {
    
    echo "No logo file uploaded or an error occurred.";
}
?>
