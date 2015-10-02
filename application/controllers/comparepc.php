<?php	
	class _ComparePc extends CI_Controller
	{
		function __construct(){
			parent::__construct();		
			$this->load->model('admin_model') ; 
		}
	
		function index()
		{	
			//variable html
			$data['title'] = 'Comparateur de PC';		
			$data['content'] = 'compare_select';
			$data['small'] = 'Comparer le ratio qualité prix et la puissance dans les jeux-vidéos';

			//variable pour la page			
			$data['row'] = $this->admin_model->getAllPc();			
			$data['rowMarque'] = $this->admin_model->readMarque();			

			$this->load->view('site/siteTemplate',$data);
		}

		//callback pour vérifier que les selects ont une valeur diférente de celle par défaut
		function check_default($post_string)
		{
		  return $post_string == '0' ? FALSE : TRUE;
		}

		/*===============================================
		* recherche de l'IPJ et du score qualité d'un PC
		*===============================================
		*/
		function resultPC()
		{
			if(isset($_POST['inpResultat']))
			{
				$this->form_validation->set_rules('inputPCMarque', 'Marque ', 'trim|required|xss_clean|callback_check_default');
				$this->form_validation->set_message('check_default', 'Vous devez choisir une autre valeur que celle par défaut');
				$this->form_validation->set_rules('InputPCMod', 'Modèle', 'trim|required|xss_clean|callback_check_default');				
				$this->form_validation->set_rules('inputPcPrix', 'Prix ordinateur 1', 'trim|required|xss_clean');

				if ($this->form_validation->run())				
				{
					$data['title'] = 'Indice de puissance et score qualité';

					$row['marque'] = $this->admin_model->getMarque($this->input->post('inputPCMarque')) ; 
					$data['marqueLib'] = $row['marque']->marque_lib ; 
					$data['marqueImg']= $row['marque']->marque_img_path ; 

					$row['pc'] = $this->admin_model->getPc($this->input->post('InputPCMod')) ; 
					$data['pcId'] = $row['pc']->pc_id ; 
					$data['pcLib'] = $row['pc']->pc_lib ; 
					$data['pcImg'] = $row['pc']->pc_img_path ; 
					$data['ipjPc'] = $row['pc']->pc_ipj ; 
					$data['scorePc'] = $row['pc']->pc_score ;
					$data['taille'] = $row['pc']->pc_taille_ecran ; 

					$data['prix'] = $this->input->post('inputPcPrix') ; 
					$data['ratio'] = round(($data['scorePc']/$data['prix']) * 100) ; 

					$data['content'] = 'compare_result';			
					$this->load->view('site/siteTemplate',$data);		
				}
				else
				{	
					$data['title'] = 'Comparateur de PC';		
					$data['content'] = 'compare_select';
					$data['small'] = 'Comparer le ratio qualité prix et la puissance dans les jeux-vidéos';

					//variable pour la page			
					$data['row'] = $this->admin_model->getAllPc();			
					$data['rowMarque'] = $this->admin_model->readMarque();	
					$this->load->view('site/siteTemplate',$data);
				}
			}			
		}

		/*
		* Comparaison de 2 pc
		*
		*/
		function comparePC()
		{
			if (isset($_POST['inpCompare']))
			{
				$this->form_validation->set_rules('inputPCMarque2', '', 'trim|required|xss_clean|callback_check_default');
				$this->form_validation->set_rules('InputPCMod2', '', 'trim|required|xss_clean|callback_check_default');
				$this->form_validation->set_rules('inputPcPrix2', 'Prix ordinateur 2', 'trim|required|xss_clean|numeric');
				$this->form_validation->set_rules('hiddenPc', 'Modèle ordinateur 1', 'trim|required|xss_clean');
				$this->form_validation->set_rules('hiddenPrix', 'Prix ordinateur 1', 'trim|required|xss_clean|numeric');
				$this->form_validation->set_message('check_default', 'Vous devez choisir une autre valeur que celle par défaut');

				if ($this->form_validation->run())
				{
					$row['pc'] = $this->admin_model->getPc($this->input->post('hiddenPc')) ;
					$row['pc2'] = $this->admin_model->getPc($this->input->post('InputPCMod2')) ;
					$data['prix'] = $this->input->post('hiddenPrix') ; 
					$data['prix2'] = $this->input->post('inputPcPrix2') ; 

					$data['pcId1'] = $row['pc']->pc_id ; 
					$data['pcLib'] = $row['pc']->pc_lib ; 
					$data['ipjPc'] = $row['pc']->pc_ipj ; 
					$data['score'] = $row['pc']->pc_score ; 
					$data['pcImg'] = $row['pc']->pc_img_path ; 
					$data['ecran'] = $row['pc']->pc_taille_ecran ; 				
					$data['ratio'] = round(($data['score']/$data['prix']) * 100) ;

					$data['pcId2'] = $row['pc2']->pc_id ; 
					$data['pcLib2'] = $row['pc2']->pc_lib ; 
					$data['ipjPc2'] = $row['pc2']->pc_ipj ; 
					$data['score2'] = $row['pc2']->pc_score ; 
					$data['pcImg2'] = $row['pc2']->pc_img_path ; 
					$data['ecran2'] = $row['pc2']->pc_taille_ecran ; 									
					$data['ratio2'] = round(($data['score2']/$data['prix2']) * 100) ;

					$row['marque1'] =$this->admin_model->getMarque($row['pc']->pc_marque_id) ; 
					$data['marqueLib1'] = $row['marque1']->marque_lib ; 
					$row['marque2'] =$this->admin_model->getMarque($row['pc2']->pc_marque_id) ; 
					$data['marqueLib2'] = $row['marque2']->marque_lib ; 
					
					$data['title'] = 'Résultat de la comparaison';		
					$data['content'] = 'compare_pc';			
					$this->load->view('site/siteTemplate',$data);
				}
				else
				{
					$data['title'] = 'Comparateur de PC';		
					$data['content'] = 'compare_select';
					$data['small'] = 'Comparer le ratio qualité prix et la puissance dans les jeux-vidéos';

					//variable pour la page			
					$data['row'] = $this->admin_model->getAllPc();			
					$data['rowMarque'] = $this->admin_model->readMarque();	
					$this->load->view('site/siteTemplate',$data);
				}				
			}
		}

		function ajaxModeleByMarque()
		{
			$marqueId = $this->input->post('marqueId') ; 
			$pcByMarque['unPc'] = $this->admin_model->getPcByMarque($marqueId) ; 
			$output = '<option selected="selected">Choisissez un modèle</option>' ; 

			foreach ($pcByMarque['unPc'] as $pc)
			{
				$output .= "<option value ='".$pc->pc_id."' >".$pc->pc_lib."</option>" ; 
			}
			echo $output ; 
		}


		//==========================================================================
		//
		//			comparaison de 2 pc en venant d'une autre page que comparePc
		//==========================================================================
		function compareTwoPc()
		{
			if ($this->uri->segment(3))
			{
				$this->form_validation->set_rules('inputPCMarque2', '', 'trim|required|xss_clean|callback_check_default');
				$this->form_validation->set_rules('InputPCMod2', '', 'trim|required|xss_clean|callback_check_default');
				$this->form_validation->set_rules('inputPcPrix2', 'Prix ordinateur 2', 'trim|required|xss_clean|numeric');
				$this->form_validation->set_rules('inputPcPrix', 'Prix ordinateur 1', 'trim|required|xss_clean|numeric');
				//$this->form_validation->set_rules('hiddenPrix', 'Prix ordinateur 1', 'trim|required|xss_clean|numeric');
				$this->form_validation->set_message('check_default', 'Vous devez choisir une autre valeur que celle par défaut');

				if ($this->form_validation->run())
				{
					$row['pc'] = $this->admin_model->getPc($this->input->post('hiddenPc')) ;
					$row['pc2'] = $this->admin_model->getPc($this->input->post('InputPCMod2')) ;
					$data['prix'] = $this->input->post('inputPcPrix') ; 
					$data['prix2'] = $this->input->post('inputPcPrix2') ; 

					$data['pcId1'] = $row['pc']->pc_id ; 
					$data['pcLib'] = $row['pc']->pc_lib ; 
					$data['ipjPc'] = $row['pc']->pc_ipj ; 
					$data['score'] = $row['pc']->pc_score ; 
					$data['pcImg'] = $row['pc']->pc_img_path ; 
					$data['ecran'] = $row['pc']->pc_taille_ecran ; 					
					$data['ratio'] = round(($data['score']/$data['prix']) * 100) ;

					$data['pcId2'] = $row['pc2']->pc_id ; 
					$data['pcLib2'] = $row['pc2']->pc_lib ; 
					$data['ipjPc2'] = $row['pc2']->pc_ipj ; 
					$data['score2'] = $row['pc2']->pc_score ; 
					$data['pcImg2'] = $row['pc2']->pc_img_path ; 
					$data['ecran2'] = $row['pc2']->pc_taille_ecran ; 					

					$data['ratio2'] = round(($data['score2']/$data['prix2']) * 100) ;

					$row['marque1'] =$this->admin_model->getMarque($row['pc']->pc_marque_id) ; 
					$data['marqueLib1'] = $row['marque1']->marque_lib ; 
					$row['marque2'] =$this->admin_model->getMarque($row['pc2']->pc_marque_id) ; 
					$data['marqueLib2'] = $row['marque2']->marque_lib ; 
					
					$data['title'] = 'Résultat de la comparaison';		
					$data['content'] = 'compare_pc';			
					$this->load->view('site/siteTemplate',$data);
				}
				else
				{
					$data['pcId'] = $this->uri->segment(3) ; 
					$data['rowMarque'] = $this->admin_model->readMarque();	
					$row['pc'] = $this->admin_model->getPc($this->uri->segment(3)) ; 
					$data['pcLib'] = $row['pc']->pc_lib ; 
					$row['marque'] = $this->admin_model->getMarque($row['pc']->pc_marque_id) ; 
					$data['marqueLib'] = $row['marque']->marque_lib ; 

					$data['title'] = 'Comparaison de 2 pc' ; 
					$data['content'] = 'compare_two_pc' ; 
					$this->load->view('site/siteTemplate', $data);
				}
			}
		}

		/*======================================================================================
		*	Calcul du ratio score qualité/prix en venant d'un autre controller que comparePC
		*=======================================================================================*/
		function ratio()
		{
			$this->form_validation->set_rules('inputPcPrix', 'Prix', 'trim|required|xss_clean');

			if ($this->form_validation->run())
			{
				$row['pc'] = $this->admin_model->getPc($this->uri->segment(3)) ; 
				$row['marque'] = $this->admin_model->getMarque($row['pc']->pc_marque_id) ; 

				$data['marqueLib'] = $row['marque']->marque_lib ; 
				$data['pcId'] = $row['pc']->pc_id ; 
				$data['pcLib'] = $row['pc']->pc_lib ; 
				$data['pcImg'] = $row['pc']->pc_img_path ; 
				$data['ipjPc'] = $row['pc']->pc_ipj ; 
				$data['scorePc'] = $row['pc']->pc_score ;
				$data['taille'] = $row['pc']->pc_taille_ecran ; 				
				$data['prix'] = $this->input->post('inputPcPrix') ;
				$data['ratio'] = round(($data['scorePc']/$data['prix']) * 100) ; 
				$data['title'] = 'Calcul du ratio qualité/prix' ; 
				$data['content'] = 'compare_ratio' ;
				$this->load->view('site/siteTemplate', $data);
				$this->form_validation->set_rules('inputPcPrix', 'Prix', 'trim|required|xss_clean');
			}
			else
			{
				if ($this->uri->segment(3))
				{				

					$row['pc'] = $this->admin_model->getPc($this->uri->segment(3)) ; 
					$row['marque'] = $this->admin_model->getMarque($row['pc']->pc_marque_id) ; 

					$data['marqueLib'] = $row['marque']->marque_lib ; 
					$data['pcId'] = $row['pc']->pc_id ; 
					$data['pcLib'] = $row['pc']->pc_lib ; 
					$data['pcImg'] = $row['pc']->pc_img_path ; 
					$data['ipjPc'] = $row['pc']->pc_ipj ; 
					$data['scorePc'] = $row['pc']->pc_score ;
					$data['taille'] = $row['pc']->pc_taille_ecran ; 
					//$data['lienPc'] = $row['pc']->pc_lien ;
					
					$data['title'] = 'Calcul du ratio qualité/prix' ; 
					$data['content'] = 'compare_ratio' ;
					$this->load->view('site/siteTemplate', $data);
				}
			}			
		}

		function popupDetail()	
		{
			if ($this->uri->segment(3))
			{
				$row['pc'] = $this->admin_model->getPc($this->uri->segment(3)) ; 
				$data['pcDescript'] = $row['pc']->pc_descript ; 
				$this->load->view('site/popupDetail', $data);
			}
		}
	}
	
?>