<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Obtiene la url del archivo indicado
 * @param int $observacion_id Identificador para la carpeta donde se guardara el archivo
 * @param string $file Nombre archivo
 */
function getUrlFile($observacion_id, $file)
{
  // $folder = strtolower($folder);
  $filename = 'assets/observaciones/' . $observacion_id . '/' . $file;
  if (file_exists($filename)) {
    return base_url($filename);
  } else {
    return false;
  }
}

/**
 * Sube un archivo
 * @param string $nombreFile Nombre del input de donde se recibe el archivo
 * @param int $observacion_id Identificador para la carpeta donde se guardara el archivo
 */
function subirFile($nombreFile, $observacion_id)
{
  $CI = &get_instance();
  $tipos  = array('application/msword', 'application/vnd.ms-excel', 'application/pdf', 'image/jpeg', 'image/pjpeg', 'image/bmp', 'image/png', 'imagen/x-png');
  $destino = 'assets/observaciones/' . $observacion_id . '/';

  if (!file_exists($destino)) {
    mkdir($destino);
  }


  if (isset($_FILES[$nombreFile]['name'])) {
    $mime  =  get_mime_by_extension($_FILES[$nombreFile]['name']); //obtiene la extension del file

    if (in_array($mime,  $tipos)) {
      //cargar configuración 
      $config['upload_path'] = $destino;
      $config['allowed_types'] = 'docx|doc|xls|xlsx|pdf|bmp|jpeg|jpg|png';
      $config['file_name'] = date('dmY') . '_' . time();

      $CI->upload->initialize($config); // Se inicializa la config

      // subir el archivo al directorio 
      if ($CI->upload->do_upload($nombreFile)) {
        $imgSubida = $CI->upload->data();
        return $imgSubida['orig_name'];
        //return $destino . $imgSubida['orig_name'];
      }
    }
    return 'Error: Tipo de archivo no soportado.';
  }
  return 'Error: No se pudo cargar el archivo adjunto.';
  //return $destino . $imgDefault;
}
