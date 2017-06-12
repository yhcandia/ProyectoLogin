<?php
class Usuario{
    
    var $idusuario;
    var $nombre;
    var $clave;
    
    function __construct($usu="",$clave=""){
        $this->nombre=$usu;
        $this->clave=$clave;
    }
    
    /*Valida la existencia del usuario*/
    function VerificaUsuario(){
        $oConn=new Conexion();
        
        if ($oConn->Conectar())
            $db=$oConn->objconn;
        else
            return false;
        
        $sql="SELECT * FROM acceso WHERE nomusuario='$this->nombre'";
        
        $resultado=$db->query($sql);
               
        if ($resultado->num_rows>=1)
            return true;
        else
            return false;
        
    }
    
    function VerificaUsuarioClave(){
        $oConn=new Conexion();
        
        if ($oConn->Conectar())
            $db=$oConn->objconn;
        else
            return false;
        
        $clavemd5=md5($this->clave);
        $sql="SELECT * FROM acceso WHERE nomusuario='$this->nombre' and pwdusuario='$clavemd5'";
              
        $resultado=$db->query($sql);
               
        if ($resultado->num_rows>=1)
            return true;
        else
            return false;
        
    }
    
    function VerificaLocal(){
        $usu="hsilva";
        $key="12345";
        
        if ($this->nombre==$usu && $this->clave==$key)
            return true;
        else
            return false;
    
    }
    
}