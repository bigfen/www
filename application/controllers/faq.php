<?php 
	
	class Faq extends CI_Controller{
		function __construct(){
			parent::__construct();		
		}
	
		function index()
		{
			$data['title'] = 'FAQ';		
			$data['content'] = 'faq';
			$data['small'] = '';

			//variable pour la page			
			$data['row'] = $this->admin_model->readFaq();					

			$this->load->view('site/siteTemplate',$data);
		}
	}
	
?>