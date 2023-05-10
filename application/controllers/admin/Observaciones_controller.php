<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
//  * @property Estados_model $estados Optional description
 * @property Impactos_model $impactos Optional description
 * @property Observaciones_model $observaciones Optional description
 * @property Planes_model $planes Optional description
 * @property UnidadesAcademicas_model $unidadesAcademicas Optional description
 * @property CI_Form_validation $form_validation Optional description
 * @property CI_Input $input Optional description
 * @property Imagen $imagen Optional description
 * @property Response $response Optional description
 */
class Observaciones_controller extends CI_Controller
{
  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();
    verificarSesionAdmin();

    $this->load->model(array(
      // ESTADOS_MODEL             => 'estados',
      IMPACTOS_MODEL            => 'impactos',
      OBSERVACIONES_MODEL       => 'observaciones',
      PLANES_MODEL              => 'planes',
      UNIDADES_ACADEMICAS_MODEL => 'unidadesAcademicas'
    ));
  }

  //--------------------------------------------------------------
  public function index()
  {
    $data['title'] = 'Observaciones';
    $data['act'] = 'list_obs';
    $data['desplegado'] = 'obs';
    $data['unidadesAcademicas'] = $this->unidadesAcademicas->get_select();

    $this->load->view('admin/observaciones/indexObservaciones', $data);
  }

  // //--------------------------------------------------------------
  // public function frmNuevo()
  // {
  //   verificarConsulAjax();

  //   $data['iva'] = $this->iva->get_select();
  //   $data['proveedores'] = $this->proveedores->get_select();

  //   $this->load->view('admin/observaciones/frmNuevoProducto', $data);
  // }

  //--------------------------------------------------------------
  public function frmEditar($id_observacion)
  {
    verificarConsulAjax();

    $data['unidadesAcademicas'] = $this->unidadesAcademicas->get_select();
    // $data['estados'] = $this->estados->get_select();
    $data['impactos'] = $this->impactos->get_select();
    $data['planes'] = $this->planes->get_select();
    $data['observacion'] = $this->observaciones->get($id_observacion);

    $this->load->view('admin/observaciones/frmEditarObservacion', $data);
  }

  // //--------------------------------------------------------------
  // public function frmVer($id_observacion)
  // {
  //   verificarConsulAjax();

  //   $data['observacion'] = $this->observaciones->get($id_observacion);

  //   $this->load->view('admin/observaciones/frmVerObservacion', $data);
  // }

  //--------------------------------------------------------------
  public function frmAccionesEncaradas($id_observacion)
  {
    verificarConsulAjax();

    if (permisoUA_general()) {
      // actualizo observacion a leido
      $this->observaciones->actualizarALeido($id_observacion, ['leido' => 2]);
    }

    $data['observacion'] = $this->observaciones->get($id_observacion);

    $this->load->view('admin/observaciones/frmAccionesEncaradas', $data);
  }

  // //--------------------------------------------------------------
  // public function crear()
  // {
  //   verificarConsulAjax();

  //   $this->form_validation->set_rules('codigo_barra', 'Código de Barra', 'min_length[3]|trim');
  //   $this->form_validation->set_rules('codigo_proveedor', 'Código de Proveedor', 'min_length[3]|trim');
  //   $this->form_validation->set_rules('codigo', 'Código', 'required|min_length[3]|trim');
  //   $this->form_validation->set_rules('proveedor_id', 'Proveedor', 'required|trim');
  //   $this->form_validation->set_rules('segmento_id', 'Segmento', 'required|trim');
  //   $this->form_validation->set_rules('subsegmento_id', 'Subsegmento', 'required|trim');
  //   $this->form_validation->set_rules('nombre_observacion', 'Descripción', 'required|min_length[3]|trim');
  //   $this->form_validation->set_rules('iva_id', 'IVA', 'required|trim');
  //   $this->form_validation->set_rules('precio_lista', 'Precio de Lista', 'required|greater_than[0]|trim');

  //   if ($this->form_validation->run()) :
  //     $observacion = [
  //       'subsegmento_id'    => $this->input->post('subsegmento_id'),
  //       'iva_id'            => $this->input->post('iva_id'),
  //       'codigo_barra'      => $this->input->post('codigo_barra'),
  //       'codigo_proveedor'  => $this->input->post('codigo_proveedor'),
  //       'codigo'            => $this->input->post('codigo'),
  //       'nombre_observacion'   => strtoupper($this->input->post('nombre_observacion')),
  //       'precio_lista'      => $this->input->post('precio_lista'),
  //       'foto_observacion'     => $this->imagen->subirImagen('foto-observacion', 'observaciones', IMG_DEFAULT_PRODUCTOS)
  //     ];

  //     $resp = $this->observaciones->crear($observacion); // se inserta en bd

  //     if ($resp) {
  //       $data['selector'] = 'Observaciones';
  //       $data['view'] = $this->getObservaciones();
  //       return $this->response->ok('Nuevo observacion creado!', $data);
  //     } else {

  //       return $this->response->error('Ooops.. error!', 'No se pudo crear el observacion. Intente más tarde!');
  //     }
  //   endif;

  //   return $this->response->error('Ooops.. controle!', $this->form_validation->error_array());
  // } // fin de metodo crear

  // //--------------------------------------------------------------
  // public function actualizar()
  // {
  //   verificarConsulAjax();

  //   $this->form_validation->set_rules('codigo_barra', 'Código de Barra', 'min_length[3]|trim');
  //   $this->form_validation->set_rules('codigo_proveedor', 'Código de Proveedor', 'min_length[3]|trim');
  //   $this->form_validation->set_rules('codigo', 'Código', 'required|min_length[3]|trim');
  //   $this->form_validation->set_rules('proveedor_id', 'Proveedor', 'required|trim');
  //   $this->form_validation->set_rules('segmento_id', 'Segmento', 'required|trim');
  //   $this->form_validation->set_rules('subsegmento_id', 'Subsegmento', 'required|trim');
  //   $this->form_validation->set_rules('nombre_observacion', 'Descripción', 'required|min_length[3]|trim');
  //   $this->form_validation->set_rules('iva_id', 'IVA', 'required|trim');
  //   $this->form_validation->set_rules('precio_lista', 'Precio de Lista', 'required|greater_than[0]|trim');

  //   if ($this->form_validation->run()) : //Si la validación es correcta
  //     $id_observacion = $this->input->post('idProducto');
  //     $observacion = [
  //       'subsegmento_id'    => $this->input->post('subsegmento_id'),
  //       'iva_id'            => $this->input->post('iva_id'),
  //       'codigo_barra'      => $this->input->post('codigo_barra'),
  //       'codigo_proveedor'  => $this->input->post('codigo_proveedor'),
  //       'codigo'            => $this->input->post('codigo'),
  //       'nombre_observacion'   => strtoupper($this->input->post('nombre_observacion')),
  //       'precio_lista'      => $this->input->post('precio_lista')
  //     ];

  //     if (!empty($_FILES['foto-observacion']['name'])) {
  //       $observacion['foto_observacion'] = $this->imagen->subirImagen('foto-observacion', 'observaciones', IMG_DEFAULT_PRODUCTOS);
  //     }

  //     $resp = $this->observaciones->actualizar($id_observacion, $observacion); // se hace un update en bd

  //     if ($resp) {
  //       $data['selector'] = 'Observaciones';
  //       $data['view'] = $this->getObservaciones();
  //       return $this->response->ok('Producto actualizado!', $data);
  //     } else {

  //       return $this->response->error('Ooops.. error!', 'No se pudo actualizar el observacion. Intente más tarde!');
  //     }
  //   endif;

  //   return $this->response->error('Ooops.. controle!', $this->form_validation->error_array());
  // } // fin de metodo actualizar

  // //--------------------------------------------------------------
  // public function eliminar($id_observacion)
  // {
  //   verificarConsulAjax();

  //   $resp = $this->observaciones->eliminar($id_observacion);

  //   if ($resp) {
  //     return $this->response->ok('Producto eliminado!');
  //   }

  //   return $this->response->error('Ooops.. error!', 'No se pudo eliminar el observacion. Intente más tarde!');
  // }

  // /**
  //  * 
  //  * FUNCIONES PRIVADAS
  //  * 
  //  */
  // private function getObservaciones()
  // {
  //   $data['observaciones'] = $this->observaciones->get_all();
  //   return $this->load->view('admin/observaciones/_tblObservaciones', $data, TRUE);
  // }
}
