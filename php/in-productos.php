<?php
session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contrasena"];
if ($pass == "" or $user == "")
{
  echo "no user o pass";
  die();
}

$query = "INSERT INTO productos SET nombre = :nom, precio = :precio, descripcion = :descripcion, tam = :tama ";
$nom = $_POST["nombre"];
$precio = $_POST["precio"];
$des = $_POST["descripcion"];
$tamano = $_POST["tam"];
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

  $stat->bindParam(":nom",$nom);
  $stat->bindParam(":precio",$precio);
  $stat->bindParam(":descripcion",$des);
  $stat->bindParam(":tama",$tamano);

  $stat->execute();
  echo 1;
} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
 ?>
