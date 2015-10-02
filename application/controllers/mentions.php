<?php 
	
	class Mentions extends CI_Controller{
		function __construct(){
			parent::__construct();		
		}
	
		function index()
		{
			$data['title'] = 'Compare PC';
			$data['heading'] = 'Mentions légales';
			$data['content'] = 'mentions';
			$data['small'] = '';
			
			$this->load->view('site/siteTemplate', $data) ; 
		}
	}
	
?>