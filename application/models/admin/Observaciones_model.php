<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Observaciones_model extends CI_Model
{
	private $table;
	private $tableAA;
	private $tableUA;
	private $tableImpactos;
	private $tableEstados;
	private $tablePlanes;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'observaciones';
    $this->tableAA = 'areas_auditadas';
    $this->tableUA = 'unidades_academicas';
    $this->tableImpactos = 'observacion_impactos';
    $this->tableEstados = 'observacion_estados';
    $this->tablePlanes = 'observacion_planes';
  }

	//--------------------------------------------------------------
	public function get_all()
	{
		$this->db->from($this->table);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
  public function getByAreaAuditada($ua_id, $aa_id)
  {
		$where = '';
		if ($ua_id)
			$where .= "(aa.ua_id = '$ua_id')";

		if ($aa_id)
			$where .= "(obs.area_auditada_id = '$aa_id')";

		if ($where)
			$where = str_replace(")(", ") AND (", $where);

		$this->db->select('obs.*');
		$this->db->from($this->table . ' obs');
    $this->db->join($this->tableAA . ' aa', 'aa.id_area_auditada = obs.area_auditada_id');
		if ($where) $this->db->where($where);
    $this->db->where('obs.deleted_at IS NULL');
    return $this->db->get()->result();
  }

	//--------------------------------------------------------------
	public function get($id_observacion)
	{
		$this->db->select('obs.*, aa.ua_id, aa.nombre_aa, ua.nombre_ua, imp.impacto, est.estado, plan.plan');
		$this->db->from($this->table . ' obs');
    $this->db->join($this->tableAA . ' aa', 'aa.id_area_auditada = obs.area_auditada_id');
    $this->db->join($this->tableUA . ' ua', 'ua.id_ua = aa.ua_id');
    $this->db->join($this->tableImpactos . ' imp', 'imp.id_impacto = obs.impacto_id');
    $this->db->join($this->tableEstados . ' est', 'est.id_estado = obs.estado_id');
    $this->db->join($this->tablePlanes . ' plan', 'plan.id_plan = obs.plan_id');
		$this->db->where('obs.id_observacion', $id_observacion);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function crear($observacion)
	{
		return $this->db->insert($this->table, $observacion);
	}

	//--------------------------------------------------------------
	public function actualizar($id_observacion, $observacion)
	{
    $observacion['updated_at'] = fechaHoraHoy();
		$this->db->where('id_observacion', $id_observacion);
		return $this->db->update($this->table, $observacion);
	}

	//--------------------------------------------------------------
	public function eliminar($id_observacion)
	{
    $observacion['deleted_at'] = date('Y-m-d');
		$this->db->where('id_observacion', $id_observacion);
		return $this->db->update($this->table, $observacion);
	}
}
