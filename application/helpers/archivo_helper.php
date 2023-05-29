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
  $tipos  = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'bmp', 'jpeg', 'jpg', 'png', 'rar', 'zip', 'txt');
  $destino = 'assets/observaciones/' . $observacion_id . '/';

  if (!file_exists($destino)) {
    mkdir($destino);
  }


  if (isset($_FILES[$nombreFile]['name'])) {
    //$mime  =  get_mime_by_extension($_FILES[$nombreFile]['name']); //obtiene la extension del file
    $extension = pathinfo($_FILES[$nombreFile]['name'], PATHINFO_EXTENSION);

    if (in_array($extension,  $tipos)) {
      //cargar configuración 
      $config['upload_path'] = $destino;
      $config['allowed_types'] = implode('|', $tipos);
      $config['file_name'] = date('dmY') . '_' . time();

      $CI->upload->initialize($config); // Se inicializa la config

      // subir el archivo al directorio 
      if ($CI->upload->do_upload($nombreFile)) {
        $imgSubida = $CI->upload->data();
        return $imgSubida['orig_name'];
        //return $destino . $imgSubida['orig_name'];
      }
    }
    return "Error: Tipo de archivo($extension) no soportado.";// Tipos de archivos soportados: " . implode('|', $tipos);
  }
  return 'Error: No se pudo cargar el archivo adjunto.';
  //return $destino . $imgDefault;
}
