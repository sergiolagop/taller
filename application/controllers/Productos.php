<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MY_Controller {

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
        $id_empresas = $this->session->userdata['id_empresas'];

		$crud = new grocery_CRUD();
		$crud->set_subject('Producto', 'Productos'); 
		$crud->set_table('productos');
		        
        //$crud->required_fields('nombre','precio','codigo');
        $crud->set_rules('nombre','Nombre','required|min_length[3]|max_length[50]',array('min_length'=>'El nombre debe tener al menos 3 caracteres','max_length'=>'El Nombre debe tener máximo 50 caracteres'));
        $crud->set_rules('precio','Precio','required|integer|max_length[9]',array('integer'=>'Precio debe ser un número entero','max_length'=>'El precio no puede ser superior a 999.999.999'));
        $crud->set_rules('codigo','Código','required|min_length[8]|max_length[8]',array('min_length'=>'El Código debe tener 8 caracteres.','max_length'=>'El Código debe tener 8 caracteres.'));

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
        	$crud->columns('nombre','codigo','precio');
			if($state == 'edit')
			{
				$primary_key = $state_info->primary_key;
				$query=$this->db->get_where('productos',array('id' => $primary_key ));
				$data=$query->row_array();
				if(!is_array($data))
					redirect('productos','refresh');
			}
		$crud->fields(array('nombre','codigo','precio','descripcion'));
		
        }

		$crud->callback_after_update(array($this, 'productos_after_update'));
		$crud->callback_after_insert(array($this, 'productos_after_insert'));

		$outcrud = $crud->render();
		
		$output['css_files'] = array_files_output($outcrud, true);
	    $output['js_files'] = array_files_output($outcrud, false);
		$output['CONTENT'] = $outcrud->output;

		$output['TITTLE']=  "Productos";
		$this->_loadbase($output);
    }

	function productos_after_insert($post_array,$primary_key)
	{
		$id_usuario = $this->session->userdata['user_id'];
		$detalle="Se ha creado el producto: ".$post_array['nombre'];

		$this->db->insert('bitacoras',array('id_personas' => $id_usuario,'sistema' => 'Ventas Web','tipo'=> 'INSERT','detalle'=> $detalle));
		return true;
	}
	function productos_after_update($post_array,$primary_key)
	{
		$id_usuario = $this->session->userdata['user_id'];
		$detalle="Se ha modificado el producto: ".$post_array['nombre'];

		$this->db->insert('bitacoras',array('id_personas' => $id_usuario,'sistema' => 'Ventas Web','tipo'=> 'UPDATE','detalle'=> $detalle));
		return true;
	}

}
?>