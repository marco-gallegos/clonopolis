<html>
    <head>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Last 10 Results</title>
    </head>
    <body>
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Edad</th>
                <th>Domicilio</th>
                <th>Sexo</th>
                <th>Telefono</th>
                <th>NSS</th>
            </tr>
        </thead>
        <tbody>
        <?php
        session_start();
        $user = $_SESSION["usuario"];
        $pass = $_SESSION["contrasena"];
        if ($pass == "" or $user == "")
        {
          echo "no user o pass";
          die();
        }

          $databaseName = "clonopolis";
          $tablename = "empleados";

          //--------------------------------------------------------------------------
          // 1) Connect to mysql database
          //--------------------------------------------------------------------------
          try
        {
          $con = new PDO('mysql:host=localhost;dbname=clonopolis', $user, $pass);
        } catch (PDOException $e)
        {
          echo $e.getMessage();
          die();
        }
          $query = "SELECT  * FROM empleados";

        try
        {
          $stat = $con->prepare($query);
          $stat->bindParam(":tablename",$tablename);
          $stat->execute();
          //$colcount = $stat->columnCount();

          $results=$stat->fetchAll(PDO::FETCH_ASSOC);
          $json=json_encode($results);
          //$json = json_decode($json,true);
          //$json['size'] = $colcount;
          //echo json_encode($json);
        } catch (PDOException $e)
        {
          echo $e.getMessage();
          die();
        }
        
        foreach ($con->query($query) as $row) {
        ?>

                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['nombre']?></td>
                    <td><?php echo $row['puesto']?></td>
                    <td><?php echo $row['edad']?></td>
                    <td><?php echo $row['direccion']?></td>
                    <td><?php echo $row['sexo']?></td>
                    <td><?php echo $row['telefono']?></td>
                    <td><?php echo $row['nss']?></td>
                </tr>

            <?php
             }
            ?>
            </tbody>
            </table>
    </body>
</html>