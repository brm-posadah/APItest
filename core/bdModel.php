<?php
include 'config.php';

class bd_model{

  //variable de conexion
  public $conn;
  //constructor, crea y abre conexion
  function __construct{
    $this->conn =new mysqli(bdHost,bdUser,bdPass,bdName);
  }

  // obtener array de resultados, consultas select
  function get_query($sql){
    //lee la cadnea sql y ejecuta
    $result = this->conn->query($sql);
    //recoore el array y lo guarda en $rows
    while ($rows[]= $result->fetch_assoc()){
      //cierra consulta
      $result->close();
      //retorna resultados
      return $rows;
    }
  }

  //funcion para hacer cambios a la BD
  // consultas tipo INSERT,UPDATE y DELETE
  function set_query($sql){
    //lee cadena y ejecuta
    $result = $this->conn->query($sql);
    //retorna resultado
    return $result;
  }

  //funcion destructora, cierra conexion
  function __destruct(){
    &this->conn->close();
  }

}


 ?>
