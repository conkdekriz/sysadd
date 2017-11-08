<?php

class usuario extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');    
    }
    
public function validarrut($rut_sin_guion, $digito_verificador) {

        if (is_numeric($rut_sin_guion) == false) {
            return false;
        }
        if ($digito_verificador != 'k' and $digito_verificador != 'K') {
            if (is_numeric($digito_verificador) == false) {
                return false;
            }
        }
        $cantidad = strlen($rut_sin_guion); //8 o 7 elementos 
        for ($i = 0; $i < $cantidad; $i++) {//pasamos el rut sin guion a un vector 
            $rut_array[$i] = $rut_sin_guion{$i};
        }


        $i = ($cantidad - 1);
        $x = $i;
        for ($ib = 0; $ib < $cantidad; $ib++) {// ingresamos los elementos del ventor rut_array en otro vector pero al reves. 
            $rut_reverse[$ib] = $rut_array[$i];

            $rut_reverse[$ib];
            $i = $i - 1;
        }

        $i = 2;
        $ib = 0;
        $acum = 0;
        do {
            if ($i > 7) {
                $i = 2;
            }
            $acum = $acum + ($rut_reverse[$ib] * $i);
            $i++;
            $ib++;
        } while ($ib <= $x);

        $resto = $acum % 11;
        $resultado = 11 - $resto;
        if ($resultado == 11) {
            $resultado = 0;
        }
        if ($resultado == 10) {
            $resultado = 'k';
        }
        if ($digito_verificador == 'k' or $digito_verificador == 'K') {
            $digito_verificador = 'k';
        }

        if ($resultado == $digito_verificador) {
            return true;
        } else {
            return false;
        }
    }

public function ingresarusuario($usuario) {
        $UPuser = array(
            'rutpersona'              => $usuario['rutpersona'],
            'dvrutpersona'           => $usuario['dvrutpersona'],
            'nombrepersona'           => $usuario['nombrepersona'],
            'apellidopaternopersona' => $usuario['apellidopaternopersona'],
            'apellidomaternopersona'            => $usuario['apellidomaternopersona'],
            'emailpersona'         => $usuario['emailpersona'],
            'passwordpersona'    => $usuario['passwordpersona'],
            'direccionpersona' => 'NULL',
            'fonopersona' => 'NULL',
            'estudiousuario_idestudiousuario' => '1',
            'estadousuario_idestadousuario' => '1',
            'genero_idgenero' => '1',
            'pais_idpais' => '1',
            'nivelestudio_idNivelestudio' => '1',
            'profesion_idprofesion' => '1',
            'nuevapersona'=>'1'
         );
        $UPuserOK = $this->db->insert('persona', $UPuser);
        if ($UPuserOK) {
            return true;
        }else{
            return false; 
        }
    }
    
public function verificausuariorut($rut,$dv, $pass) {

        $this->db->select('idpersona');
        $this->db->where('rutpersona', $rut);
        $this->db->where('dvrutpersona',$dv);
        $this->db->where('passwordpersona', $pass);
        $this->db->limit(1);
        $query = $this->db->get('persona');
        // si el resultado de la query es positivo
        if ($query->num_rows() > 0) {
            // devolvemos TRUE
            if ($query->num_rows() > 0) {
            $id_query = $query->result_array();
            $id_persona = $id_query[0]['idpersona'];
            return $id_persona;
        }
            // si el resultado de la query no es positivo
            return $id_persona;
        } else {
            // devolvemos FALSE
            return null;
        }
    }
    
public function recuperardatos($dato) {
            $this->db->select('*');
            $this->db->from('persona');
            $this->db->where('idpersona', $dato);
            $resultado = $this->db->get();
            return $resultado;
        
    }
    public function actualizadatospersonales($datos,$id){
        
        
        $this->db->where('idpersona', $id['id']);
        $result=$this->db->update('persona', $datos); 
        if($result){
            return true;
        }else{
            return false;
        }
    }
 
}
?>
