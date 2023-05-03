<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Estados_model $estados Optional description
 * @property Impactos_model $impactos Optional description
 * @property Observaciones_model $observaciones Optional description
 * @property Planes_model $planes Optional description
 * @property UnidadesAcademicas_model $unidadesAcademicas Optional description
 * @property CI_Form_validation $form_validation Optional description
 * @property CI_Input $input Optional description
 * @property Imagen $imagen Optional description
 * @property Response $response Optional description
 */
class ObservacionNueva_controller extends CI_Controller
{
  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();
    verificarSesionAdmin();

    $this->load->model(array(
      ESTADOS_MODEL             => 'estados',
      IMPACTOS_MODEL            => 'impactos',
      OBSERVACIONES_MODEL       => 'observaciones',
      PLANES_MODEL              => 'planes',
      UNIDADES_ACADEMICAS_MODEL => 'unidadesAcademicas'
    ));
  }

  //--------------------------------------------------------------
  public function index()
  {
    $data['title'] = 'Nueva Observación';
    $data['act'] = 'nue_obs';
    $data['desplegado'] = 'obs';
    $data['unidadesAcademicas'] = $this->unidadesAcademicas->get_select();
    $data['estados'] = $this->estados->get_select();
    $data['impactos'] = $this->impactos->get_select();
    $data['planes'] = $this->planes->get_select();

    $this->load->view('admin/observaciones/nueva/indexNuevaObservacion', $data);
  }
}