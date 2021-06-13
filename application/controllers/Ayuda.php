<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayuda extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation','parser','grocery_CRUD']);
		$this->load->helper(['url', 'language', 'grocery_crud_helper']);

		
	}
	public function index(){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_subject('Ayuda', 'Ayudas'); 
		$crud->set_table('ayuda');
		        
        //$crud->required_fields('nombre','precio','codigo');

		$state = $crud->getState(); // VALIDACION
		$state_info = $crud->getStateInfo(); // VALIDACION

        $id_usuario = $this->session->userdata['user_id'];
		$query=$this->db->get_where('users_groups',array('id_user'=>$id_usuario,'id_groups'=>1));
		$grupos=$query->row_array();
		if (!empty($grupos['id'])) {
			$id_grupo=$grupos['id_groups'];
		} else {
			$id_grupo=0;
		}
        if($id_grupo==1) { // ADMIN

        	$crud->columns('titulo','autor','fecha');
			$crud->fields(array('titulo','autor','descripcion'));
			$crud->display_as('titulo','Título');
			$crud->display_as('descripcion','Descripción');
        }

		$outcrud = $crud->render();
		
		$output['css_files'] = array_files_output($outcrud, true);
	    $output['js_files'] = array_files_output($outcrud, false);
		$output['CONTENT'] = $outcrud->output;

		$output['TITTLE']=  "Bitacora";
		$this->_loadbase($output);
    }

}
?>