<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UnidadesAcademicas_model extends CI_Model
{
	private $table;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'unidades_academicas';
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
    $this->db->select('id_ua, nombre_ua');
		$this->db->from($this->table);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
	public function get($id_ua)
	{
		$this->db->from($this->table);
		$this->db->where('id_ua', $id_ua);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function crear($unidadAcademica)
	{
		return $this->db->insert($this->table, $unidadAcademica);
	}

	//--------------------------------------------------------------
	public function actualizar($id_ua, $unidadAcademica)
	{
    $unidadAcademica['updated_at'] = fechaHoraHoy();
		$this->db->where('id_ua', $id_ua);
		return $this->db->update($this->table, $unidadAcademica);
	}

	//--------------------------------------------------------------
	public function eliminar($id_ua)
	{
    $unidadAcademica['deleted_at'] = date('Y-m-d');
		$this->db->where('id_ua', $id_ua);
		return $this->db->update($this->table, $unidadAcademica);
	}
}
