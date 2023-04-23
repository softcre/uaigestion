<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input Optional description
 */

/**
 * Verifica si hay una sesion de usuario 'admin' en curso
 */
function verificarSesionAdmin()
{
  if (isset($_SESSION['usuario_tipo_id']) && $_SESSION['usuario_tipo_id'] == 1)
    return;

  show_404();
}

/**
 * Verifica si es una llamada (request) desde Ajax
 */
function verificarConsulAjax()
{
  $CI = &get_instance();

  if (!$CI->input->is_ajax_request()) {
    show_404();
  }
}
