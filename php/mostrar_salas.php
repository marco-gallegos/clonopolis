<html>
    <head>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap-theme.min.css" media="screen" title="no title">
  <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" title="no title">
  <script src="../js/jquery-3.1.0.min.js" charset="utf-8"></script>
  <script src="../js/bootstrap.min.js" charset="utf-8"></script>
        <title>Last 10 Results</title>
    </head>
    <body>
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Asientos</th>
                <th>Asientos Disponibles</th>
                <th>tipo</th>
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
          $tablename = "salas";

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
          $query = "SELECT  * FROM salas";

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
                    <td><?php echo $row['butacas']?></td>
                    <td><?php echo $row['butacas_disponibles']?></td>
                    <td><?php echo $row['tipo']?></td>
                </tr>

            <?php
             }
            ?>
            </tbody>
            </table>
    </body>
</html>
