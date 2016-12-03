<?php
session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contrasena"];
$id = $_POST["id"];
if ($pass == "" or $user == "" or $id == "")
{
  echo "no user o id";
  die();
}

$query = "UPDATE boletos SET funcion = :funcion, empleado = :empleado, cliente = :cliente , fecha = :fecha, hora = :hora where id = :id";
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
  $stat->bindParam(":id",$id);

  $stat->execute();
  echo 1;

} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
 ?>
