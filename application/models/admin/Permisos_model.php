<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permisos_model extends CI_Model
{
	private $table;
	// private $tableUsuarios;
	private $tableTipoUser;

  //--------------------------------------------------------------
  public function __construct()
  {
    parent::__construct();

    $this->table = 'usuarios_permisos';
    // $this->tableUsuarios = 'usuarios';
    $this->tableTipoUser = 'usuarios_tipo';
  }

  //--------------------------------------------------------------
	public function get_permiso($usuario_id)
	{
    $this->db->select('per.*, tu.tipo_usuario');
		$this->db->from($this->table . ' per');
		// $this->db->join($this->tableUsuarios . ' usu', 'usu.id_usuario = per.usuario_id');
		$this->db->join($this->tableTipoUser . ' tu', 'tu.id_tipo_usuario = per.usuario_tipo_id');
		$this->db->where('per.usuario_id', $usuario_id);
		$this->db->where('per.deleted_at IS NULL');
		return $this->db->get()->row();
	}

	// //--------------------------------------------------------------
	// public function get($id_estado)
	// {
	// 	$this->db->from($this->table);
	// 	$this->db->where('id_estado', $id_estado);
	// 	return $this->db->get()->row();
	// }

	// //--------------------------------------------------------------
	// public function crear($estado)
	// {
	// 	return $this->db->insert($this->table, $estado);
	// }

	// //--------------------------------------------------------------
	// public function actualizar($id_estado, $estado)
	// {
  //   $estado['updated_at'] = fechaHoraHoy();
	// 	$this->db->where('id_estado', $id_estado);
	// 	return $this->db->update($this->table, $estado);
	// }

	// //--------------------------------------------------------------
	// public function eliminar($id_estado)
	// {
  //   $estado['deleted_at'] = date('Y-m-d');
	// 	$this->db->where('id_estado', $id_estado);
	// 	return $this->db->update($this->table, $estado);
	// }
}
