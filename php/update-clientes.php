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

$query = "UPDATE clientes SET nombre = :nombre, categoria = :cat where id = :id";
$cat = $_POST["categoria"];
$nom =$_POST["nombre"];

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
  $stat->bindParam(":nombre",$nom);
  $stat->bindParam(":cat",$cat);
  $stat->bindParam(":id",$id);


  $stat->execute();
  echo 1;

} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}

 ?>
