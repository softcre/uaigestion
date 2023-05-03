<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Observaciones_model $observaciones Optional description
 * @property UnidadesAcademicas_model $unidadesAcademicas Optional description
 * @property CI_Form_validation $form_validation Optional description
 * @property CI_Input $input Optional description
 * @property CI_Session $session Optional description
 * @property Imagen $imagen Optional description
 * @property Response $response Optional description
 */
class Observaciones extends CI_Controller
{
  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();
    verificarSesionAdmin();

    $this->load->model(array(
      OBSERVACIONES_MODEL => 'observaciones'
    ));
  }

  //--------------------------------------------------------------
  public function getByAreaAuditada()
  {
    verificarConsulAjax();

    $ua_id = $this->input->post('ua_busq_id');
    $aa_id = $this->input->post('aa_busq_id');

    $observaciones = $this->observaciones->getByAreaAuditada($ua_id, $aa_id);

    $data['view'] = $this->load->view('admin/observaciones/_tblObservaciones', ['observaciones' => $observaciones], TRUE);
    return $this->response->ok('Observaciones obtenidos!', $data);
  }

  //--------------------------------------------------------------
  public function crear()
  {
    verificarConsulAjax();

    $this->form_validation->set_rules('fecha_observacion', 'Fecha de Observación', 'required|trim');
    $this->form_validation->set_rules('unidad_academica_id', 'Unidad Académica', 'required|trim');
    $this->form_validation->set_rules('area_auditada_id', 'Área Auditada', 'required|trim');
    $this->form_validation->set_rules('plan_id', 'Plan', 'required|trim');
    $this->form_validation->set_rules('proyecto', 'Proyecto', 'required|min_length[3]|trim');
    $this->form_validation->set_rules('nro_informe_uai', 'Nro. Informe UAI', 'required|trim');
    $this->form_validation->set_rules('impacto_id', 'Impacto', 'required|trim');
    $this->form_validation->set_rules('detalle_observacion', 'Detalle de la Observación', 'required|min_length[10]|trim');
    $this->form_validation->set_rules('fecha_seguimiento', 'Fecha de Seguimiento', 'required|trim');
    $this->form_validation->set_rules('estado_id', 'Estado', 'required|trim');
    $this->form_validation->set_rules('detalle_recomendacion', 'Detalle de la Recomendación', 'required|min_length[10]|trim');

    if ($this->form_validation->run()) :
      $observacion = [
        'area_auditada_id'      => $this->input->post('area_auditada_id'),
        'impacto_id'            => $this->input->post('impacto_id'),
        'estado_id'             => $this->input->post('estado_id'),
        'plan_id'               => $this->input->post('plan_id'),
        'fecha_observacion'     => $this->input->post('fecha_observacion'),
        'proyecto'              => $this->input->post('proyecto'),
        'nro_informe_uai'       => $this->input->post('nro_informe_uai'),
        'detalle_observacion'   => $this->input->post('detalle_observacion'),
        'fecha_seguimiento'     => $this->input->post('fecha_seguimiento'),
        'detalle_recomendacion' => $this->input->post('detalle_recomendacion'),
        'usuario_id'            => $this->session->id
      ];

      $resp = $this->observaciones->crear($observacion); // se inserta en bd

      if ($resp) {
        //$data['selector'] = 'Observaciones';
        //$data['view'] = $this->getObservaciones();
        return $this->response->ok('Nuevo observacion creada!');
      } else {

        return $this->response->error('Ooops.. error!', 'No se pudo crear la observación. Intente más tarde!');
      }
    endif;

    return $this->response->error('Ooops.. controle!', $this->form_validation->error_array());
  } // fin de metodo crear


  //--------------------------------------------------------------
  public function actualizar()
  {
    verificarConsulAjax();

    $this->form_validation->set_rules('fecha_observacion', 'Fecha de Observación', 'required|trim');
    $this->form_validation->set_rules('unidad_academica_id', 'Unidad Académica', 'required|trim');
    $this->form_validation->set_rules('area_auditada_id', 'Área Auditada', 'required|trim');
    $this->form_validation->set_rules('plan_id', 'Plan', 'required|trim');
    $this->form_validation->set_rules('proyecto', 'Proyecto', 'required|min_length[3]|trim');
    $this->form_validation->set_rules('nro_informe_uai', 'Nro. Informe UAI', 'required|trim');
    $this->form_validation->set_rules('impacto_id', 'Impacto', 'required|trim');
    $this->form_validation->set_rules('detalle_observacion', 'Detalle de la Observación', 'required|min_length[10]|trim');
    $this->form_validation->set_rules('fecha_seguimiento', 'Fecha de Seguimiento', 'required|trim');
    $this->form_validation->set_rules('estado_id', 'Estado', 'required|trim');
    $this->form_validation->set_rules('detalle_recomendacion', 'Detalle de la Recomendación', 'required|min_length[10]|trim');

    if ($this->form_validation->run()) :
      $idObservacion = $this->input->post('idObservacion');
      $observacion = [
        'area_auditada_id'      => $this->input->post('area_auditada_id'),
        'impacto_id'            => $this->input->post('impacto_id'),
        'estado_id'             => $this->input->post('estado_id'),
        'plan_id'               => $this->input->post('plan_id'),
        'fecha_observacion'     => $this->input->post('fecha_observacion'),
        'proyecto'              => $this->input->post('proyecto'),
        'nro_informe_uai'       => $this->input->post('nro_informe_uai'),
        'detalle_observacion'   => $this->input->post('detalle_observacion'),
        'fecha_seguimiento'     => $this->input->post('fecha_seguimiento'),
        'detalle_recomendacion' => $this->input->post('detalle_recomendacion'),
        //'usuario_id'            => $this->session->id
      ];

      $resp = $this->observaciones->actualizar($idObservacion, $observacion); // se inserta en bd

      if ($resp) {
        //$data['selector'] = 'Observaciones';
        //$data['view'] = $this->getObservaciones();
        return $this->response->ok('Observación actualizada!');
      } else {
        return $this->response->error('Ooops.. error!', 'No se pudo actualizar la observación. Intente más tarde!');
      }
    endif;

    return $this->response->error('Ooops.. controle!', $this->form_validation->error_array());
  } // fin de metodo crear

  /**
   * 
   * FUNCIONES PRIVADAS
   * 
   */
  private function getObservaciones()
  {
    $data['observaciones'] = $this->observaciones->getByAreaAuditada('', '');
    return $this->load->view('admin/observaciones/_tblObservaciones', $data, TRUE);
  }
}
