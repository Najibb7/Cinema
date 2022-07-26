<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<select name="distrib">
                    <option value="">DISTRIBUTOR</option>
                    <?php // pour mettre tout les genre possible dans le select
                    $queryshowdis = <<<OUI
                    SELECT name FROM distributor ORDER BY distributor.name ASC
                    OUI;

                    $showdis = $conn->query($queryshowdis);
                    $arrshowdis = $showdis->fetchAll();
                    if ($arrshowdis !== null) {
                        foreach ($arrshowdis as $resultShowdis) {
                            // print_r($arrshowgenre);
                            ?>
                            <?php echo '<option value="' . $resultShowdis['name'] . '">' . $resultShowdis['name'] . '</option>'; ?>
                            <?php
                        }
                    }
                    ?>
                </select>
</body>
</html>