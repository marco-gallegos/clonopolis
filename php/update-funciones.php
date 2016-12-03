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

$query = "UPDATE funciones SET  horario = :hor, pelicula = :peli, sala = :sala where id = :id";
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
  $stat->bindParam(":id",$id);

  $stat->execute();
  echo 1;

} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
 ?>
