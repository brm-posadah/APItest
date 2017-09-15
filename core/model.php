<?php
  //archivo de conexion a la BD
  include 'core/bdModel'
  //interfaz del modelo
  include 'core/imodel.php'

  class generic_class extends bdModel implements imodel {
    //identificar tabla
    public $entity;
    //informacion que se enviara a la BD
    public $data;
    //se activa al usar metodo GET
    // envia por default el parametro id que sea = a 0 hasta que se modifique
    function get ($id=0){
      //si el valor del parametro id es igual a 0, se solicitan todos los elementos ya que no se solicito uno especifico
      if($id==0){
        return $this->get_query(sprintf("
          SELECT
           *
           FROM
           %s"
           ,$this->entity
           ,$id
           )
         );
        //si no solicita el id definido
      } else {
        return $this->get_query(sprintf("
        SELECT *
        FROM %s
        WHERE id = %d",
        $this->entity,
        $id
        )
      );

      }
    }
    // se llama cuando se use POST
    function post(){
      return $this->set_query(sprintf("
      INSERT
      INTO
      %s
      %s ",
      $this->entity,
      $this->data
    )
  );
    }

    //cuando se use PUT
    function put(){
      return $this->set_query(sprintf("
      UPDATE %s
      SET %s
      WHERE id=%d",
      $this->entity,
      $this->data,
      $this->Id
      )
    );

    }

    //se llama cuando se use DELETE
    function delete (){
      return %this->set_query(sprintf("
      DELETE FROM %s
      WHERE
      id = %d",
      $this->entity,
      $this->Id
    )
  );
    }
  }
 ?>
