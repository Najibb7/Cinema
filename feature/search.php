<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
            error_reporting(0);
            require 'bdd.php';
            $search = $_GET['title'];
            $genre = $_GET['genre'];
            $distrib = $_GET['distrib'];
            
            if (isset($search) && !empty($search) && empty($genre)) {
                $requete = "SELECT * FROM movie WHERE title LIKE '%$search%'";
                $req = $conn->query($requete);
                $mov = $req->fetchAll();
                if ($mov !== null) {
                    foreach ($mov as $value) {
                        ?>
                        <tr>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['duration'] ?></td>
                            <td><?php echo $value['rating'] ?></td>
                        </tr> 
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan='3'>
                            pas de film trouvé ...
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan='3'>
                        <?php //echo "Vous n'avez rien écrit !!" ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <?php
            if (isset($search) && isset($genre) && !empty($genre)) {
                
                $req = $conn->query("SELECT * FROM movie INNER JOIN movie_genre ON movie.id = movie_genre.id_movie INNER JOIN genre ON movie_genre.id_genre = genre.id WHERE movie.title LIKE '%$search%' AND genre.name LIKE '%$genre%'");
                $gen = $req->fetchAll();
                if ($gen !== null) {
                    foreach ($gen as $value) {
                        ?>
                        <tr>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['duration'] ?></td>
                            <td><?php echo $value['rating'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            
                        </tr> 
                        <?php
                    }
                }
            }
            ?>
            <!-- DISTRIBUTOR -->
            <?php
            if (isset($search) && isset($distrib) && !empty($distrib)) {
                $req = $conn->query("SELECT * FROM movie INNER JOIN distributor ON movie.id_distributor = distributor.id WHERE movie.title LIKE '%$search%' AND distributor.name LIKE '%$distrib%'");
                $dis = $req->fetchAll();
                if ($dis !== null) {
                    foreach ($dis as $value) {
                        ?>
                        <tr>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['duration'] ?></td>
                            <td><?php echo $value['rating'] ?></td>
                            <td></td>
                            <td><?php echo $value['name'] ?></td>
                        </tr> 
                        <?php
                    }
                }
            }
            ?>
</body>
</html>