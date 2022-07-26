<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<select name="genre">
                    <option value="">GENRE</option>
                    <?php // pour mettre tout les genre possible dans le select
                    $queryshowgenre = <<<GET
                    SELECT * FROM genre ORDER BY genre.name ASC
                    GET;

                    $showgenre = $conn->query($queryshowgenre);
                    $arrshowgenre = $showgenre->fetchAll();
                    if ($arrshowgenre !== null) {
                        foreach ($arrshowgenre as $resultShowGenre) {
                            // print_r($arrshowgenre);
                            ?>
                            <?php echo '<option value="' . $resultShowGenre['name'] . '">' . $resultShowGenre['name'] . '</option>'; ?>
                            <?php
                        }
                    }
                    ?>
                </select>
</body>
</html>