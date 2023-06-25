<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Secretarias_model $secretarias Optional description
 * @property CI_Form_validation $form_validation Optional description
 * @property CI_Input $input Optional description
 * @property Imagen $imagen Optional description
 * @property Response $response Optional description
 */
class secretarias extends CI_Controller
{
  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();
    verificarSesionAdmin();

    $this->load->model(array(
      SECRETARIAS_MODEL => 'secretarias'
    ));
  }

  //--------------------------------------------------------------
  public function getByUnidadAcademica()
  {
    verificarConsulAjax();

    // $ua_id = $this->input->post('ua_busq_id');
    $ua_id = $this->input->post('unidadAcademica_id');

    $secretarias = $this->secretarias->getByUnidadAcademica($ua_id);

    if ($secretarias) {
      $data['secretarias'] = $secretarias;
      $data['selected'] = $_SESSION['rol']['secre_id'];
      return $this->response->ok('Secretarias!', $data);
    } 
    else
      return $this->response->error('No se pudo obtener las secretarias!', 'Sin datos');
  }
}
