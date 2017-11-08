<?php

use setasign\Fpdi\Fpdi;

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); 

class Ctl_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'security', 'html', 'captcha'));
        $this->load->model('Usuario');
        $this->load->model('File');
        $this->load->library(array('session', 'form_validation', 'email'));
    }

    public function index() {
        $usuariologg = $this->comprobaruserlog($this->session->userdata('usuario_id'));
        if ($usuariologg) {

            $this->load->view('/usuario/vst_userlog', $usuariologg);
            $this->load->view("vst_footer");
        } else {
            redirect('http://www.sysadd.cl');
        }
    }

    public function registrousuario() {
        $usuariologg = $this->comprobaruserlog($this->session->userdata('usuario_id'));
        if ($usuariologg) {
            $this->load->view('/usuario/vst_userlog', $usuariologg);
        } else {
            $this->load->view('usuario/vst_registrar');
        }
    }

    public function registrarusuario() {
        $usuariologg = $this->comprobaruserlog($this->session->userdata('usuario_id'));
        if ($usuariologg) {
            $this->load->view('/usuario/vst_userlog', $usuariologg);
        } else {

            $Usuario = array();
            $RutUser1 = $this->input->post('rutUser');
            $RutUser = str_replace('.', '', $RutUser1);

            if (strpos($RutUser, '-')) {
                $Rut = explode('-', $RutUser);
                $bool = $this->Usuario->validarrut($Rut[0], $Rut[1]);
            } else {
                $bool = false;
            }

            if ($bool) {
                $Usuario['rutpersona'] = $Rut[0];
                $Usuario['dvrutpersona'] = $Rut[1];
            }
            $Usuario['emailpersona'] = $this->input->post('emailUser');

            $this->form_validation->set_data($Usuario);

            $this->form_validation->set_rules('rutpersona', 'rut', 'is_unique[persona.rutpersona]');
            $this->form_validation->set_rules('emailpersona', 'email', 'is_unique[persona.emailpersona]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('usuario/vst_registrar');
            } else {
                $Usuario['nombrepersona'] = strtoupper($this->input->post('nombreUser'));
                $Usuario['apellidopaternopersona'] = strtoupper($this->input->post('apellidopaternoUser'));
                $Usuario['apellidomaternopersona'] = strtoupper($this->input->post('apellidomaternoUser'));

                $Usuario['passwordpersona'] = $this->input->post('passwordUser');

                $cuenta = count($Usuario);
                if ($cuenta == '7') {
                    $res_ok = $this->Usuario->ingresarusuario($Usuario);
                    if ($res_ok) {
                        //verificausuario
                        $id = $this->Usuario->verificausuariorut($Rut[0], $Rut[1], $Usuario['passwordpersona']);

                        if (!is_null($id)) {
                            // creamos un array con las variables de sesión 'usuario_id' y 'login_ok'
                            $datasession = array(
                                'usuario_id' => $id,
                                'login_ok' => TRUE
                            );
                            // creamos la sesión con dichas variables
                            $this->session->set_userdata($datasession);
                            // y redirigimos al controlador principal
                            //enviamos email
                            //$arrTags = array('NOMBRE' =>$Usuario['NombreUser'] , 'APELLIDO' => $Usuario['ApellidopaternoUser'], 'CLAVE' => $Usuario['PasswordUser'], 'BASE_URL' => base_url());
                            // Correo bienvenida//   $resultado_envio = Envia($arrTags, 'registro_postulante', 'info@tclouding.com',  $Usuario['EmailUser'], 'BIENVENIDO A KEYCLOUDING');
                            $usuario['files'] = $this->File->getRows($this->session->userdata('usuario_id'));
                            $usuario['id'] = $this->session->userdata('usuario_id');
                            $complementoDatos = $this->Usuario->recuperardatos($usuario['id']);

                            if ($complementoDatos->num_rows() > 0) {
                                $datosusuario = $complementoDatos->result_array();
                                $usuario['nombreuser'] = $datosusuario[0]['nombrepersona'];
                                
                                $datosusuario = $complementoDatos->result_array();
                                $usuario['apellidopaternouser'] = $datosusuario[0]['apellidopaternopersona'];

                                $datosusuario = $complementoDatos->result_array();
                                $usuario['emailuser'] = $datosusuario[0]['emailpersona'];
                                
                                $datosusuario = $complementoDatos->result_array();
                                $usuario['passworduser'] = $datosusuario[0]['passwordpersona'];

                                $datosusuario = $complementoDatos->result_array();
                                $usuario['nuevapersona'] = $datosusuario[0]['nuevapersona'];
                            }
                            $arrTags = array('NOMBRE' =>$usuario['nombreuser'] , 'APELLIDO' => $usuario['apellidopaternouser'], 'EMAIL' => $usuario['emailuser'], 'CLAVE' => $usuario['passworduser'], 'BASE_URL' => base_url(),'TIPO'=>'bienvenida');
                            $this->enviarmail($arrTags);
                            
                            $this->load->view('/usuario/vst_userlog', $usuario);
                        }
                    } else {
                        print_r($res_ok);
                        $this->load->view("vst_header");
                        $this->load->view("vst_login");
                        $this->load->view("vst_footer");
                    }
                } else {
                    $this->load->view("vst_header");
                    $this->load->view("vst_login");
                    $this->load->view("vst_footer");
                }
            }
        }
    }

    public function comprobaruserlog($tokensession) {
        if ($tokensession) {
            $usuario['files'] = $this->File->getRows($this->session->userdata('usuario_id'));
            $usuario['id'] = $this->session->userdata('usuario_id');
            $complementoDatos = $this->Usuario->recuperardatos($usuario['id']);

            if ($complementoDatos->num_rows() > 0) {
                $datosusuario = $complementoDatos->result_array();
                $usuario['nombreuser'] = $datosusuario[0]['nombrepersona'];

                $datosusuario = $complementoDatos->result_array();
                $usuario['emailuser'] = $datosusuario[0]['emailpersona'];

                $datosusuario = $complementoDatos->result_array();
                $usuario['rutuser'] = $datosusuario[0]['rutpersona'];

                $datosusuario = $complementoDatos->result_array();
                $usuario['dvrutuser'] = $datosusuario[0]['dvrutpersona'];

                $datosusuario = $complementoDatos->result_array();
                $usuario['apellidopaternouser'] = $datosusuario[0]['apellidopaternopersona'];

                $datosusuario = $complementoDatos->result_array();
                $usuario['apellidomaternouser'] = $datosusuario[0]['apellidomaternopersona'];


                $datosusuario = $complementoDatos->result_array();
                $usuario['nuevapersona'] = $datosusuario[0]['nuevapersona'];
            }
            return $usuario;
        } else {
            return false;
        }
    }

    public function ingresousuario() {
        $usuariologg = $this->comprobaruserlog($this->session->userdata('usuario_id'));
        if ($usuariologg) {
            $this->load->view('/usuario/vst_userlog', $usuariologg);
        } else {
            $error['noexiste'] = '';
            $this->load->view("vst_header");
            $this->load->view('usuario/vst_ingresar', $error);
            $this->load->view("vst_footer");
        }
    }

    public function ingresarusuario() {
        $usuariologg = $this->comprobaruserlog($this->session->userdata('usuario_id'));
        if ($usuariologg) {
            $this->load->view('/usuario/vst_userlog', $usuariologg);
        } else {
            $Rut[0] = '';
            $Rut[1] = '';
            //separarut
            $Usuario = array();
            $RutUser1 = $this->input->post('rutUser');
            $RutUser = str_replace('.', '', $RutUser1);

            if (strpos($RutUser, '-')) {
                $Rut = explode('-', $RutUser);
                $bool = $this->Usuario->validarrut($Rut[0], $Rut[1]);
            } else {
                $bool = false;
            }

            if ($bool) {
                $Usuario['rutpersona'] = $Rut[0];
                $Usuario['dvrutpersona'] = $Rut[1];
            }
            $Usuario['passwordpersona'] = $this->input->post('passwordUser');


            $this->form_validation->set_data($Usuario);

            $this->form_validation->set_rules('rutpersona', 'rut', 'required');
            $this->form_validation->set_rules('passwordpersona', 'password', 'required');
            $error['noexiste'] = '';

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('vst_header');
                $this->load->view('usuario/vst_ingresar', $error);
            } else {
                $id = $this->Usuario->verificausuariorut($Rut[0], $Rut[1], $Usuario['passwordpersona']);

                if (!is_null($id)) {

                    // creamos un array con las variables de sesión 'usuario_id' y 'login_ok'
                    $datasession = array(
                        'usuario_id' => $id,
                        'login_ok' => TRUE
                    );
                    // creamos la sesión con dichas variables
                    $this->session->set_userdata($datasession);
                    // y redirigimos al controlador principal
                    
                    
                    $usuario['files'] = $this->File->getRows($this->session->userdata('usuario_id'));
                    $usuario['id'] = $this->session->userdata('usuario_id');
                    $complementoDatos = $this->Usuario->recuperardatos($usuario['id']);

                    if ($complementoDatos->num_rows() > 0) {
                        $datosusuario = $complementoDatos->result_array();
                        $usuario['nombreuser'] = $datosusuario[0]['nombrepersona'];

                        $datosusuario = $complementoDatos->result_array();
                        $usuario['emailuser'] = $datosusuario[0]['emailpersona'];

                        $datosusuario = $complementoDatos->result_array();
                        $usuario['nuevapersona'] = $datosusuario[0]['nuevapersona'];
                    }

                    $this->load->view('/usuario/vst_userlog', $usuario);
                } else {
                    $error['noexiste'] = 'Rut o password Incorrectos';

                    $this->load->view('vst_header');
                    $this->load->view('usuario/vst_ingresar', $error);
                }
            }
        }
    }

    public function logout() {
        // creamos un array con las variables de sesión en blanco

        $datasession = array('usuario_id' => '');

        // y eliminamos la sesión

        $this->session->set_userdata($datasession);

        // redirigimos al controlador principal

        $this->index();
    }

    public function upload_files() {
        $idUser = $this->session->userdata('usuario_id');

        require_once APPPATH . '/libraries/setasign/autoload.php';
        require_once APPPATH . "/third_party/fpdf.php";
        require_once APPPATH . '/libraries/setasign/Fpdi.php';


        $data = array();
        if ($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])) {
            $filesCount = count($_FILES['userFiles']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];


                $uploadPath = 'upload/files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|image/jpeg|application/pdf|pdf';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('userFile')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['idpersona'] = $idUser;
                    $uploadData[$i]['id_documento'] = $uploadData[$i]['created'] . $idUser . $_FILES['userFiles']['type'][$i];
                }
            }

            if (!empty($uploadData)) {
                //Insert file information into the database
                $insert = $this->File->insert($uploadData);
                $statusMsg = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg', $statusMsg);
            }
        }
        //Get files data from database

        $this->index();
    }

    public function datospersonales() {
        $usuariologg = $this->comprobaruserlog($this->session->userdata('usuario_id'));
        if ($usuariologg) {
            $this->load->view('vst_header_log', $usuariologg);
            $this->load->view('usuario/datospersonales');
            $this->load->view('vst_footer');
        } else {
            $this->index();
        }
    }
    public function actualizarDP(){
        $id['id']=$this->session->userdata('usuario_id');
        $Usuario['nombrepersona'] = strtoupper($this->input->post('nombreUser'));
        $Usuario['apellidopaternopersona'] = strtoupper($this->input->post('apellidopaternoUser'));
        $Usuario['apellidomaternopersona'] = strtoupper($this->input->post('apellidomaternoUser'));
        if($this->input->post('passwordUser')!=''){
        $Usuario['passwordpersona'] = $this->input->post('passwordUser');
        }
        $resultado['actdatos']=$this->Usuario->actualizadatospersonales($Usuario,$id);
        
        $usuariologg = $this->comprobaruserlog($this->session->userdata('usuario_id'));
        $this->load->view('vst_header_log', $usuariologg);
        $this->load->view('usuario/datospersonales',$resultado);
        $this->load->view('vst_footer');
        
        
    }
    public function misDocs(){
        $usuariologg = $this->comprobaruserlog($this->session->userdata('usuario_id'));
        if ($usuariologg) {
            $this->load->view('vst_header_log', $usuariologg);
            $this->load->view('upload_files/index',$usuariologg);
            $this->load->view('vst_footer');
        } else {
            $this->index();
        }
    }
    public function enviarmail($datos){
     

        if($datos['TIPO']=='bienvenida'){
            
            
            
            $para=$datos['EMAIL'];
            $titulo='Bienvenida a SysAdd';  
            $mensaje= 
           'Hola ' . $datos['NOMBRE'] .' '.$datos['APELLIDO']. ':
            <br><br>Te damos la mas cordial bienvenida al systema SysAdd&reg;.<br>
            Te invitamos a subir tus archivos y a administralos de la forma que tu elijas.<br><br>
            Te recordamos que tu correo electronico asociado es:'.$datos['EMAIL'].' y 
            su contraseña es: ' . $datos['CLAVE'] . ' <br> 
            Los cuales debes ingresar en '.$datos['BASE_URL'].' <br><br>
            Saludos.<br><br>Atte. <b>Equipo de SysAdd</b>  ';
            
            $cabeceras = 'From: contacto@sysadd.cl' . "\r\n" .

             'MIME-Version: 1.0' . "\r\n".

             'Content-type: text/html; charset=iso-8859-1' . "\r\n".

            'X-Mailer: PHP/' . phpversion();
            
             mail($para, $titulo, $mensaje, $cabeceras);
              
        }

             
             



           
    }

}

?>
