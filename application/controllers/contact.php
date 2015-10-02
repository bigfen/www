<?php 
	
	class Contact extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();		
		}
	
		function index()
		{
			$this->form_validation->set_rules('InputName', 'Nom', 'trim|required|xss_clean') ;
			$this->form_validation->set_rules('InputEmail', 'Email', 'trim|required|valid_email|xss_clean') ;
			$this->form_validation->set_rules('InputMessage', 'Message', 'trim|required|xss_clean') ;
			$this->form_validation->set_rules('InputSubject', 'Sujet', 'trim|required|xss_clean') ;
			
			if($this->form_validation->run())
			{
				$this->email->from($this->input->post('InputEmail') , $this->input->post('InputName'));
				$this->email->to('renjy.razanavahy@gmail.com'); 
				//$this->email->cc('another@another-example.com'); 
				//$this->email->bcc('them@their-example.com'); 

				$this->email->subject($this->input->post('InputSubject'));
				$this->email->message($this->input->post('InputMessage'));	

				if(!$this->email->send())
				{
					$data['title'] = 'Compare PC';
					$data['heading'] = 'Contactez-nous ! ';
					$data['content'] = 'contact';
					
					$this->load->view('site/siteTemplate', $data) ; 
				}
				else
				{					
					$data['content'] = 'mail_success';
					$this->load->view('site/siteTemplate', $data) ;
				}
				 
			}
			else
			{
				$data['title'] = 'Compare PC';
				$data['heading'] = 'Contactez-nous ! ';
				$data['content'] = 'contact';
				
				$this->load->view('site/siteTemplate', $data) ; 
			}
				
		}
	}
	

?>