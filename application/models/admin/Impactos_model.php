<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Impactos_model extends CI_Model
{
	private $table;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'observacion_impactos';
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
    $this->db->select('id_impacto, impacto');
		$this->db->from($this->table);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
	public function get($id_impacto)
	{
		$this->db->from($this->table);
		$this->db->where('id_impacto', $id_impacto);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function crear($impacto)
	{
		return $this->db->insert($this->table, $impacto);
	}

	//--------------------------------------------------------------
	public function actualizar($id_impacto, $impacto)
	{
    $impacto['updated_at'] = fechaHoraHoy();
		$this->db->where('id_impacto', $id_impacto);
		return $this->db->update($this->table, $impacto);
	}

	//--------------------------------------------------------------
	public function eliminar($id_impacto)
	{
    $impacto['deleted_at'] = date('Y-m-d');
		$this->db->where('id_impacto', $id_impacto);
		return $this->db->update($this->table, $impacto);
	}
}
