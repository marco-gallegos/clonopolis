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

$query = "UPDATE empleados SET nombre = :nombre, puesto = :puesto, edad = :edad, direccion = :direccion, sexo = :sexo, telefono = :telefono, nss = :nss where id = :id";
$nom = $_POST["nombre"]; $puesto = $_POST["puesto"]; $edad = $_POST["edad"]; $dir = $_POST["direccion"]; $sex = $_POST["sexo"]; $tel = $_POST["telefono"]; $nss = $_POST["nss"];

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
  $stat->bindParam(":puesto",$puesto);
  $stat->bindParam(":edad",$edad);
  $stat->bindParam(":direccion",$dir);
  $stat->bindParam(":sexo",$sex);
  $stat->bindParam(":telefono",$tel);
  $stat->bindParam(":nss",$nss);
  $stat->bindParam(":id",$id);
  
  $stat->execute();
  echo 1;

} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}

 ?>
