<?php
session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contrasena"];

$id = $_POST["id"];

if ($pass == "" or $user == "" or $id == "")
{
  echo "no user o pass o id";
  die();
}

$query = "UPDATE productos SET nombre = :nom, precio = :precio, descripcion = :descripcion, tam = :tama where id = :id";
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
  $stat->bindParam(":id",$id);

  $stat->execute();
  echo 1;
} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}
 ?>
