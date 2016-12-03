<?php
session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contrasena"];
if ($pass == "" or $user == "")
{
  echo "no user o pass";
  die();
}

$query = "INSERT INTO funciones SET  horario = :hor, pelicula = :peli, sala = :sala";
$horario = $_POST["horario"];
$peli = $_POST["pelicula"];
$sala = $_POST["sala"];
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
  $stat->bindParam(":hor",$horario);
  $stat->bindParam(":peli",$peli);
  $stat->bindParam(":sala",$sala);

  $stat->execute();
  echo 1;

} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
 ?>
