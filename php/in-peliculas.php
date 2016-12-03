<?php
session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contrasena"];
if ($pass == "" or $user == "")
{
  echo "no user o pass";
  die();
}

$query = "INSERT INTO peliculas SET nombre = :nombre, duracion = :duracion, clasificacion = :clasificacion, sinopsis = :sinopsis, fecha_estreno = :fecha, idioma = :idioma, genero = :genero ";

$nom = $_POST["nombre"];
$duracion = $_POST["duracion"];
$clasif = $_POST["clasificacion"];
$sinopsis = $_POST["sinopsis"];
$fecha = $_POST["fecha"];
$idioma = $_POST["idioma"];
$genero = $_POST["genero"];
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
  $stat->bindParam(":duracion",$duracion);
  $stat->bindParam(":clasificacion",$clasif);
  $stat->bindParam(":sinopsis",$sinopsis);
  $stat->bindParam(":fecha",$fecha);
  $stat->bindParam(":idioma",$idioma);
  $stat->bindParam(":genero",$genero);
  $stat->execute();
  echo 1;

} catch (PDOException $e)
{
  echo $e.getMessage();
  die();
}


 ?>
