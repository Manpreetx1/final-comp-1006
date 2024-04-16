<?php

session_start();


if (empty($_SESSION['username'])) {
    
    header("Location: login.php");
    exit();
}

// Include header
$title = 'Upload Logo';
require 'include/header.php';
?>

<main class="container">
    <h1>Upload Logo</h1>

    <form action="save-logo.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="logo">Select Logo:</label>
            <input type="file" class="form-control-file" id="logo" name="logo" accept=".png">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</main>

<?php require 'include/footer.php'; ?>
</body>
</html>