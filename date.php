<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1> Programmation des séances</h1>
    <ul>
        <li>
            <a href="index.php">Accueil</a>
            <li><a href="users.php">utilsateur</a></li>
            <li><a href="abo.php">historique</a></li>
        </li>
    </ul>
    <form action="date.php" method="GET">
        <input type="date" name="DateBegin">
        <input type="submit" value="valider">

    <table class="table-style">
        <thead>
            <tr>
                <th>film</th>
                <th>date</th>
        </tr>
        </thead>
        
    <?php
    require 'bdd.php';
    error_reporting(0);
    $DB = htmlspecialchars($_GET['DateBegin']);
    if (isset($DB) && !empty($DB)) {
        $top = $conn->query("SELECT movie.title, movie_schedule.date_begin FROM movie INNER JOIN movie_schedule ON movie.id = movie_schedule.id_movie WHERE movie_schedule.date_begin LIKE '%$DB%' ORDER BY movie_schedule.date_begin ASC");
        $pot = $top->fetchAll();
        if ($pot !== null) {
            foreach ($pot as $value) {
                ?>
            <tr>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo $value['date_begin'] ?></td>
                
            </tr> 
                <?php
            }
        }
    }
    ?>
</table>
</form>
</body>
</html>