<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Usuarios_model $usuarios Optional description
 * @property CI_Session $session Optional description
 * @property CI_Form_validation $form_validation Optional description
 * @property CI_Output $output Optional description
 * @property Response $response Optional description
 */

/**
 * Se encarga de armar una respuesta tipo JSON
 */
class Response
{

  /**
   * Response en formato json de respueta correcta
   * 
   * @param string $message Mensaje a mostrar al usuario sobre la accion que se realizo
   * @param array $data Datos adicionales que pueden enviarse 
   * 
   * @return CI_Output $json
   */
  function ok($message, $data = array()) {
    $CI = &get_instance();

    $json = array(
      'status'  => 'ok',
      'title'   => 'Bien!',
      'msj'     => $message,
      'data'    => $data
    );

    return $CI->output->set_output(json_encode($json));
  }

  /**
   * Response en formato json de respueta erronea
   * 
   * @param string $title Titulo del mensaje que se va a mostrar
   * @param array | string $message Mensaje a mostrar al usuario sobre error cometido
   * 
   * @return CI_Output $json
   */
  function error($title, $error) {
    $CI = &get_instance();

    if (is_string($error))
      $error = [$error];

    $json = array(
      'status'  => 'error',
      'title'   => $title,
      'errors'  => $error
    );

    return $CI->output->set_output(json_encode($json));
  }
}
