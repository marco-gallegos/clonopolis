<?php
session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contrasena"];
if ($pass == "" or $user == "")
{
  echo "no user o pass";
  die();
}
$query = "INSERT INTO salas SET butacas = :butacas, butacas_disponibles = :butacasd, tipo = :tipo";
$butacas = $_POST["butacas"]; $tipo = $_POST["tipo"];$butacasd = $_POST["butacas"];

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

  $stat->bindParam(":butacas",$butacas);
  $stat->bindParam(":butacasd",$butacasd);
  $stat->bindParam(":tipo",$tipo);

  $stat->execute();
  echo 1;
} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
 ?>
