<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Carga las palabras ingresadas en la busqueda en un array
 * 
 * @param array $array de palabras ingresadas
 * @return array
 */
function splitArraySearch($array)
{
	$words = array();
	$i = 0;
	foreach ($array as $ele) {
		if ($ele != "el" && $ele != "lo" && $ele != "los" && $ele != "las" && $ele != "con" && $ele != "más" && $ele != "mas" && $ele != "el" && $ele != "de" && $ele != "del" && $ele != "otro" && $ele != "y" && $ele != "o" && $ele != "a" && $ele != "otros" && $ele != "mejor" && $ele != "solo" && $ele != "unico") {
			$words[$i] = $ele;
		}
		$i++;
	}

	return $words;
}

/**
 * Muestra mensaje de posicion de pagina en la tabla
 * 
 * @param int $page Numero de página actual
 * @param int $per_page Total de registros por pagina
 * @param int $total_regs Total de registros
 * @param string $fuc_load Nombre de funcion de paginado (js)
 */
function msjPaginado($page, $per_page, $total_regs)
{
	$ultRegMostrado = $page * $per_page;
	if ($page == 1)
		$primerRegMostrado = 1;
	else
		$primerRegMostrado = $ultRegMostrado - $per_page + 1;

	if ($ultRegMostrado >= $total_regs)
		$ultRegMostrado = $total_regs;

	return "Mostrando $primerRegMostrado a $ultRegMostrado de $total_regs registros";
}

/**
 * Permite paginar los datos de una tabla
 * 
 * @param int $page Numero de página actual
 * @param int $tpages Total de páginas
 * @param string $fuc_load Nombre de funcion de paginado (js)
 */
function paginate($page, $tpages, $adjacents, $fuc_load = 'loadObs')
{
	$prevlabel 	= 'Anterior'; //'<i class="fas fa-chevron-left"></i>';
	$nextlabel 	= 'Próximo'; //'<i class="fas fa-chevron-right"></i>';
	$out 		= '<nav aria-label="..."><ul class="pagination pagination-large justify-content-end table-info-pag mb-0">';

	// previous label
	if ($page == 1) {
		$out .= '<li class="page-item disabled"><a class="page-link">' . $prevlabel . '</a></li>';
	} else if ($page == 2) {
		$out .= '<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="' . $fuc_load . '(1);">' . $prevlabel . '</a></li>';
	} else {
		$out .= '<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="' . $fuc_load . '(' . ($page - 1) . ');">' . $prevlabel . '</a></li>';
	}

	// first label
	if ($page > ($adjacents + 1)) {
		$out .= '<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="' . $fuc_load . '(1);">1</a></li>';
	}

	// interval
	if ($page > ($adjacents + 2)) {
		$out .= '<li class="page-item"><a class="page-link">...</a></li>';
	}

	// pages
	$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
	$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
	for ($i = $pmin; $i <= $pmax; $i++) {
		if ($i == $page) {
			$out .= '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
		} else if ($i == 1) {
			$out .= '<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="' . $fuc_load . '(1);">' . $i . '</a></li>';
		} else {
			$out .= '<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="' . $fuc_load . '(' . $i . ');">' . $i . '</a></li>';
		}
	}

	// interval
	if ($page < ($tpages - $adjacents - 1)) {
		$out .= '<li class="page-item"><a class="page-link">...</a></li>';
	}

	// last
	if ($page < ($tpages - $adjacents)) {
		$out .= '<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="' . $fuc_load . '(' . $tpages . ');">' . $tpages . '</a></li>';
	}

	// next
	if ($page < $tpages) {
		$out .= '<li class="page-item"><a class="page-link" href="javascript:void(0);"" onclick="' . $fuc_load . '(' . ($page + 1) . ');">' . $nextlabel . '</a></li>';
	} else {
		$out .= '<li class="page-item disabled"><a class="page-link">' . $nextlabel . '</a></li>';
	}

	$out .= '</ul></nav>';
	return $out;
}
