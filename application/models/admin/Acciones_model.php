<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acciones_model extends CI_Model
{
	private $table;
	private $tableUser;
	private $tablePermisos;

	//--------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();

		$this->table = 'observacion_acciones';
		$this->tableUser = 'usuarios';
		$this->tablePermisos = 'usuarios_permisos';
	}

	//--------------------------------------------------------------
	public function getByObservacion($observacion_id)
	{
		$this->db->select('ae.*, user.nombre, user.apellido, user.foto, per.usuario_tipo_id');
		$this->db->from($this->table . ' ae');
		$this->db->join($this->tableUser . ' user', 'user.id_usuario = ae.usuario_id');
		$this->db->join($this->tablePermisos . ' per', 'per.usuario_id = ae.usuario_id');
		$this->db->where('ae.observacion_id', $observacion_id);
		$this->db->where('ae.deleted_at IS NULL');
		return $this->db->get()->result();
	}

	//--------------------------------------------------------------
	public function get($id_accion)
	{
		$this->db->from($this->table);
		$this->db->where('id_accion', $id_accion);
		return $this->db->get()->row();
	}

	//--------------------------------------------------------------
	public function crear($accion)
	{
		return $this->db->insert($this->table, $accion);
	}

	//--------------------------------------------------------------
	public function actualizar($id_accion, $accion)
	{
		$accion['updated_at'] = fechaHoraHoy();
		$this->db->where('id_accion', $id_accion);
		return $this->db->update($this->table, $accion);
	}

	//--------------------------------------------------------------
	public function actualizarALeido($id_accion, $accion)
	{
		//$observacion['updated_at'] = fechaHoraHoy();
		$this->db->where('id_accion', $id_accion);
		$this->db->update($this->table, $accion);
	}

	//--------------------------------------------------------------
	public function eliminar($id_accion)
	{
		$accion['deleted_at'] = date('Y-m-d');
		$this->db->where('id_accion', $id_accion);
		return $this->db->update($this->table, $accion);
	}
}
