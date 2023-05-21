<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Acciones_model $acciones Optional description
 * @property Observaciones_model $observaciones Optional description
 * @property CI_Form_validation $form_validation Optional description
 * @property CI_Input $input Optional description
 * @property CI_Session $session Optional description
 * @property Imagen $imagen Optional description
 * @property Response $response Optional description
 */
class Acciones extends CI_Controller
{
  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();
    verificarSesionAdmin();

    $this->load->model(array(
      ACCIONES_MODEL      => 'acciones',
      OBSERVACIONES_MODEL => 'observaciones'
    ));
  }

  //--------------------------------------------------------------
  public function loadAcciones()
  {
    verificarConsulAjax();

    $observacion_id = $this->input->post('observacion_id');

    if (!$observacion_id)
      return $this->response->error('Ooops.. error!', 'Error al obtener las acciones encaradas');

    $accionesEncaradas = $this->acciones->getByObservacion($observacion_id);

    if (permisoOperadorUA_general()) {
      foreach ($accionesEncaradas as $ae) {
        if ($ae->leido == 1 && $_SESSION['rol']['id_rol'] != $ae->usuario_tipo_id) {
          // se marca como leido
          $this->acciones->actualizarALeido($ae->id_accion, ['leido' => 2]);
        }
      }
    }

    $dataView['accionesEncaradas'] = $accionesEncaradas;
    $dataView['observacion_id'] = $observacion_id;

    $data['view'] = $this->load->view('admin/observaciones/_accionesEncaradas', $dataView, TRUE);
    //echo json_encode($datos);
    return $this->response->ok('Acciones encaradas obtenidas!', $data);
  }

  //--------------------------------------------------------------
  public function crear()
  {
    verificarConsulAjax();

    $totalAcciones = $this->input->post('totalAcciones');

    if ($totalAcciones == 0) {
      $this->form_validation->set_rules('area_involucrada', 'Área/s Involucrada/s', 'required|min_length[3]|trim');
      $this->form_validation->set_rules('responsable_implementacion', 'Responsable/s de Implementación', 'required|min_length[3]|trim');
      $this->form_validation->set_rules('fecha_estimada_reg', 'Fecha de Estimada de Regularización', 'required|trim');
    }
    
    $this->form_validation->set_rules('accion_encarada', 'Acción encarada', 'required|min_length[10]|trim');

    if ($this->form_validation->run()) :
      $observacion_id = $this->input->post('observacion_id');

      if ($totalAcciones == 0) {
        $obs = [
          'area_involucrada'            => $this->input->post('area_involucrada'),
          'responsable_implementacion'  => $this->input->post('responsable_implementacion'),
          'fecha_estimada_reg'          => $this->input->post('fecha_estimada_reg')
        ];
        $this->observaciones->actualizar($observacion_id, $obs, FALSE);
      }

      $accion = [
        'observacion_id'  => $observacion_id,
        'accion_encarada' => $this->input->post('accion_encarada'),
        'leido'           => 1, //sin leer
        'usuario_id'      => $this->session->id
      ];

      if (!empty($_FILES['fileAccion']['name'])) {
        $archivoAdjunto = subirFile('fileAccion', $observacion_id);
        if (strpos($archivoAdjunto, 'Error:') !== false)
          return $this->response->error('Ooops.. error!', $archivoAdjunto);

        $accion['archivo_adjunto'] = $archivoAdjunto;
      }

      $resp = $this->acciones->crear($accion); // se inserta en bd

      if ($resp) {
        //$data['selector'] = 'Observaciones';
        //$data['view'] = $this->getObservaciones();
        $data['observacion_id'] = $observacion_id;
        return $this->response->ok('Nueva acción encarada creada!', $data);
      } else {

        return $this->response->error('Ooops.. error!', 'No se pudo crear la acción encarada. Intente más tarde!');
      }
    endif;

    return $this->response->error('Ooops.. controle!', $this->form_validation->error_array());
  } // fin de metodo crear
}
