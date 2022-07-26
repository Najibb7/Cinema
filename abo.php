<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>historique d'un abonné</h1>
    <ul>
        <li>
            <a href="index.php">accueil</a>
            <li><a href="users.php">utilsateur</a></li>
            <li><a href="date.php">date</a></li>
        </li>
    </ul>

    <form action="abo.php" method="get">
        <input type="text" name="user">
        <input type="submit" value="valider">
        <table class="table-style">
            <thead>
                <tr>
                    <th>User</th>
                    <th>film</th>
                </tr>
            </thead>
            <?php 
            error_reporting(0);
            require 'bdd.php';
            $user = $_GET['user'];
            if (isset($user) && !empty($user)) {
                $req = "SELECT *
                FROM movie 
                INNER JOIN movie_schedule ON movie.id = movie_schedule.id_movie 
                INNER JOIN membership_log ON movie_schedule.id = membership_log.id_session 
                INNER JOIN membership ON membership_log.id_membership = membership.id  
                INNER JOIN user ON membership.id_user = user.id 
                WHERE user.firstname = '$user'";
                $see = $conn->query($req);
                $arr = $see->fetchAll();
                if ($arr !== null) {
                    foreach ($arr as $value) {
                        // print_r($arrfullname);
                        ?>
                    <tr>
                        <td><?php echo $value['firstname']; ?></td>
                        <td><?php echo $value['title']; ?></td>
                    </tr>
                        <?php
                    }
                } else {
                    ?>
                <tr>
                    <td colspan="3">Pas de résultat trouvé</td>
                </tr>
                    <?php
                }
            }
            ?>
</html>