<?php

class Usuario{
    var $usuario;
    var $clave;
    
    public function _construct($usuario="",$clave=""){
        $this->clave=$clave;
        $this->usuario=$usuario;
    }
    
    public function VerificaAcceso(){
        $uConn = new Conexion();
        if($uConn->Conectar())
            $db=$uConn->objConn;
        else
            return false;
        
        $clavemd5 = md5($this->clave);
        
        $sql ="SELECT * FROM acceso WHERE nomusuario='$this->$usuario' and pwdusuario='$clavemd5'";
        $resultado = $db->query($sql); 
        if($resultado->num_rows>=1){
            $this->idusuario=0;
            $this->nombre="";
            return true;
        }else{
            return false;
        }
        
    }
}
?>
