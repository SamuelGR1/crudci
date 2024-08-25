<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Persona');
		
	}

	public function index() {
		$datos['gente'] = $this->Persona->seleccionar_todo();
		$this->load->view('welcome_message', $datos);
	}

	public function agregar() {
		$persona['nombre'] = $this->input->post('nombre');
		$persona['primer_apellido'] = $this->input->post('primer_apellido');
		$persona['segundo_apellido'] = $this->input->post('segundo_apellido');
		$persona['birth_date'] = $this->input->post('birth_date');
		$persona['gender'] = $this->input->post('gender');
		
		$this->Persona->agregar($persona);
		redirect('welcome');
	}

	public function eliminar($id_persona) {
		$this->Persona->eliminar($id_persona);
		redirect('welcome');
	}


	public function editar($id_persona) {
		$persona['nombre'] = $this->input->post('nombre');
		$persona['primer_apellido'] = $this->input->post('primer_apellido');
		$persona['segundo_apellido'] = $this->input->post('segundo_apellido');
		$persona['birth_date'] = $this->input->post('birth_date');
		$persona['gender'] = $this->input->post('gender');

		$this->Persona->actualizar($persona, $id_persona);
		redirect('welcome');
	}
}
