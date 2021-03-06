<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Tipo_bodegas extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Comun_model");
		
	}

	public function index()
	{
		$contenido_interno  = array(
			"permisos" => $this->permisos,
			"bodegas" => $this->Comun_model->get_records("bodegas"), 
			"bodega_venta" => $this->Comun_model->get_record("bodegas","seleccion_ventas='1'"),
		);

		$contenido_externo = array(
			"title" => "Bodegas", 
			"contenido" => $this->load->view("admin/tipo_bodegas/list", $contenido_interno, TRUE)
		);
		$this->load->view("admin/template",$contenido_externo);

	}

	public function add(){
		$contenido_externo = array(
			"title" => "Bodegas", 
			"contenido" => $this->load->view("admin/tipo_bodegas/add","", TRUE)
		);
		$this->load->view("admin/template",$contenido_externo);
	}

	public function store(){

		$nombre = $this->input->post("nombre");
		$this->form_validation->set_rules("nombre","Nombre","required|is_unique[bodegas.nombre]");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				"nombre" => $nombre, 
				"estado" => "1"
			);

			if ($this->Comun_model->insert("bodegas", $data)) {
				redirect(base_url()."almacen/tipo_bodegas");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."almacen/tipo_bodegas/add");
			}
		}
		else{
			$this->add();
		}
	}

	public function edit($id){
		$contenido_interno  = array(
			//"permisos" => $this->permisos,
			"bodega" => $this->Comun_model->get_record("bodegas","id=$id"), 
		);

		$contenido_externo = array(
			"title" => "bodegas", 
			"contenido" => $this->load->view("admin/tipo_bodegas/edit", $contenido_interno, TRUE)
		);
		$this->load->view("admin/template",$contenido_externo);
	}

	public function update(){
		$idBodega = $this->input->post("idBodega");
		$nombre = $this->input->post("nombre");

		$sucursalActual = $this->Comun_model->get_record("bodegas","id=$idBodega");

		if ($nombre == $sucursalActual->nombre) {
			$is_unique_nombre = "";
		}else{
			$is_unique_nombre = "|is_unique[bodegas.nombre]";
		}

		$this->form_validation->set_rules("nombre","Nombre","required".$is_unique_nombre);

		if ($this->form_validation->run()==TRUE) {
			$data = array(
				"nombre" => $nombre,
			);

			if ($this->Comun_model->update("bodegas","id=$idBodega",$data)) {
				redirect(base_url()."almacen/tipo_bodegas");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."almacen/tipo_bodegas/edit/".$idBodega);
			}
		}else{
			$this->edit($idBodega);
		}

		
	}

	public function view($id){
		$data  = array(
			"bodega" => $this->Comun_model->get_record("bodegas", "id=$id"), 
		);
		$this->load->view("admin/tipo_bodegas/view",$data);
	}

	public function habilitar($id){
		$data  = array(
			"estado" => "1", 
		);
		$this->Comun_model->update("bodegas","id=$id",$data);
		//echo "almacen/tipo_bodegas";
		redirect(base_url()."almacen/tipo_bodegas");
	}

	public function deshabilitar($id){
		$data  = array(
			"estado" => "0", 
		);
		$this->Comun_model->update("bodegas","id=$id",$data);
		//echo "almacen/tipo_bodegas";
		redirect(base_url()."almacen/tipo_bodegas");
	}

	public function set_bodega_venta(){
		$bodega_venta = $this->input->post("bodega_venta");
		$dataUpdate = array('seleccion_ventas' => 0, );
		$dataSeleccion  = array(
			'seleccion_ventas' => 1, 
		);
		$this->Comun_model->update("bodegas","",$dataUpdate);
		if ($this->Comun_model->update("bodegas","id=$bodega_venta",$dataSeleccion)) {
			redirect(base_url()."almacen/tipo_bodegas");
		}else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."almacen/tipo_bodegas");
		}
	}
}
