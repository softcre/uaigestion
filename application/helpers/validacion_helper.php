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
  if (isset($_SESSION['rol']['name']))
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

function permisoSuperadmin()
{
  return ($_SESSION['rol']['name'] == 'SUPERADMIN');
}

function permisoSupervisor()
{
  return ($_SESSION['rol']['name'] == 'SUPERVISOR');
}

function permisoOperador()
{
  return ($_SESSION['rol']['name'] == 'OPERADOR');
}

function permisoUAOperador()
{
  return ($_SESSION['rol']['name'] == 'UA_OPERADOR');
}

function permiso_all_UA()
{
  return ($_SESSION['rol']['name'] == 'UA_DECANO' || $_SESSION['rol']['name'] == 'UA_SECRETARIO' || $_SESSION['rol']['name'] == 'UA_OPERADOR');
}

function permisoSuperadminSupervisor()
{
  return ($_SESSION['rol']['name'] == 'SUPERADMIN' || $_SESSION['rol']['name'] == 'SUPERVISOR');
}

function permisoOperador_UAOperador()
{
  return ($_SESSION['rol']['name'] == 'OPERADOR' || $_SESSION['rol']['name'] == 'UA_OPERADOR');
}

function permiso_all_UAI()
{
  return ($_SESSION['rol']['name'] == 'SUPERADMIN' || $_SESSION['rol']['name'] == 'SUPERVISOR' || $_SESSION['rol']['name'] == 'OPERADOR');
}