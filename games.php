<?php
$title = 'Our Games';
require 'include/header.php'; ?>

<h1>Our Games</h1>

<?php

if (!empty($_SESSION['username'])) {
    
    echo '<button class="btn btn-danger" id="deleteAllBtn">Delete All</button>';
}
?>

<?php
require 'include/db.php';

$sql = "SELECT examgames.*, exampublishers.name FROM examgames 
        INNER JOIN exampublishers ON examgames.publisherId = exampublishers.publisherId";

$cmd = $db->prepare($sql);
$cmd->execute();
$games = $cmd->fetchAll();

echo '<table class="table table-striped table-hover">
        <thead>
            <th>Title</th>
            <th></th>
            <th>Release Year</th>
            <th>Rating</th>
            <th>Publisher</th>        
            <th></th>
        </thead>';

foreach ($games as $v) {
    echo '<tr><td>';
    if (!empty($_SESSION['username'])) {
        echo '<a href="game-details.php?gameId=' . $v['gameId'] . '">
                ' . $v['title'] . '</a>';
    } else {
        echo $v['title'];
    }
    echo '</td>';
    echo '<td>';
    if ($v['photo'] != null) {
        echo '<img src="img/game-uploads/' . $v['photo'] . '" alt="Game Image"
                class="thumbnail">';
    }

    echo '</td>';
    echo   '<td>' . $v['releaseYear'] . '</td>
            <td>' . $v['rating'] . '</td>
            <td>' . $v['name'] . '</td>
            <td>';
    if (!empty($_SESSION['username'])) {
        echo '<a href="delete-game.php?gameId=' . $v['gameId'] . '" 
                class="btn btn-danger" onclick="return yaSure();">Delete</a>';
    }
    echo '</td></tr>';
}

echo '</table>';

$db = null;

?>

<script>
    
    document.getElementById('deleteAllBtn').addEventListener('click', function() {
        var confirmDelete = confirm("Are you sure you want to delete all games?");
        if (confirmDelete) {
            window.location.href = "delete-all.php";
        }
    });

    
    function yaSure() {
        return confirm("Are you sure you want to delete this game?");
    }
</script>

<?php require 'include/footer.php'; ?>
</body>
</html>
