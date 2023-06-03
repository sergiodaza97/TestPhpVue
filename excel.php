<?php

    require_once('./db/connection.php');
    $pdo=getPdo();


    $sql = "SELECT * FROM records";
    $consult = $pdo->prepare($sql);
    $consult->execute();
    $file=$consult->fetchALL(PDO::FETCH_ASSOC);


    header("Content-type: application/xls");
    header("Content-Disposition: attachment; filename = Excel.xls");


 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />

    <title>El título de mi página</title>
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <table >
        <thead>
            <tr>
                <th>Id</th>
                <th>Ronda</th>
                <th>Objeto</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Cierre</th>
                <th>Estado</th>
                <th>Responsable de evento</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($file as $row => $value) {
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td>Ronda</td>
                <td><?php echo $value['object'] ?></td>
                <td><?php echo $value['description'] ?></td>
                <td><?php echo $value['start_date'] ?></td>
                <td><?php echo $value['closing_date'] ?></td>
                <td><?php if($value['status'] == 1){ ?>Activo <?php } ?>
                    <?php if($value['status'] == 2){ ?>Evaluacion <?php } ?>
                    <?php if($value['status'] == 3){ ?>Publicado <?php } ?></td>
                <td><?php echo $value['id'] ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
  </body>
</html>
