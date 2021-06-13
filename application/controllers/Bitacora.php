<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitacora extends MY_Controller {

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
		$crud->set_subject('Bitacora', 'Registros'); 
		$crud->set_table('bitacoras');
		        
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
        	$crud->unset_add();
        	$crud->unset_edit();
        	$crud->unset_delete();
        	$crud->set_relation('id_personas','personas','nombre');
        	$crud->columns('id','fecha','id_personas','sistema','tipo','detalle');
			$crud->fields(array('id','fecha','id_personas','sistema','tipo','detalle'));
			$crud->display_as('id','Folio');
			$crud->display_as('id_personas','Usuario');
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