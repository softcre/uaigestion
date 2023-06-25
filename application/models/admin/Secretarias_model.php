<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Secretarias_model extends CI_Model
{
	private $table;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'secretarias';
  }

	//--------------------------------------------------------------
	public function get_all()
	{
		$this->db->from($this->table);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

  //--------------------------------------------------------------
	public function getByUnidadAcademica($ua_id)
	{
    $this->db->select('id_secretaria, nombre_secretaria');
		$this->db->from($this->table);
    $this->db->where('ua_id', $ua_id);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
	public function get($id_secretaria)
	{
		$this->db->from($this->table);
		$this->db->where('id_secretaria', $id_secretaria);
		return $this->db->get()->row();
	}
}
