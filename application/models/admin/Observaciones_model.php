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
	private $tableUsuarios;

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
		$this->tableUsuarios = 'usuarios';
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
		$this->db->select('obs.*, aa.ua_id, aa.nombre_aa, ua.nombre_ua, imp.impacto, est.estado, plan.plan, us1.nombre AS nom_creador, us1.apellido AS ape_creador, us2.nombre AS nom_actualizador, us2.apellido AS ape_actualizador');
		$this->db->from($this->table . ' obs');
		$this->db->join($this->tableAA . ' aa', 'aa.id_area_auditada = obs.area_auditada_id');
		$this->db->join($this->tableUA . ' ua', 'ua.id_ua = aa.ua_id');
		$this->db->join($this->tableImpactos . ' imp', 'imp.id_impacto = obs.impacto_id');
		$this->db->join($this->tableEstados . ' est', 'est.id_estado = obs.estado_id');
		$this->db->join($this->tablePlanes . ' plan', 'plan.id_plan = obs.plan_id');
		$this->db->join($this->tableUsuarios . ' us1', 'us1.id_usuario = obs.usuario_creater');
		$this->db->join($this->tableUsuarios . ' us2', 'us2.id_usuario = obs.usuario_updater', 'LEFT');
		$this->db->where('obs.id_observacion', $id_observacion);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function get_obs($id_observacion)
	{
		$this->db->from($this->table);
		$this->db->where('id_observacion', $id_observacion);
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
	public function actualizarALeido($id_observacion, $observacion)
	{
		$observacionAct = $this->get_obs($id_observacion);

		if ($observacionAct->leido != $observacion['leido']) {
			//$observacion['updated_at'] = fechaHoraHoy();
			$this->db->where('id_observacion', $id_observacion);
			$this->db->update($this->table, $observacion);
		}
	}

	//--------------------------------------------------------------
	public function eliminar($id_observacion)
	{
		$observacion['deleted_at'] = date('Y-m-d');
		$this->db->where('id_observacion', $id_observacion);
		return $this->db->update($this->table, $observacion);
	}

	/**
	 * PAGINACION
	 */
	// function getSearchCountTpcs($data){
	// 	$this->db->select("count(*) as total");
	// 	$this->db->from($this->table);
	// 	$query 	= $this->db->get();
	// 	$result = $query->result_array();
	// 	return $result[0]['total'];
	// }

	// function getSearchTpcs($data){
	// 	$this->db->select("obs.*");
	// 	$this->db->from($this->table . " obs");
	// 	$this->db->order_by("obs.fecha_observacion", "desc");
	// 	$this->db->limit($data['perpage'], $data['rowno']);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	//--------------------------------------------------------------
	public function count($data, $words)
	{
		$this->db->select("COUNT(*) total");
		$this->db->from($this->table . " obs");
		$this->db->join($this->tableAA . ' aa', 'aa.id_area_auditada = obs.area_auditada_id');
		
		if ($data['ua_id']) $this->db->where("aa.ua_id", $data['ua_id']);
		if ($data['aa_id']) $this->db->where("obs.area_auditada_id", $data['aa_id']);
		//$this->db->where("sec.act_sec=1 and (sec.visible_sec='panel' or sec.visible_sec='sidebar')");
		//$this->db->where("sec.act_post", $data['filter']);

		$this->db->group_start();
		$i = 0;
		if ($words) {
			foreach ($words as $word) {
				if ($i == 0)
					$this->db->like('obs.proyecto', $word);
				else
					$this->db->or_like('obs.proyecto', $word);
				$i++;
			}
		} else {
			$this->db->like('obs.proyecto', "");
		}
		$this->db->group_end();

		$this->db->order_by($data['order_by'], $data['order']);
		$query 	= $this->db->get();
		$result = $query->row();
		return $result->total;
	}

	//--------------------------------------------------------------
	public function search($data, $words)
	{
		$this->db->select("obs.*");
		$this->db->from($this->table . " obs");
		$this->db->join($this->tableAA . ' aa', 'aa.id_area_auditada = obs.area_auditada_id');
		
		if ($data['ua_id']) $this->db->where("aa.ua_id", $data['ua_id']);
		if ($data['aa_id']) $this->db->where("obs.area_auditada_id", $data['aa_id']);

		$this->db->group_start();
		$i = 0;
		if ($words) {
			foreach ($words as $word) {
				if ($i == 0) {
					$this->db->like('obs.proyecto', $word);
				} else {
					$this->db->or_like('obs.proyecto', $word);
				}
				$i++;
			}
		} else {
			$this->db->like('obs.proyecto', "");
		}
		$this->db->group_end();

		$this->db->order_by($data['order_by'], $data['order']);
		$this->db->limit($data['per_page'], $data['offset']);
		$query 	= $this->db->get();
		return $query->result();
	}
}
