<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
	private $table;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'usuarios';
  }

	//--------------------------------------------------------------
	public function get_all()
	{
		$this->db->from($this->table);
		$this->db->where('deleted_at', false);
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
	public function get($id_usuario)
	{
		$this->db->from($this->table);
		$this->db->where('id_usuario', $id_usuario);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function get_user_correo($correo)
	{
		$this->db->where('email', $correo);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get($this->table)->row();
	}

	//--------------------------------------------------------------
	public function actualizar($id_usuario, $usuario)
	{
		$this->db->where('id_usuario', $id_usuario);
		return $this->db->update($this->table, $usuario);
	}
}
