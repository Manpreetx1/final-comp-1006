<?php

session_start();


if (empty($_SESSION['username'])) {
    
    header("Location: login.php");
    exit();
}


$title = 'Delete All';
require 'include/header.php';

require 'include/db.php';


$sql = "DELETE FROM exampublishers";

$cmd = $db->prepare($sql);
$cmd->execute();

$db = null;

header("Location: games.php");
exit();
?>

<?php require 'include/footer.php'; ?>
</body>
</html>
