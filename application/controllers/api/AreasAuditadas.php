<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property AreasAuditadas_model $areasAuditadas Optional description
 * @property UnidadesAcademicas_model $unidadesAcademicas Optional description
 * @property CI_Form_validation $form_validation Optional description
 * @property CI_Input $input Optional description
 * @property Imagen $imagen Optional description
 * @property Response $response Optional description
 */
class AreasAuditadas extends CI_Controller
{
  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();
    verificarSesionAdmin();

    $this->load->model(array(
      AREAS_AUDITADAS_MODEL => 'areasAuditadas'
    ));
  }

  //--------------------------------------------------------------
  public function getByUnidadAcademica()
  {
    verificarConsulAjax();

    // $ua_id = $this->input->post('ua_busq_id');
    $ua_id = $this->input->post('unidadAcademica_id');

    $areasAuditadas = $this->areasAuditadas->getByUnidadAcademica($ua_id);

    if ($areasAuditadas) {
      $data['areasAuditadas'] = $areasAuditadas;
      $data['selected'] = $_SESSION['rol']['aa_id'];
      return $this->response->ok('Areas auditadas!', $data);
    } 
    else
      return $this->response->error('No se pudo obtener las areas auditadas!', 'Sin datos');
  }
}
