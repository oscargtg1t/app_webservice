<?php
include "config.php";
include "utils.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');
header("400 Bad Request");

$dbConn =  connect($db);
$dbConn2 =  connect2($db2);

//metodo login para agricultor
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (isset($_POST['correo_agricultor'])) {
      $sql = $dbConn->prepare("SELECT * FROM agricultores where correo_agricultor=:correo_agricultor and pass=:pass");
      $sql->bindValue(':correo_agricultor', $_POST['correo_agricultor']);
      $sql->bindValue(':pass', $_POST['pass']);
      $sql->execute();
      
    if ($sql->rowCount() == 0) {
      header("404 Not Found");
      $request =[
        'mensaje' => " Autenticación fallida! El usuario no existe en la base de datos"
      ];
      echo json_encode($request);
      exit();
    } else {
      header("200 OK");
      //echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
      $request =[
        'mensaje' => "Autenticación exitosa"
      ];
      echo json_encode($request);
      exit();
    }
  }
    else {
      
      header("404 not found");
      $request =[
        'mensaje' => "404: No autorizado"
      ];
      echo json_encode($request);
      exit();
	}
}

//metodo login para userbeneicio
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (isset($_POST['correo'])) {
      $sql = $dbConn->prepare("SELECT * FROM userbeneficio where correo=:correo and pass=:pass");
      $sql->bindValue(':correo', $_POST['correo']);
      $sql->bindValue(':pass', $_POST['pass']);
      $sql->execute();
      
    if ($sql->rowCount() == 0) {
      header("404 Not Found");
      $request =[
        'mensaje' => " Autenticación fallida! El usuario no existe en la base de datos"
      ];
      echo json_encode($request);
      exit();
    } else {
      header("200 OK");
      //echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
      $request =[
        'mensaje' => "Autenticación exitosa"
      ];
      echo json_encode($request);
      exit();
    }
  }
    else {
      
      header("404 not found");
      $request =[
        'mensaje' => "404: No autorizado"
      ];
      echo json_encode($request);
      exit();
	}
}

//metodo login para userpesocabal
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (isset($_POST['correo_userpeso'])) {
      $sql = $dbConn2->prepare("SELECT * FROM userpesocabal where correo_userpeso=:correo_userpeso and pass=:pass");
      $sql->bindValue(':correo_userpeso', $_POST['correo_userpeso']);
      $sql->bindValue(':pass', $_POST['pass']);
      $sql->execute();
      
    if ($sql->rowCount() == 0) {
      header("404 Not Found");
      $request =[
        'mensaje' => " Autenticación fallida! El usuario no existe en la base de datos"
      ];
      echo json_encode($request);
      exit();
    } else {
      header("200 OK");
      //echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
      $request =[
        'mensaje' => "Autenticación exitosa"
      ];
      echo json_encode($request);
      exit();
    }
  }
    else {
      
      header("404 not found");
      $request =[
        'mensaje' => "404: No autorizado"
      ];
      echo json_encode($request);
      exit();
	}
}

?>
