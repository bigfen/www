 <?php
class Site extends CI_Controller{
	
	function __construct(){
		parent::__construct();	
		//sécurité -> destruction de toutes les sessions sur la page dindex du site 
		$this->session->unset_userdata('login') ; 
		$this->session->unset_userdata('logged') ; 		
		$this->session->sess_destroy() ; 	
	}

	function index()
	{


		//page d'acceuil du sitew
		$data['title'] = 'Compare PC';
		$data['heading'] = 'Bienvenue sur Compare PC';
		$data['content'] = 'site_acceuil';
		$datat['small'] = 'Comparateur de PC';
		$this->load->view('site/siteTemplate', $data) ; 
		
	}
}

?>