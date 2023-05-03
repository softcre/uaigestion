<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Devuelve fecha actual del sistema
 * 
 * @param string $format Formato de salida a eleccion
 * 
 * @return string Fecha y hora actual del sistema en formato indicado
 */
function fechaHoraHoy($format = 'Y-m-d H:i:s')
{
  return date($format);
}

/**
 * Devuelve fecha formateada
 * 
 * @param string $fecha Fecha a formatear
 * @param string $format Formato de salida a eleccion
 * 
 * @return string Fecha en formato indicado
 */
function formatearFecha($fecha, $format = 'd/m/Y')
{
  return date($format, strtotime($fecha));
}

/**
 * Recibe un numero y devuelve en formato ###,##
 * 
 * @param float $numero Numero recibido
 * @param int $decimales Cantidad de decimales
 * 
 * @return string Formato de salida ###,##
 */
function formatearNumero($numero, $decimales = 2)
{
  return number_format($numero, $decimales, ',', '.');
}
