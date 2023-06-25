<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AreasAuditadas_model extends CI_Model
{
	private $table;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'areas_auditadas';
  }

	//--------------------------------------------------------------
	public function get_all()
	{
		$this->db->from($this->table);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
	public function getBySecretaria($secretaria_id)
	{
    $this->db->select('id_area_auditada, nombre_aa');
		$this->db->from($this->table);
    $this->db->where('secretaria_id', $secretaria_id);
		$this->db->where('deleted_at IS NULL');
		return $this->db->get()->result();
	}

  // //--------------------------------------------------------------
	// public function getByUnidadAcademica($ua_id)
	// {
  //   $this->db->select('id_area_auditada, nombre_aa');
	// 	$this->db->from($this->table);

	// 	// if (permisoUA_general()) {
	// 	// 	if ($_SESSION['rol']['aa_id']) $this->db->where('id_area_auditada', $_SESSION['rol']['aa_id']);
	// 	// }
  //   $this->db->where('ua_id', $ua_id);
	// 	$this->db->where('deleted_at IS NULL');
	// 	return $this->db->get()->result();
	// }

	//--------------------------------------------------------------
	public function get($id_area_auditada)
	{
		$this->db->from($this->table);
		$this->db->where('id_area_auditada', $id_area_auditada);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function crear($area_auditada)
	{
		return $this->db->insert($this->table, $area_auditada);
	}

	//--------------------------------------------------------------
	public function actualizar($id_area_auditada, $area_auditada)
	{
    $area_auditada['updated_at'] = fechaHoraHoy();
		$this->db->where('id_area_auditada', $id_area_auditada);
		return $this->db->update($this->table, $area_auditada);
	}

	//--------------------------------------------------------------
	public function eliminar($id_area_auditada)
	{
    $area_auditada['deleted_at'] = date('Y-m-d');
		$this->db->where('id_area_auditada', $id_area_auditada);
		return $this->db->update($this->table, $area_auditada);
	}
}
