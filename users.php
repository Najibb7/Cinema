<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>My Cinema</title>
  </head>
  <body>
      <h1>utilsateur</h1>
      <ul>
        <li>
          <a href="index.php">Accueil</a>
        </li>
        <li><a href="date.php">date</a></li>
        <li><a href="abo.php">historique</a></li>
      </ul>
      
    <form action="users.php" method="get">
      <p>
        Firstname:
        <input type="text" name="stringfirstname" id="inputfn" />
        Lastname:
        <input type="text" name="stringlastname" id="inputln"/>
        <input type="submit" value="Valider" id="submit" />
      </p>
      <br />
      <table class="table-style">
        <thead>
          <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>Adress</th>
            <th>City</th>
        </tr>
        </thead>
        
        <?php
        error_reporting(0);
        require 'bdd.php';

        $strlastname = $_GET['stringlastname'];
        $strfirstname = $_GET['stringfirstname'];

        if (isset($strlastname) && !empty($strlastname) && isset($strfirstname) && !empty($strfirstname)) {
            $queryfullname =<<<OUI
          SELECT * FROM user WHERE lastname LIKE '%$strlastname%' AND firstname LIKE '%$strfirstname%'
          OUI;
            $seekfullname = $conn->query($queryfullname);
            $arrfullname = $seekfullname->fetchAll();
            if ($arrfullname !== null) {
                foreach ($arrfullname as $resultFullName) {
                    // print_r($arrfullname);
                    ?>
              <div id="result">
                <tr>
                  <td><?php echo $resultFullName['lastname']; ?></td>
                  <td><?php echo $resultFullName['firstname']; ?></td>
                  <td><a href="mailto:<?php echo $resultFullName['email']; ?>"><?php echo $resultFullName['email']; ?></a></td>
                  <td><?php echo $resultFullName['birthdate'];?></td>
                  <td><?php echo $resultFullName['address'];?></td>
                  <td><?php echo $resultFullName['city'];?></td>
                </tr>
              </div>
                    <?php
                }
            } else {
                ?>
            <tr>
              <td colspan="3">Pas de résultat trouvé</td>
              </tr>
                <?php
            }
        } elseif (isset($strlastname) && !empty($strlastname)) {
            $querylastname =<<<OUI
          SELECT * FROM user WHERE lastname LIKE '%$strlastname%'
          OUI;
            $seeklastname = $conn->query($querylastname);
            $arrlastname = $seeklastname->fetchAll();
            if ($arrlastname !== null) {
                foreach ($arrlastname as $resultLn) {
                    // print_r($arrlastname);
                    ?>
              <div id="result">
                <tr>
                  <td><?php echo $resultLn['lastname']; ?></td>
                  <td><?php echo $resultLn['firstname']; ?></td>
                  <td><a href="mailto:<?php echo $resultLn['email']; ?>"><?php echo $resultLn['email']; ?></a></td>
                  <td><?php echo $resultLn['birthdate'];?></td>
                  <td><?php echo $resultLn['address'];?></td>
                  <td><?php echo $resultLn['city'];?></td>
                </tr>
              </div>
                    <?php
                }
            } else {
                ?>
            <tr>
              <td colspan="3">Pas de résultat trouvé</td>
              </tr>
                <?php
            }
        } elseif (isset($strfirstname) && !empty($strfirstname)) {
            $queryfirstname =<<<OUI
          SELECT * FROM user WHERE firstname LIKE '%$strfirstname%'
          OUI;
            $seekfirstname = $conn->query($queryfirstname);
            $arrfirstname = $seekfirstname->fetchAll();
            if ($arrfirstname !== null) {
                foreach ($arrfirstname as $resultFn) {
                    // print_r($arrfirstname);
                    ?>
              <div id="result">
                <tr>
                  <td><?php echo $resultFn['lastname']; ?></td>
                  <td><?php echo $resultFn['firstname']; ?></td>
                  <td><a href="mailto:<?php echo $resultFn['email']; ?>"><?php echo $resultFn['email']; ?></a></td>
                  <td><?php echo $resultFn['birthdate'];?></td>
                  <td><?php echo $resultFn['address'];?></td>
                  <td><?php echo $resultFn['city'];?></td>
                </tr>
              </div>
                    <?php
                }
            } else {
                ?>
            <tr>
              <td colspan="3">Pas de résultat trouvé</td>
              </tr>
                <?php
            }
        } else {
            ?>
          <tr>
            <!-- <td colspan="3">Vous n'avez rien écrit.</td> -->
            </tr>
            <?php
        }
        ?>
      </table>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="ajaxrequest.js"></script>
  </body>
</html>