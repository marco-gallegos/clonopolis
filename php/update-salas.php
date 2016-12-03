<?php
session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contrasena"];
$id = $_POST["id"];
if ($pass == "" or $user == "" or $id == "")
{
  echo "no user o pass";
  die();
}
$query = "UPDATE salas SET butacas = :butacas, butacas_disponibles = :butacasd, tipo = :tipo where id = :id";
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
  $stat->bindParam(":id",$id);

  $stat->execute();
  echo 1;
} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
 ?>
