<?php

use setasign\Fpdi\Fpdi;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ctl_login_empresa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'security', 'html', 'captcha'));
        $this->load->model('empresa');
        $this->load->model('File');
        $this->load->library(array('session', 'form_validation', 'email'));
    }

    public function index() {
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
            $this->load->view('empresa/vst_userlog', $empresalogg);
            $this->load->view("vst_footer");
        } else {
            redirect('http://www.sysadd.cl');
        }
    }

    public function registroempresa() {
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
            $this->load->view('/empresa/vst_userlog', $empresalogg);
        } else {
            $this->load->view('empresa/vst_registrar');
        }
    }

    public function registrarempresa() {
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        print_r($empresalogg);
        if ($empresalogg) {
            $this->load->view('/empresa/vst_userlog', $empresalogg);
        } else {
            $empresa = array();
            $RutUseremp = $this->input->post('rutEmpresa');
            $RutUserempr = str_replace('.', '', $RutUseremp);

            if (strpos($RutUserempr, '-')) {
                $Rutem = explode('-', $RutUserempr);
                $bool = $this->empresa->validarrut($Rutem[0], $Rutem[1]);
            } else {
                $bool = false;
            }

            if ($bool) {
                $empresa['rutempresa'] = $Rutem[0];
                $empresa['dvrutempresa'] = $Rutem[1];
            }
            $empresa['razonsocialempresa'] = $this->input->post('razonsocialEmpresa');
            
                $RutUser1 = $this->input->post('rutUser');
                $RutUser = str_replace('.', '', $RutUser1);

                if (strpos($RutUser, '-')) {
                    $Rut = explode('-', $RutUser);
                    $bool = $this->empresa->validarrut($Rut[0], $Rut[1]);
                } else {
                    $bool = false;
                }
                $iduser = $this->empresa->verificapersona($Rut[0], $Rut[1]);
                $empresa['passwordpersona'] = $this->input->post('passwordUser');
                if (is_null($iduser)) {
                    
                    $empresa['rutpersona'] = $Rut[0];
                    $empresa['dvrutpersona'] = $Rut[1];
                    $empresa['nombrepersona'] = strtoupper($this->input->post('nombreUser'));
                    $empresa['apellidopaternopersona'] = strtoupper($this->input->post('apellidopaternoUser'));
                    $empresa['apellidomaternopersona'] = strtoupper($this->input->post('apellidomaternoUser'));
                    $empresa['emailpersona'] = $this->input->post('emailUser');
                    

                    $res_ok = $this->empresa->ingresarempresauser($empresa);
                } else {
                    $res_ok = true;
                }
                if ($res_ok) {
                    //verificaempresa
                    $id = $this->empresa->verificapersona($Rut[0], $Rut[1]);
                    $empresa['idpersona'] = $id;
                    $ingresoempresa=$this->empresa->ingresarempresa($empresa);
                    // creamos un array con las variables de sesión 'empresa_id' y 'login_ok'
                    if($ingresoempresa){
                    $idempresa = $this->empresa->verificapersona($Rutem[0], $Rutem[1],$empresa['passwordusuario']);
                    $datasession = array(
                        'empresa_id' => $idempresa,
                        'login_ok' => TRUE
                    );
                    // creamos la sesión con dichas variables
                    $this->session->set_userdata($datasession);
                    // y redirigimos al controlador principal
                    //enviamos email
                    //$arrTags = array('NOMBRE' =>$empresa['NombreUser'] , 'APELLIDO' => $empresa['ApellidopaternoUser'], 'CLAVE' => $empresa['PasswordUser'], 'BASE_URL' => base_url());
                    // Correo bienvenida//   $resultado_envio = Envia($arrTags, 'registro_postulante', 'info@tclouding.com',  $empresa['EmailUser'], 'BIENVENIDO A KEYCLOUDING');
                    $empresa['files'] = $this->File->getRowsemp($this->session->userdata('empresa_id'));
                    $empresa['id'] = $this->session->userdata('empresa_id');
                    $complementoDatos = $this->empresa->recuperardatos($empresa['id']);

                    if ($complementoDatos->num_rows() > 0) {
                        $datosempresa = $complementoDatos->result_array();
                        $empresa['nombreuser'] = $datosempresa[0]['nombreempresa'];

                        $datosempresa = $complementoDatos->result_array();
                        $empresa['apellidopaternouser'] = $datosempresa[0]['apellidopaternoempresa'];

                        $datosempresa = $complementoDatos->result_array();
                        $empresa['emailuser'] = $datosempresa[0]['emailempresa'];

                        $datosempresa = $complementoDatos->result_array();
                        $empresa['passworduser'] = $datosempresa[0]['passwordempresa'];

                        $datosempresa = $complementoDatos->result_array();
                        $empresa['nuevaempresa'] = $datosempresa[0]['nuevaempresa'];
                    }
                    $arrTags = array('NOMBRE' => $empresa['nombreuser'], 'APELLIDO' => $empresa['apellidopaternouser'], 'EMAIL' => $empresa['emailuser'], 'CLAVE' => $empresa['passworduser'], 'BASE_URL' => base_url(), 'TIPO' => 'bienvenida');
                    $this->enviarmail($arrTags);

                    $this->load->view('/empresa/vst_userlog', $empresa);
                    }
                } else {
                    $this->load->view("vst_header");
                    $this->load->view("vst_login");
                    $this->load->view("vst_footer");
                }
            
        }
    }

    public function comprobaruserlog($tokensession) {
        if ($tokensession) {
            $empresa['files'] = $this->File->getRowsemp($this->session->userdata('empresa_id'));
            $empresa['id'] = $this->session->userdata('empresa_id');
            $complementoDatos = $this->empresa->recuperardatos($empresa['id']);

            if ($complementoDatos->num_rows() > 0) {
                $datosempresa = $complementoDatos->result_array();
                $empresa['nombreuser'] = $datosempresa[0]['razonsocialempresa'];

                $datosempresa = $complementoDatos->result_array();
                $empresa['emailuser'] = $datosempresa[0]['emailpersona'];

                $datosempresa = $complementoDatos->result_array();
                $empresa['rutuser'] = $datosempresa[0]['rutempresa'];

                $datosempresa = $complementoDatos->result_array();
                $empresa['dvrutuser'] = $datosempresa[0]['dvrutempresa'];

                $datosempresa = $complementoDatos->result_array();
                $empresa['apellidopaternouser'] = $datosempresa[0]['nombrepersona'];

                $datosempresa = $complementoDatos->result_array();
                $empresa['apellidomaternouser'] = $datosempresa[0]['apellidopaternopersona'];


                $datosempresa = $complementoDatos->result_array();
                $empresa['nuevaempresa'] = $datosempresa[0]['nuevapersona'];
            }
            return $empresa;
        } else {
            return false;
        }
    }

    public function ingresoempresa() {
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
            $this->load->view('/empresa/vst_userlog', $empresalogg);
        } else {
            $error['noexiste'] = '';
            $this->load->view("vst_header");
            $this->load->view('empresa/vst_ingresar', $error);
            $this->load->view("vst_footer");
        }
    }

    public function ingresarempresa() {
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
            $this->load->view('/empresa/vst_userlog', $empresalogg);
        } else {
            $Rut[0] = '';
            $Rut[1] = '';
            //separarut
            $empresa = array();
            $RutUser1 = $this->input->post('rutUser');
            $RutUser = str_replace('.', '', $RutUser1);

            if (strpos($RutUser, '-')) {
                $Rut = explode('-', $RutUser);
                $bool = $this->empresa->validarrut($Rut[0], $Rut[1]);
            } else {
                $bool = false;
            }

            if ($bool) {
                $empresa['rutempresa'] = $Rut[0];
                $empresa['dvrutempresa'] = $Rut[1];
            }
            $empresa['passwordempresa'] = $this->input->post('passwordUser');


            $this->form_validation->set_data($empresa);

            $this->form_validation->set_rules('rutempresa', 'rut', 'required');
            $this->form_validation->set_rules('passwordempresa', 'password', 'required');
            $error['noexiste'] = '';

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('vst_header');
                $this->load->view('empresa/vst_ingresar', $error);
            } else {
                $id = $this->empresa->verificaempresarut($Rut[0], $Rut[1], $empresa['passwordempresa']);

                if (!is_null($id)) {

                    // creamos un array con las variables de sesión 'empresa_id' y 'login_ok'
                    $datasession = array(
                        'empresa_id' => $id,
                        'login_ok' => TRUE
                    );
                    // creamos la sesión con dichas variables
                    $this->session->set_userdata($datasession);
                    // y redirigimos al controlador principal


                    $empresa['files'] = $this->File->getRows($this->session->userdata('empresa_id'));
                    $empresa['id'] = $this->session->userdata('empresa_id');
                    $complementoDatos = $this->empresa->recuperardatos($empresa['id']);

                    if ($complementoDatos->num_rows() > 0) {
                        $datosempresa = $complementoDatos->result_array();
                        $empresa['nombreuser'] = $datosempresa[0]['razonsocialempresa'];

                        $datosempresa = $complementoDatos->result_array();
                        $empresa['emailuser'] = $datosempresa[0]['emailpersona'];

                        $datosempresa = $complementoDatos->result_array();
                        $empresa['nuevaempresa'] = $datosempresa[0]['nuevapersona'];
                    }

                    $this->load->view('/empresa/vst_userlog', $empresa);
                } else {
                    $error['noexiste'] = 'Rut o password Incorrectos';

                    $this->load->view('vst_header');
                    $this->load->view('empresa/vst_ingresar', $error);
                }
            }
        }
    }

    public function logout() {
        // creamos un array con las variables de sesión en blanco

        $datasession = array('empresa_id' => '');

        // y eliminamos la sesión

        $this->session->set_userdata($datasession);

        // redirigimos al controlador principal

        $this->index();
    }

    public function upload_files() {
        $idUser = $this->session->userdata('empresa_id');
        print_r($idUser);
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
                    $uploadData[$i]['idempresa'] = $idUser;
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
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
            $this->load->view('empresa/vst_userlog', $empresalogg);
            $this->load->view('empresa/datospersonales');
            $this->load->view('vst_footer');
        } else {
            $this->index();
        }
    }
    public function consultacargosempresa() {
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        $consultarcargos['cargos'] = $this->empresa->consultacargos($this->session->userdata('empresa_id'));
        
        if ($empresalogg) {
            $this->load->view('empresa/vst_userlog', $empresalogg);
            $this->load->view('empresa/cargosempresa',$consultarcargos);
            $this->load->view('vst_footer');
        } else {
            $this->index();
        }
    }

    public function actualizarDP() {
        $id['id'] = $this->session->userdata('empresa_id');
        $empresa['nombreempresa'] = strtoupper($this->input->post('nombreUser'));
        $empresa['apellidopaternoempresa'] = strtoupper($this->input->post('apellidopaternoUser'));
        $empresa['apellidomaternoempresa'] = strtoupper($this->input->post('apellidomaternoUser'));
        if ($this->input->post('passwordUser') != '') {
            $empresa['passwordempresa'] = $this->input->post('passwordUser');
        }
        $resultado['actdatos'] = $this->empresa->actualizadatosempresales($empresa, $id);

        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        $this->load->view('empresa/vst_userlog', $empresalogg);
        $this->load->view('empresa/datosempresales', $resultado);
        $this->load->view('vst_footer');
    }

    public function misDocs() {
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
            $this->load->view('empresa/vst_userlog', $empresalogg);
            $this->load->view('upload_files/index', $empresalogg);
            $this->load->view('vst_footer');
        } else {
            $this->index();
        }
    }

    public function enviarmail($datos) {


        if ($datos['TIPO'] == 'bienvenida') {



            $para = $datos['EMAIL'];
            $titulo = 'Bienvenida a SysAdd';
            $mensaje =
                    'Hola ' . $datos['NOMBRE'] . ' ' . $datos['APELLIDO'] . ':
            <br><br>Te damos la mas cordial bienvenida al systema SysAdd&reg;.<br>
            Te invitamos a subir tus archivos y a administralos de la forma que tu elijas.<br><br>
            Te recordamos que tu correo electronico asociado es:' . $datos['EMAIL'] . ' y 
            su contraseña es: ' . $datos['CLAVE'] . ' <br> 
            Los cuales debes ingresar en ' . $datos['BASE_URL'] . ' <br><br>
            Saludos.<br><br>Atte. <b>Equipo de SysAdd</b>  ';

            $cabeceras = 'From: contacto@sysadd.cl' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

            mail($para, $titulo, $mensaje, $cabeceras);
        }
    }
    public function cargararchivos(){
         $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
            $this->load->view('empresa/vst_userlog', $empresalogg);
            $this->load->view('empresa/cargararchivosempresas');
            $this->load->view('vst_footer');
        } else {
            $this->index();
        }
    }
    public function agregarcargosempresa(){
        $consultarcargos['cargosfiles'] = $this->empresa->filescargoslista();
    $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
            $this->load->view('empresa/vst_userlog', $empresalogg);
            $this->load->view('empresa/agregarcargos',$consultarcargos);
            $this->load->view('vst_footer');
        } else {
            $this->index();
        }
    }
    public function agregarcargonv(){
        $empresalogg = $this->comprobaruserlog($this->session->userdata('empresa_id'));
        if ($empresalogg) {
        $idempresa=$this->session->userdata('empresa_id');
        $nombre=$this->input->post('nvcargo');
        $files = $this->input->post('files');
        
        $idcargo=$this->empresa->ingresarcargonv($idempresa,$nombre);
        
        for($i=0;$i<count($files);$i++){
            
            $filess['idcargosfile'] = $files[$i];
            $filess['idcargoempresa']=$idcargo;
            $filess['idempresa']=$idempresa;
            $sql=$this->empresa->ingresarcargofilesnv($filess);
        }        
            $this->consultacargosempresa();
        
        } else {
            $this->index();
        }
        
        
    }
   

}

?>
