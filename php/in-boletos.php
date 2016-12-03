<?php
session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contrasena"];
if ($pass == "" or $user == "")
{
  echo "no user o pass";
  die();
}

$query = "INSERT INTO boletos SET funcion = :funcion, empleado = :empleado, cliente = :cliente , fecha = :fecha, hora = :hora";
$func = $_POST["funcion"]; $emple = $_POST["empleado"]; $client = $_POST["cliente"]; $fecha  = $_POST["fecha"]; $hor = $_POST["hora"];

try
{
  $con = new PDO('mysql:host=localhost;dbname=clonopolis', $user, $pass);
} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
try
{
  $stat = $con->prepare($query);
  $stat->bindParam(":funcion",$func);
  $stat->bindParam(":empleado",$emple);
  $stat->bindParam(":cliente",$client);
  $stat->bindParam(":fecha",$fecha);
  $stat->bindParam(":hora",$hor);

  $stat->execute();
  echo 1;

} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
 ?>
