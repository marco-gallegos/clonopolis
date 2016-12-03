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
  $stat->bindParam("tablename",$tablename);
  $stat->execute();
  //$colcount = $stat->columnCount();
  $results=$stat->fetchAll(PDO::FETCH_ASSOC);
  $json=json_encode($results);
  //$json = json_decode($json,true);
  //$json['size'] = $colcount;
  echo json_encode($json);

} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
?>
