<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estados_model extends CI_Model
{
	private $table;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'observacion_estados';
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
    $this->db->select('id_estado, estado');
		$this->db->from($this->table);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
	public function get($id_estado)
	{
		$this->db->from($this->table);
		$this->db->where('id_estado', $id_estado);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function crear($estado)
	{
		return $this->db->insert($this->table, $estado);
	}

	//--------------------------------------------------------------
	public function actualizar($id_estado, $estado)
	{
    $estado['updated_at'] = fechaHoraHoy();
		$this->db->where('id_estado', $id_estado);
		return $this->db->update($this->table, $estado);
	}

	//--------------------------------------------------------------
	public function eliminar($id_estado)
	{
    $estado['deleted_at'] = date('Y-m-d');
		$this->db->where('id_estado', $id_estado);
		return $this->db->update($this->table, $estado);
	}
}
