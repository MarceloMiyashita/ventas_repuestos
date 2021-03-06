<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("url",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("menu_id",$menu);
		$this->db->where("rol_id",$rol);
		$resultado = $this->db->get("permisos");
		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}

		return false;
		
	}

	public function rowCount($tabla){
		if ($tabla == "ventas") {
			if ($this->session->userdata("sucursal")) {
				$this->db->where("sucursal_id",$this->session->userdata("sucursal"));
			}
			$this->db->where("estado","1");
		}
		if ($tabla == "usuarios") {
			if ($this->session->userdata("sucursal")) {
				$this->db->where("sucursal_id",$this->session->userdata("sucursal"));
			}
			$this->db->where("estado","1");
		}
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}

	public function getParents($rol)
	{
		$this->db->select("m.*");
		$this->db->from("menus m");
		$this->db->join("permisos p", "p.menu_id = m.id");
		$this->db->where("p.rol_id",$rol);
		$this->db->where("p.read","1");
		$this->db->where("m.parent","0");

		$this->db->where("m.estado",1);
		$this->db->order_by("m.orden","asc");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}

	public function getChildren($rol,$idMenu)
	{
		$this->db->select("m.*");
		$this->db->from("menus m");
		$this->db->join("permisos p", "p.menu_id = m.id");
		$this->db->where("p.rol_id",$rol);
		$this->db->where("p.read","1");
		$this->db->where("m.parent",$idMenu);
		$this->db->where("m.estado",1);
		$this->db->order_by("m.orden","asc");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function stockminimo(){
		$this->db->where("estado","1");
		$query = $this->db->get("productos");
		$return = array();

	    foreach ($query->result() as $producto)
	    {
	    	if ($producto->stock <= $producto->stock_minimo) {
	    		$return[$producto->id] = $producto;
	    	}
	        
	    }

	    return $return;

	}

	public function getNotificaciones(){

		$this->db->select("n.*, p.nombre, p.stock, p.stock_minimo");
		$this->db->from("notificaciones n");
		$this->db->join("productos p", "n.producto_id = p.id");
		$this->db->where("n.estado","0");
		$this->db->order_by("n.id","DESC");
		$resultados = $this->db->get();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}

	public function savelogs($data){
		return $this->db->insert("logs",$data);
	}

	public function getLogs(){
		$this->db->select("l.*, u.email");
		$this->db->from("logs l");
		$this->db->join("usuarios u", "l.usuario_id = u.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getFirstUrl($rol){
		/*SELECT * FROM permisos p JOIN menus m on p.menu_id = m.id WHERE rol_id = '1' and m.url!='#' ORDER BY m.orden*/
		$this->db->select("m.url");
		$this->db->from("permisos p");

		$this->db->join("menus m", "p.menu_id = m.id");
		$this->db->where("p.rol_id",$rol);
		$this->db->where("m.url !=",'#');
		$this->db->order_by('m.orden');
		$this->db->order_by('m.parent');
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0 ) {
			return $resultados->row();
		}
		return false;
	}

	
}