
<?php 


class CompatibiliteJeu extends CI_Controller
{
	function __construct(){
		parent::__construct();		

	}

	function index()
	{
		//on vérifie uri pour savoir si on vient du configurateur
		if ($this->uri->segment(2))
		{
			$data['IPJ'] = $this->uri->segment(2) ; 	
		}
		else
		{
			redirect('configurerpc') ; 
		}
		/*$data['row'] = $this->admin_model->getAllPc();
		$data['rowMarque'] = $this->admin_model->readMarque();
		
		*/	
		$data['rowJeu'] = $this->admin_model->readJeu() ; 
		$data['content']  = 'compatibilite_select' ;
		$data['title'] = 'Compatibilité dans les jeux' ; 		

		$this->load->view('site/siteTemplate', $data);	
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

	/*******************************************************************************
									compatibilité jeu/ pc
	********************************************************************************/

	function compatibiliteResultIpj()
	{
		$this->form_validation->set_rules('inputJeu', 'Jeu', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputipjConfigHidden', 'xss_clean');
		if ($this->form_validation->run())
		{
			$ipjConfig = $this->input->post('inputipjConfigHidden') ; 
			$row['jeu'] = $this->admin_model->getJeu($this->input->post('inputJeu')) ; 

			$ipprHaut = $row['jeu']->ipprHaut ; 
			$ipprBas = $row['jeu']->ipprBas ; 
			$ipprUltra = $row['jeu']->ipprUltra ; 
			$data['resolutionHaute'] = '' ; 
			$data['resolutionBasse'] = '' ; 

			if ($ipprHaut<$ipjConfig)
			{
				$data['ipprhaut'] = $ipprHaut;
				$data['resolutionHaute'] = 'OK' ; 
			}
			else
			{
				$data['resolutionHaute'] = 'NO'; 
			}

			if ($ipprBas<$ipjConfig)
			{
				$data['resolutionBasse'] = 'OK' ; 
			} 
			else
			{
				$data['resolutionBasse'] = 'NO' ;
			}
			
			$data['jeu_lib'] = $row['jeu']->jeu_lib ;
			$data['imgPath'] = $row['jeu']->jeu_img_path ; 
			$data['IPJ'] = $ipjConfig ; 
			$data['ipprultra'] = $ipprUltra;
			$data['ipprbas'] = $ipprBas;
			$data['ipprhaut'] = $ipprHaut;
			$data['content']  = 'compatibilite_result' ;
			$data['title'] = 'Compatibilité dans les jeux' ; 	
			$tauxCompatibilite= ($ipjConfig/$ipprUltra) * 100 ; 
			$data['tauxCompatibilite'] = $tauxCompatibilite ; 
			$this->load->view('site/siteTemplate', $data);	
		}
	}

	/**************************************************************************************
	*				Compatibilité depuis compare pc pou marque 							  *
	************************************************************************************* */
	function _compatibiliteResultPc()
	{
		$this->form_validation->set_rules('inputPc', 'modelePc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputJeu', 'Jeu', 'trim|required|xss_clean');

		if ($this->form_validation->run())
		{
			$row['jeu'] = $this->admin_model->getJeu($this->input->post('inputJeu')) ; 
			$ipprHaut = $row['jeu']->ipprHaut ; 
			$ipprBas = $row['jeu']->ipprBas ; 
			$ipprUltra = $row['jeu']->ipprUltra ; 

			$row['pc'] = $this->admin_model->getPc($this->input->post('inputPc')) ;
			$ipjPc = $row['pc']->pc_ipj ; 

			$row['marque'] = $this->admin_model->getMarque($this->input->post('inputPCMarque')) ; 

			$data['resolutionHaute'] = '' ; 
			$data['resolutionBasse'] = '' ; 

			if ($ipprHaut<$ipjPc)
			{
				$data['ipprhaut'] = $ipprHaut;
				$data['resolutionHaute'] = 'OK' ; 
			}
			else
			{
				$data['resolutionHaute'] = 'NO'; 
			}

			if ($ipprBas<$ipjPc)
			{
				$data['resolutionBasse'] = 'OK' ; 
			} 
			else
			{
				$data['resolutionBasse'] = 'NO' ;
			}

			$data['jeuLib'] = $row['jeu']->jeu_lib ; 
			$data['marqueLib'] = $row['marque']->marque_lib ; 
			$data['marqueImg'] = $row['marque']->marque_img_path ; 
			$data['imgPath'] = $row['jeu']->jeu_img_path ; 
			$data['pcLib'] = $row['pc']->pc_lib ; 
			$data['pcImg'] = $row['pc']->pc_img_path ; 
			$data['ipj'] = $ipjPc ; 
			$data['ipprultra'] = $ipprUltra;
			$data['ipprbas'] = $ipprBas;
			$data['ipprhaut'] = $ipprHaut;
			$data['content']  = 'compatibilite_result_select' ;
			$data['title'] = 'Compatibilité dans les jeux' ; 	
			$tauxCompatibilite= ($ipjPc/$ipprUltra) * 100 ; 
			$data['tauxCompatibilite'] = round($tauxCompatibilite,2) ; 
			$this->load->view('site/siteTemplate', $data);		
		}
	}
}


?>


