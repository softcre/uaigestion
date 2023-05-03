<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planes_model extends CI_Model
{
	private $table;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'observacion_planes';
  }

	//--------------------------------------------------------------
	public function get_all()
	{
		$this->db->from($this->table);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

  //--------------------------------------------------------------
	public function get_select()
	{
    $this->db->select('id_plan, plan');
		$this->db->from($this->table);
		$this->db->where('deleted_at IS NULL');
		$this->db->order_by('plan', 'DESC');
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
	public function get($id_plan)
	{
		$this->db->from($this->table);
		$this->db->where('id_plan', $id_plan);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function crear($plan)
	{
		return $this->db->insert($this->table, $plan);
	}

	//--------------------------------------------------------------
	public function actualizar($id_plan, $plan)
	{
    $plan['updated_at'] = fechaHoraHoy();
		$this->db->where('id_plan', $id_plan);
		return $this->db->update($this->table, $plan);
	}

	//--------------------------------------------------------------
	public function eliminar($id_plan)
	{
    $plan['deleted_at'] = date('Y-m-d');
		$this->db->where('id_plan', $id_plan);
		return $this->db->update($this->table, $plan);
	}
}
