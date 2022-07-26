<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cinéma</title>
</head>
<body>
    <h1>Gestionnaire du cinéma</h1> 
    <ul>
        <li><a href="users.php">utilsateur</a></li>
        <li><a href="date.php">date</a></li>
        <li><a href="abo.php">historique</a></li>
    </ul>
    <form action="index.php" method="get">
        <span>Rechercher un film : </span>
        <input type="text" name="title" >
        <input type="submit" value="valider">
        <table class="table-style" >
            <thead>
                <tr>
                    <th>Title</th>
                    <th>duration</th>
                    <th>rating</th>
                    <th>genre</th>
                    <th>distrib</th>
                </tr>
            </thead>
            <?php require ('feature/search.php'); ?>
            <div>
                <?php require ('feature/genre.php') ?>
            </div>
            <div>
                <?php
                require ('feature/distributor.php');
                ?>
            </div>
        </table>
    </form>
</body>
</html>
