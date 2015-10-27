<?php
	
	class configurerPc extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();		
		}
	
		function index()
		{			
			$data['title'] 		= 'Compare-PC | Configurer';		
			$data['content'] 	= 'configure_select';	
			$data['small'] 		= 'Créer votre propre PC avec les 4 principaux composants et obtenez votre score qualité et votre indicde de puissance ';
			$data['rowRam'] 	= $this->admin_model->readRam();
			$data['rowProc'] 	= $this->admin_model->readProcesseur();
			$data['rowRot'] 	= $this->admin_model->readRotation();
			$data['rowCarte'] 	= $this->admin_model->readCarte();

			$this->load->view('site/siteTemplate',$data);	
		}

		//callback pour vérifier que les selects ont une valeur diférente de celle par défaut
		function check_default($post_string)
		{
		  return $post_string == '0' ? FALSE : TRUE;
		}

		//function pour mambo.js
		//@param $ratio : ratio à évaluer pour appliquer le code couleur
		//@param $pcCat : catégorie de pc | 1 pour pc de bureau | 2 pour pc portable
		//return un libellé et une couleur
		function fillMambo($ratio, $pcCat)
		{			

			$tabMambo = array(
				'circleColor' 	=> '' , 
				'ringColor' 	=> '',
				'lib' 			=>''
			) ; 

			switch ($pcCat)
			{
				case 2 :
					if ($ratio < 30)
					{
						$tabMambo = array(
							'circleColor' 	=> '#4C1B1B' , 
							'ringColor' 	=> '#B9121B',
							'lib' 			=>'Mauvais rapport qualité prix'
						) ; 
					}
					else
					{
						if ($ratio<40)					
						{
							$tabMambo = array(
								'circleColor' 	=> '#ECAA37' , 
								'ringColor' 	=> '#F27100',
								'lib' 			=>'Rapport qualité/prix moyen'
							) ; 
						}
						else
						{
							if ($ratio < 50)
							{
								$tabMambo = array(
									'circleColor' 	=> '#F9E325' , 
									'ringColor' 	=> '#F9F07C',
									'lib' 			=>'Rapport qualité/prix bon'	
								) ; 
							}
							else
							{
								if ($ratio < 60)
								{
									$tabMambo = array(
										'circleColor' 	=> '#1A840A' , 
										'ringColor' 	=> '#5DB94F',
										'lib' 			=>'Rapport qualité/prix très bon'
									) ; 
								}
								else
								{
									if ($ratio > 60) ; 
									{
										$tabMambo = array(
											'circleColor' 	=> '#14294c' , 
											'ringColor' 	=> '#3577be',
											'lib' 			=>'Rapport qualité/prix excellent'
										) ; 
									}
								}				
							}	
						}
					}
					break;
				
				case 1 : 
					if ($ratio < 40)
					{
						$tabMambo = array(
							'circleColor' 	=> '#4C1B1B' , 
							'ringColor' 	=> '#B9121B',
							'lib' 			=>'Mauvais rapport qualité prix'
						) ; 
					}
					else
					{
						if ($ratio<60)					
						{
							$tabMambo = array(
								'circleColor' 	=> '#ECAA37' , 
								'ringColor' 	=> '#F27100',
								'lib' 			=>'Rapport qualité/prix moyen'
							) ; 
						}
						else
						{
							if ($ratio < 80)
							{
								$tabMambo = array(
									'circleColor' 	=> '#F9E325' , 
									'ringColor' 	=> '#F9F07C',
									'lib' 			=>'Rapport qualité/prix bon'	
								) ; 
							}
							else
							{
								if ($ratio < 90)
								{
									$tabMambo = array(
										'circleColor' 	=> '#1A840A' , 
										'ringColor' 	=> '#5DB94F',
										'lib' 			=>'Rapport qualité/prix très bon'
									) ; 
								}
								else
								{
									if ($ratio > 100) ; 
									{
										$tabMambo = array(
											'circleColor' 	=> '#14294c' , 
											'ringColor' 	=> '#3577be',
											'lib' 			=>'Rapport qualité/prix excellent'
										) ; 
									}
								}				
							}	
						}
					}

					break;
			}

			return $tabMambo ; 
		}

		function configureResult()
		{
		//vérification formulaire du configurateur			
			
			$this->form_validation->set_rules('inputConfigDD', 'Quantité disque dur', 'trim|required|xss_clean');	
			$this->form_validation->set_rules('inputConfigRot', 'Vitesse disque', 'trim|required|xss_clean|callback_check_default');
			$this->form_validation->set_rules('inputConfigDD2', '', 'trim|xss_clean');	
			$this->form_validation->set_rules('inputConfigRot2', '', 'trim|xss_clean');
			$this->form_validation->set_rules('inputConfigCarte', 'Carte graphique', 'trim|required|xss_clean|callback_check_default');
			$this->form_validation->set_rules('inputConfigQteHz', 'Fréquence', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputConfigProc', 'Processeur', 'trim|required|xss_clean|callback_check_default');		
			$this->form_validation->set_rules('inputConfigQteRam', 'Quantité rams', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputConfigRam', 'Type de ram', 'trim|required|xss_clean|callback_check_default');
			$this->form_validation->set_rules('inputConfigPrix', 'Prix', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputCatPc', 'Catégorie de PC', 'trim|required|xss_clean|callback_check_default');
			$this->form_validation->set_message('check_default', 'Vous devez choisir une autre valeur que celle par défaut');

			if ($this->form_validation->run()) 
			{
				$this->load->model('admin_model');

				//calcul du score qualité prix
				$qteDD 				= $this->input->post('inputConfigDD') ;
				$rowRot['rowRot'] 	= $this->admin_model->getRotation($this->input->post('inputConfigRot')) ;
				$coeffDD 			= $rowRot['rowRot']->rotation_coeff ;

				$qteHz 				= $this->input->post('inputConfigQteHz') ;
				$rowProc['rowProc']	= $this->admin_model->getProcesseur($this->input->post('inputConfigProc')) ;
				$coeffProc 			= $rowProc['rowProc']->processeur_coeff ; 
				$coeffProcJeu 		= $rowProc['rowProc']->processeur_coeff_jeu ; 
				

				$rowCarte['rowCarte'] 	= $this->admin_model->getCarte($this->input->post('inputConfigCarte')) ;
				$coeffCarte 			= $rowCarte['rowCarte']->cartegraph_coeff ; 
				$coeffCarteJeu 			= $rowCarte['rowCarte']->cartegraph_coeff_jeu ; 
				

				$qteRam 			= $this->input->post('inputConfigQteRam') ;
				$rowRam['rowRam'] 	= $this->admin_model->getRam($this->input->post('inputConfigRam')) ;
				$coeffRam 			= $rowRam['rowRam']->ram_coeff ; 
				$coeffRamJeu 		= $rowRam['rowRam']->ram_coeff_jeu ;

				$data['score'] 	= 0 ; 
				$coeffPrixdd2 	= 1 ; 

				if (!empty($_POST['inputConfigDD2']) && $_POST['inputConfigRot2'] != '0' )
				{
					$Prixdd2 		= $this->admin_model->getCoeff(3) ;	
					$coeffPrixdd2 	= $Prixdd2->coeff_val ; 

					$data['qteDD2'] = $this->input->post('inputConfigDD2') ; 
					$qteDD2 		= $data['qteDD2'] ; 

					$rowRot2['rowRot2'] = $this->admin_model->getRotation($this->input->post('inputConfigRot2')) ;
					$coeffDD2 			= $rowRot2['rowRot2']->rotation_coeff ;
					$data['vitesse2'] 	= $rowRot2['rowRot2']->rotation_vitesse ; 

					$data['score'] = ($qteDD * $coeffDD) + ($qteDD2 * $coeffDD2) + ($qteHz * $coeffProc) + $coeffCarte + ($qteRam * $coeffRam) ;
				}
				else
				{
					$data['score'] 	= ($qteDD * $coeffDD) + ($qteHz * $coeffProc) + $coeffCarte + ($qteRam * $coeffRam) ;
					$coeffPrixdd2 	= 1 ;
				}	


				//Chargement des coefficients
				$PrixCarte 		= $this->admin_model->getCoeff(1) ;
				$coeffPrixCarte = $PrixCarte->coeff_val ; 

				$Prixdd1 		= $this->admin_model->getCoeff(2) ;
				$coeffPrixdd1 	= $Prixdd1->coeff_val ; 

				$PrixProc 		= $this->admin_model->getCoeff(4) ;
				$coeffPrixProc 	= $PrixProc->coeff_val ; 

				$PrixRam 		= $this->admin_model->getCoeff(5) ;
				$coeffPrixRam 	= $PrixRam->coeff_val ; 

				$prixGeneral 	= $this->admin_model->getCoeff(6) ;
				$coeffPrixGen 	= $prixGeneral->coeff_val ; 


				
				$prix = $this->input->post('inputConfigPrix') * $coeffPrixGen * $coeffPrixCarte * $coeffPrixdd1 * $coeffPrixdd2 * $coeffPrixProc * $coeffPrixRam ;

				$ratio 			= ($data['score']/$prix) * 100;
				$couleurMambo 	= $this->fillMambo($ratio, $this->input->post('inputCatPc')) ; 
				$data['circleColor'] 	= $couleurMambo['circleColor'] ; 
				$data['ringColor'] 		= $couleurMambo['ringColor'] ;
				$data['commRatio'] 		= $couleurMambo['lib'] ; 				
				$data['ratio'] 			= round($ratio,2) ; 

				//calcul de lipj
				//$ipj = $coeffProcJeu * $coeffCarteJeu * $coeffRamJeu  * $qteHz ; 
				//$data['ipj'] = round($ipj,2) ; 

				//récupération des infos postés pour présentation
				$data['processeur'] 	= $rowProc['rowProc']->processeur_lib ; 
				$data['vitesse'] 		= $rowRot['rowRot']->rotation_vitesse ; 
				$data['carte'] 			= $rowCarte['rowCarte']->cartegraph_lib ; 
				$data['ram'] 			= $rowRam['rowRam'] ->ram_lib ; 
				$data['disque'] 		= $this->input->post('inputConfigDD') ; 
				$data['Freq'] 			= $this->input->post('inputConfigQteHz') ; 
				$data['qteRam'] 		= $this->input->post('inputConfigQteRam') ; 
				$data['prix'] 			= $this->input->post('inputConfigPrix') ;
				$data['catPc'] 			= ($this->input->post('inputCatPc') == "1") ? 'PC de bureau' : 'PC portable' ;

				//info page
				$data['title'] 		= 'Compare-PC | Configurer';		
				$data['content'] 	= 'configure_result';	
				//$data['small'] = 'Créer votre propre PC avec les 4 principaux composants et obtenez votre score qualité et votre indicde de puissance ';				
				$this->load->view('site/siteTemplate',$data);
			}
			else
			{
				//info page
				$data['title'] 		= 'Compare-PC | Configurer';		
				$data['content'] 	= 'configure_select';	
				$data['small'] 		= 'Créer votre propre PC avec les 4 principaux composants et obtenez votre score qualité et votre indicde de puissance ';
				$data['rowRam'] 	= $this->admin_model->readRam();
				$data['rowProc'] 	= $this->admin_model->readProcesseur();
				$data['rowRot'] 	= $this->admin_model->readRotation();
				$data['rowCarte'] 	= $this->admin_model->readCarte();
				$this->load->view('site/siteTemplate',$data);				
			}
		}
	}
	
?>