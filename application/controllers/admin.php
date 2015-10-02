<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller
{
	function __construct()
	{		
		parent::__construct();	
		//si aucune variable de session n'existe, on renvoie vers le formulaire de connexion	
		if (!$this->session->userdata('login') && !$this->session->userdata('logged'))
		{
			//l'admin arrive sur la page de connexion
			//le constructeur vérifie s'il existe une session sinon redirigé vers le formulaire de connexion
			//==> boucle infini 
			//solution -> vérifier que la méthode dans laquel on se trouve n'est pas l'index
			if ($this->router->fetch_method() != 'index') 
			{
				redirect('admin') ; 
			} 
		}
	}

	//index admin = form de connexion au panneau
	function index()
	{		
		// //on vérifie si une session existe pour ne pas avoir à re soumettre le formulaire d'auth
		if ($this->session->userdata('login') && $this->session->userdata('logged'))
		{
			redirect(site_url().'/admin/general') ; 
		}

		$this->form_validation->set_rules('inputLogin', 'Login', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputPasswd', 'Password', 'trim|required|xss_clean');

		if($this->form_validation->run())
		{
			$this->load->model('admin_model') ; 
			if($this->admin_model->verif_id($this->input->post('inputLogin'),$this->input->post('inputPasswd')))
			{
				$dataSession = array(
					'login' => $this->input->post('inputLogin'), 
					'logged' => TRUE
				);

				$this->session->set_userdata($dataSession) ; 
				redirect(site_url().'/admin/general') ; 				
			}
			else
			{
				$data['error']  = 'Mauvais identifiant'; 
				$this->load->view('site/contents/auth',$data);
			}
		}
		else
		{						
			$this->load->view('site/contents/auth');					
		}
	}

	function logOut()
	{		
		$this->session->unset_userdata('login') ; 
		$this->session->unset_userdata('logged') ; 		
		$this->session->sess_destroy() ; 
		redirect(site_url()) ; 
	}

	function general()
	{
		$data['heading'] = 'Panneau d\'administration';
		$data['title'] = 'Général';		
		$data['content'] = 'admin_panel';			
		$this->load->view('admin/adminTemplate',$data);
	}

	
	/******************************************************************************************************************************
		      										CRUD Utilisateurs
	*******************************************************************************************************************************/

	/**********************************************************************************
	//   tous les formulaires d'ajout se trouve sur leurs page d'accueil respectives  /
	**********************************************************************************/

	function utilisateurs()
	{
		//vérification formulaire d'ajout d'un utilisateur-
		$this->form_validation->set_rules('inputUserLogin', 'Login', 'trim|required|xss_clean');		
		$this->form_validation->set_rules('inputUserMail', 'email', 'trim|required|xss_clean|valid_mail');
		$this->form_validation->set_rules('inputUserPass', 'Mot de passe', 'trim|required|xss_clean');

		if ($this->form_validation->run()) 
		{
			$this->load->model('admin_model');

			//Création d'un tableau envoyer au modèle pour insertion en BDD
			$data = array(
				'user_name'=> $this->input->post('inputUserLogin'),
				'user_mail' => $this->input->post('inputUserMail'),
				'user_password' => $this->input->post(sha1('inputUserPass'))
			);

			$this->admin_model->createUser($data);
			redirect('admin/utilisateurs');
		}
		//Si pas d'envoi, afficher la page
		else
		{
			$data['heading'] = 'Panneau d\'administration | Utilisateurs';
			$data['title'] = 'Les utilisateurs';		
			$data['content'] = 'admin_users';
			$data['row'] = $this->admin_model->readUser();
			$this->load->view('admin/adminTemplate',$data);
		}		
	}

/*UPDATE DELETE EN GENERAL -> on est renvoyé au controller updateUneSection.
	- on vérifie si l'url contient un indice
	- on fait un upate sinon on affiche la page du formulaire avec les anciennes valeurs
*/		

	function updateUtilisateur()
	{
		if($this->uri->segment(3))
		{
			//vérification formulaire d'ajout d'un utilisateur
			$this->form_validation->set_rules('inputUserLogin', 'Login', 'trim|required|xss_clean');		
			$this->form_validation->set_rules('inputUserMail', 'email', 'trim|required|xss_clean|valid_mail');
			$this->form_validation->set_rules('inputUserPass', 'Mot de passe', 'trim|required|xss_clean');

			if ($this->form_validation->run()) 
			{
				$this->load->model('admin_model');
				$data = array(
					'user_name'=> $this->input->post('inputUserLogin'),
					'user_mail' => $this->input->post('inputUserMail'),
					'user_password' => $this->input->post(sha1('inputUserPass'))
					);

				$this->admin_model->updateUser($data);
				redirect('admin/utilisateurs');
			}
			else
			{
				$data['heading'] = 'Panneau d\'administration | Utilisateurs';
				$data['title'] = 'Modifier informations utilisateurs ';
				$data['content'] = 'admin_users_update';			
				$data['rowUpdate'] = $this->admin_model->getUser($this->uri->segment(3));
				$data['userName'] = $data['rowUpdate']->user_name ;
				$data['userMail'] = $data['rowUpdate']->user_mail;						
				$this->load->view('admin/adminTemplate',$data);
			}	
		}	
	}

	function deleteUtilisateur()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			$this->admin_model->deleteUser($this->uri->segment(3));
			redirect('admin/marques');			
		}

		else
		{
			redirect('admin');			
		}
	}

/************************************************************************************************************
										CRUD Carte graphique
***************************************************************************************************************/

	function cartesgraphique()
	{
		$this->form_validation->set_rules('inputCarteLib', 'Libellé', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputCarteCoeff', 'Coefficient réel', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputCarteCoeffJeu', 'Coefficient dans le jeu', 'trim|required|xss_clean');

		if ($this->form_validation->run()) 
		{
			$this->load->model('admin_model');
			$data = array(
				'cartegraph_lib'=>$this->input->post('inputCarteLib'),
				'cartegraph_coeff' => $this->input->post('inputCarteCoeff'),
				'cartegraph_coeff_jeu' => $this->input->post('inputCarteCoeffJeu')
			);

			$this->admin_model->createCarte($data);
			redirect('admin/cartesgraphique');
		}
		else
		{
			$data['heading'] = 'Panneau d\'administration | Cartes graphique ';
			$data['title'] = ' Les Cartes graphique';		
			$data['content'] = 'admin_carteg';
			$data['row'] = $this->admin_model->readCarte();
			$this->load->view('admin/adminTemplate',$data);
		}			
	}

	function saveCoeff()
	{
		$this->form_validation->set_rules('inputCartCoeffPrix', 'Coeff. prix', 'trim|required|numeric|xss_clean');

		if ($this->form_validation->run())
		{
			$data = array('cartegraph_coeff_prix' => $this->input->post('inputCartCoeffPrix') );
			$this->admin_model->updateCarte($this->uri->segment(3), $data) ; 
			redirect('admin/cartesgraphique');
		}
		else
		{
			$data['heading'] = 'Panneau d\'administration | Cartes graphique ';
			$data['title'] = ' Les Cartes graphique';		
			$data['content'] = 'admin_carteg';
			$data['row'] = $this->admin_model->readCarte();
			$this->load->view('admin/adminTemplate',$data);
		}
	}


	function updateCarte()
	{
		if ($this->uri->segment(3)) //Vérication si l'id existe 
		{
			//vérification du formulaire
			$this->form_validation->set_rules('inputCarteLib', 'Libellé', 'trim|required|xss_clean') ; 
			$this->form_validation->set_rules('inputCarteCoeff', 'Coefficient réel', 'trim|required|xss_clean') ; 
			$this->form_validation->set_rules('inputCarteCoeffJeu', 'Coefficient dans le jeu', 'trim|required|xss_clean') ; 


			//si le formulaire est valide
			if ($this->form_validation->run()) 
			{
				$data = array(
					'cartegraph_lib' => $this->input->post('inputCarteLib') , 
					'cartegraph_coeff' => $this->input->post('inputCarteCoeff') ,
					'cartegraph_coeff_jeu' => $this->input->post('inputCarteCoeffJeu')  
				);

				//insertion en base + redirection vers la page précèdente
				$this->admin_model->updateCarte($this->uri->segment(3), $data) ; 
				redirect('admin/cartesgraphique');
			}
			//Afichage de la page d'update				 -*-
			else
			{
				$data['heading'] = 'Panneau d\'administration | Cartes graphique';
				$data['title'] = 'Modifier une carte';
				$data['content'] = 'admin_carteg_update';			
				$data['rowUpdate'] = $this->admin_model->getCarte($this->uri->segment(3));

				//création de variable qui récupère le contenu de rowUpate (plus facile à se rappeler)
				//TODO : supprimer ses variables et directement accèder à $rowUpdate dans la vue (variable en doublon....)
				$data['carteLib'] = $data['rowUpdate']->cartegraph_lib;
				$data['carteCoeff'] = $data['rowUpdate']->cartegraph_coeff;
				$data['carteCoeffJeu'] = $data['rowUpdate']->cartegraph_coeff_jeu;
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}

	function deleteCarte()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			$this->admin_model->deleteCarte($this->uri->segment(3));
			redirect('admin/cartesgraphique');			
		}
		else
		{
			redirect('admin');			
		}
	}

/*
==========================================================================================================
										CRUD MARQUES
==========================================================================================================*/
	function marques()
	{
		$this->form_validation->set_rules('inputMarqueLib', 'Libellé', 'trim|required|xss_clean');			

		if ($this->form_validation->run()) 
		{
			$this->load->model('admin_model');

			//Configuration de l'upload
			$config['upload_path'] = './img/marques';
			$config['allowed_types'] = 'gif|jpg|jpeg|png' ;
			$config['max_size'] = '1000000' ;

			//upload du fichier se fait à l'appel de la librairie
			$this->load->library('upload', $config);

			//Fichier à uploader
			$uploadedFile = 'inputMarquePath';	

			//si l'upload foire, on affiche les erreurs
			if(!$this->upload->do_upload($uploadedFile))
			{
				$data['error_upload'] = $this->upload->display_errors();
				$data['title'] = 'Les marques';	
				$data['content'] = 'admin_marques';	
				$data['row'] = $this->admin_model->readMarque();
				$this->load->view('admin/adminTemplate',$data);
			}
			//Sinon on enregistre les données du formulaire en base et redirection vers l'accueil admin
			else
			{	
				//récupération des infos du fichier uploadé
				$imageData = $this->upload->data() ; 

				//préparation des données à enregistrer
				$data = array(
					'marque_lib'=>$this->input->post('inputMarqueLib'),				
					'marque_img_path' => $imageData['file_name']
				);

				$this->admin_model->createMarque($data);
				redirect('admin/marques');
			}	
		}
		else
		{
			$data['heading'] = 'Panneau d\'administration | Marques ';
			$data['title'] = ' Les marques';		
			$data['content'] = 'admin_marques';
			$data['row'] = $this->admin_model->readMarque();
			$this->load->view('admin/adminTemplate',$data);
		}			
	}


	function updateMarque()
	{
		if ($this->uri->segment(3)) //Véricatino si l'id existe 
		{
			$this->form_validation->set_rules('inputMarqueLib', 'Libellé', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputMarquePath', 'Chemin', 'trim|xss_clean');		

			if ($this->form_validation->run()) 
			{
				$this->load->model('admin_model');

				//Configuration de l'upload
				$config['upload_path'] = './img/marques';
				$config['allowed_types'] = 'gif|jpg|jpeg|png' ;
				$config['max_size'] = '1000000' ;
				$config['overwrite'] = TRUE ; 
				
				//chargement des données de la marque 
				$data['rowUpdate'] = $this->admin_model->getMarque($this->uri->segment(3));

				//Suppression de l'ancienne photo
				$fileToDelete = './img/marques/'.$data['rowUpdate']->marque_img_path; ; 
				unlink($fileToDelete);

				//upload du fichier se fait à l'appel de la librairie
				$this->load->library('upload', $config);

				//Fichier à uploader
				$uploadedFile = 'inputMarquePath';

				//si l'upload foire, on affiche les erreurs et les infos de la page 
				if (!$this->upload->do_upload($uploadedFile))
				{
					$data['error_upload'] = $this->upload->display_errors();
					$data['title'] = 'Modifier une marque ';
					$data['content'] = 'admin_marques_update';

					//variable pour la vue					
					$data['marqueLib'] = $data['rowUpdate']->marque_lib ;										
					$this->load->view('admin/adminTemplate',$data);	
				}
				else
				{	
					//récupération des infos du fichier uploadé
					$imageData = $this->upload->data() ; 

					//préparation des données à enregistrer
					$data = array(
					'marque_lib'=>$this->input->post('inputMarqueLib'),				
					'marque_img_path' => $imageData['file_name'] 
				);
					$this->admin_model->updateMarque($this->uri->segment(3),$data);
					redirect('admin/marques');			
				}
			}

			//Afichage de la page d'update			
			else
			{
				$data['heading'] = 'Panneau d\'administration | Marques';
				$data['title'] = 'Modifier informations marques ';
				$data['content'] = 'admin_marques_update';			
				$data['rowUpdate'] = $this->admin_model->getMarque($this->uri->segment(3));
				$data['marqueLib'] = $data['rowUpdate']->marque_lib ;
				$data['marquePath'] = $data['rowUpdate']->marque_img_path;						
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}

	function deleteMarque()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			//chargement des données de la marque 
			$data['rowUpdate'] = $this->admin_model->getMarque($this->uri->segment(3));

			//Suppression de l'ancienne photo
			$fileToDelete = './img/marques/'.$data['rowUpdate']->marque_img_path; ; 
			unlink($fileToDelete);

			$this->admin_model->deleteMarque($this->uri->segment(3));
			redirect('admin/marques');			
		}
		else
		{
			redirect('admin');			
		}
	}

/******************************************************************************************************************************
												CRUD categories
*******************************************************************************************************************************/

	function categories()
	{
		$this->form_validation->set_rules('inputCatLib', 'Libellé', 'trim|required|xss_clean');		

		if ($this->form_validation->run()) 
		{
			$this->load->model('admin_model');
			$data = array(
				'categorie_lib'=>$this->input->post('inputCatLib')				
			);

			$this->admin_model->createCate($data);
			redirect('admin/categories');
		}
		else
		{
			$data['heading'] = 'Panneau d\'administration | Catégories ';
			$data['title'] = ' Les catégories';		
			$data['content'] = 'admin_cat';
			$data['row'] = $this->admin_model->readCate();
			$this->load->view('admin/adminTemplate',$data);
		}			
	}


	function deleteCategorie()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			$this->admin_model->deleteCate($this->uri->segment(3));
			redirect('admin/categories');			
		}

		else
		{
			redirect('admin');			
		}
	}

	function updateCategorie()
	{
		if ($this->uri->segment(3)) 
		{
			$this->form_validation->set_rules('inputCatLib', 'Libellé', 'trim|required|xss_clean');
			
			if ($this->form_validation->run())
			{
				$data = array(
					'categorie_lib' => $this->input->post('inputCatLib')					
				);

				$this->admin_model->updateCate($this->uri->segment(3), $data);
				redirect('admin/categories') ; 
			}
			else
			{
				$data['heading'] = 'Panneau d\'administration | Catégories';
				$data['title'] = 'Modifier une catégorie ';
				$data['content'] = 'admin_cat_update';			
				$data['rowUpdate'] = $this->admin_model->getCate($this->uri->segment(3));
				$data['catLib'] = $data['rowUpdate']->categorie_lib;				
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}


/******************************************************************************************************
										CRUD ram
*******************************************************************************************************/

	function rams()
	{
		$this->form_validation->set_rules('inputRamLib', 'Libellé', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputRamCoeff', 'Coefficient', 'trim|required|xss_clean');		
		$this->form_validation->set_rules('inputRamCoeffJeu', 'Coefficient jeu', 'trim|required|xss_clean');		

		if ($this->form_validation->run())
		{
			$this->load->model('admin_model');
			$data = array(
				'ram_lib'=>$this->input->post('inputRamLib'),
				'ram_coeff' => $this->input->post('inputRamCoeff'),
				'ram_coeff_jeu' => $this->input->post('inputRamCoeffJeu')
			);

			$this->admin_model->createRam($data);
			redirect('admin/rams');
		}
		else
		{
			$data['heading'] = 'Panneau d\'administration | Ram';
			$data['title'] = 'Les rams';
			$data['content'] = 'admin_ram';
			$data['formulaire'] = 'admin_ram_form_add';
			$data['row'] = $this->admin_model->readRam();
			$this->load->view('admin/adminTemplate',$data);
		}		
	}

	function updateRam()
	{
		if ($this->uri->segment(3)) 
		{
			$this->form_validation->set_rules('inputRamLib', 'Libellé', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputRamCoeff', 'Coefficient', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputRamCoeffJeu', 'Coefficient', 'trim|required|xss_clean');

			if ($this->form_validation->run()) 
			{
				$data = array(
					'ram_lib' => $this->input->post('inputRamLib'),
					'ram_coeff' => $this->input->post('inputRamCoeff'),
					'ram_coeff_jeu' =>$this->input->post('inputRamCoeffJeu')
				 );

				$this->admin_model->updateRam($this->uri->segment(3), $data);
				redirect('admin/rams');
			}

			//page de modification
			else
			{					
				$data['heading'] = 'Panneau d\'administration | Ram';
				$data['title'] = 'Modifier une ram';
				$data['content'] = 'admin_ram_update';			
				$data['rowUpdate'] = $this->admin_model->getRam($this->uri->segment(3));
				$data['ramLib'] = $data['rowUpdate']->ram_lib;
				$data['ramCoeff'] = $data['rowUpdate']->ram_coeff;						
				$data['ramCoeffJeu'] = $data['rowUpdate']->ram_coeff_jeu;	
				$this->load->view('admin/adminTemplate',$data);
			}
		}		
	}

	function deleteRam()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			$this->admin_model->deleteRam($this->uri->segment(3));
			redirect('admin/rams');			
		}
		else
		{
			redirect('admin');			
		}
	}

/******************************************************************************************************************************
										CRUD processeur
*******************************************************************************************************************************/
	
	function processeurs()
	{
		$this->form_validation->set_rules('inputProcLib', 'Libellé', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputProcCoeff', 'Fréquence réelle', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputProcCoeffJeu', 'Fréquence réelle', 'trim|required|xss_clean');
		
		if ($this->form_validation->run()) 
		{
			$this->load->model('admin_model');
			$data = array(
				'processeur_lib'=>$this->input->post('inputProcLib'),
				'processeur_coeff' => $this->input->post('inputProcCoeff'),
				'processeur_coeff_jeu' => $this->input->post('inputProcCoeffJeu')
			);

			$this->admin_model->createProcesseur($data);
			redirect('admin/processeurs');
		}
		else
		{
			$data['heading'] = 'Panneau d\'administration | Processeurs';
			$data['title'] = 'Les processeurs';		
			$data['content'] = 'admin_process';
			$data['row'] = $this->admin_model->readProcesseur();
			$this->load->view('admin/adminTemplate',$data);
		}		
	}
	

	function updateProcesseur()
	{
		if ($this->uri->segment(3)) 
		{
			$this->form_validation->set_rules('inputProcLib', 'Libellé', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputProcCoeff', 'Coefficient réel' , 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputProcCoeffJeu', 'Coefficient réel' , 'trim|required|xss_clean');

			if ($this->form_validation->run())
			{
				$data = array(
					'processeur_lib' => $this->input->post('inputProcLib'), 
					'processeur_coeff' => $this->input->post('inputProcCoeff'),
					'processeur_coeff_jeu' => $this->input->post('inputProcCoeffJeu')
				);

				$this->admin_model->updateProcesseur($this->uri->segment(3), $data);
				redirect('admin/processeurs') ; 
			}
			else
			{
				$data['heading'] = 'Panneau d\'administration | Processeurs';
				$data['title'] = 'Modifier un processeur ';
				$data['content'] = 'admin_process_update';			
				$data['rowUpdate'] = $this->admin_model->getProcesseur($this->uri->segment(3));
				$data['procLib'] = $data['rowUpdate']->processeur_lib;
				$data['procCoeff'] = $data['rowUpdate']->processeur_coeff;								
				$data['procCoeffJeu'] = $data['rowUpdate']->processeur_coeff_jeu;	
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}

	function deleteProcesseur()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			$this->admin_model->deleteProcesseur($this->uri->segment(3));
			redirect('admin/processeurs');			
		}
		else
		{
			redirect('admin');			
		}
	}


/******************************************************************************************************************************
											CRUD disque dur
*******************************************************************************************************************************/
	

	function rotations()
	{
		$this->form_validation->set_rules('inputRotation', 'Rotation', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputRotationCoeff', 'Coefficient', 'trim|required|xss_clean');

		if ($this->form_validation->run()) 
		{
			$this->load->model('admin_model');
			$data = array(
				'rotation_vitesse' => $this->input->post('inputRotation'),
				'rotation_coeff' => $this->input->post('inputRotationCoeff')
			);

			$this->admin_model->createRotation($data);
			redirect('admin/rotations');
		}
		else
		{
			$data['heading'] = 'Panneau d\'administration | Disques dur';
			$data['title'] = 'Les disques durs';		
			$data['content'] = 'admin_dd';
			$data['row'] = $this->admin_model->readRotation();
			$this->load->view('admin/adminTemplate',$data);
		}		
	}

		function updateRotation()
	{
		if ($this->uri->segment(3)) 
		{
			$this->form_validation->set_rules('inputRotation', 'Vitesse de rotation', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputRotationCoeff', 'Coefficient' , 'trim|required|xss_clean');

			if ($this->form_validation->run())
			{
				$data = array(
					'rotation_vitesse' => $this->input->post('inputRotation'), 
					'rotation_coeff' => $this->input->post('inputRotationCoeff')
				);

				$this->admin_model->updateRotation($this->uri->segment(3), $data);
				redirect('admin/rotations') ; 
			}
			else
			{
				$data['heading'] = 'Panneau d\'administration | Rotations';
				$data['title'] = 'Modifier une rotation ';
				$data['content'] = 'admin_dd_update';			
				$data['rowUpdate'] = $this->admin_model->getRotation($this->uri->segment(3));
				$data['rotationVitesse'] = $data['rowUpdate']->rotation_vitesse;
				$data['rotationCoeff'] = $data['rowUpdate']->rotation_coeff;						
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}


	function deleteRotation()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			$this->admin_model->deleteRotation($this->uri->segment(3));
			redirect('admin/rotations');			
		}

		else{
			redirect('admin');			
		}
	}


/******************************************************************************************************************************
												CRUD jeux
*******************************************************************************************************************************/

	function jeux()
	{
		$this->form_validation->set_rules('inputJeuLib', 'Libellé','trim|xss_clean');
		$this->form_validation->set_rules('inputJeuBas', 'ippr bas','trim|xss_clean');
		$this->form_validation->set_rules('inputJeuHaut', 'ippr haut', 'trim|xss_clean');
		$this->form_validation->set_rules('inputJeuUltra', 'ippr ultra', 'trim|xss_clean');				

		//Si le formulaire est valide, on prépare l'upload de fichier
		if ($this->form_validation->run()) 
		{
			$this->load->model('admin_model');			
			
			//Configuration de l'upload
			$config['upload_path'] = './img/games';
			$config['allowed_types'] = 'gif|jpg|jpeg|png' ;
			$config['max_size'] = '1000000' ;
			$config['encrypt_name'] = FALSE ;

			//upload du fichier se fait à l'appel de la librairie
			$this->load->library('upload', $config);

			//Fichier à uploader
			$uploadedFile = 'inputJeuPath';	

			//si l'upload foire, on affiche les erreurs
			if (!$this->upload->do_upload($uploadedFile))
			{
				$data['error_upload'] = $this->upload->display_errors();
				$data['title'] = 'Les jeux';	
				$data['content'] = 'admin_jeux';	
				$data['row'] = $this->admin_model->readJeu();
				$this->load->view('admin/adminTemplate',$data);
			}
			//Sinon on enregistre les données du formulaire en base et redirection vers l'accueil admin
			else
			{	
				//récupération des infos du fichier uploadé
				$imageData = $this->upload->data() ; 

				//préparation des données à enregistrer
				$dataForm = array(
					'jeu_lib' =>$this->input->post('inputJeuLib'),				
					'ipprBas' =>$this->input->post('inputJeuBas'),
					'ipprHaut' =>$this->input->post('inputJeuHaut'),
					'ipprUltra' =>$this->input->post('inputJeuUltra'),
					'jeu_img_path' => $imageData['file_name'] 			
				) ; 


				$this->admin_model->createJeu($dataForm) ;			
				redirect('admin/jeux');
			}
		}
		//affichage de la page par défaut de jeu
		else
		{
			$data['heading'] = 'Panneau d\'administration | Jeux';
			$data['title'] = 'Les jeux';	
			$data['content'] = 'admin_jeux';	
			$data['row'] = $this->admin_model->readJeu();
			$this->load->view('admin/adminTemplate',$data);
		}		
	}

	function updateJeu()
	{
		if ($this->uri->segment(3)) 
		{
			$this->form_validation->set_rules('inputJeuLib', 'Libellé','trim|required|xss_clean');
			$this->form_validation->set_rules('inputJeuBas', 'ippr bas','trim|required|xss_clean');
			$this->form_validation->set_rules('inputJeuHaut', 'ippr haut', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputJeuUltra', 'ippr ultra', 'trim|required|xss_clean');					

			if ($this->form_validation->run()) 
			{
				$this->load->model('admin_model');

				//chargement des données du jeu 
				$data['rowUpdate'] = $this->admin_model->getJeu($this->uri->segment(3));

				//Configuration de l'upload
				$config['upload_path'] = './img/games';
				$config['allowed_types'] = 'gif|jpg|jpeg|png' ;
				$config['max_size'] = '1000000' ;
				$config['overwrite'] = TRUE ; 

				//Suppression de l'ancienne photo
				$fileToDelete = './img/games/'.$data['rowUpdate']->jeu_img_path; ; 
				unlink($fileToDelete);

				//upload du fichier se fait à l'appel de la librairie
				$this->load->library('upload', $config);

				//Fichier à uploader
				$uploadedFile = 'inputJeuPath';	

				//si l'upload foire, on affiche les erreurs et les infos de la page 
				if (!$this->upload->do_upload($uploadedFile))
				{
					$data['error_upload'] = $this->upload->display_errors();
					$data['title'] = 'Modifier un jeu ';
					$data['content'] = 'admin_jeux_update';

					//variable pour la vue
					$data['jeuLib'] = $data['rowUpdate']->jeu_lib;
					$data['ipprBas'] = $data['rowUpdate']->ipprBas;
					$data['ipprHaut'] = $data['rowUpdate']->ipprHaut ;
					$data['ipprUltra'] = $data['rowUpdate']->ipprUltra;													
					$this->load->view('admin/adminTemplate',$data);		
				}
				else
				{	
					//récupération des infos du fichier uploadé
					$imageData = $this->upload->data() ; 

					//préparation des données à enregistrer
					$data = array(					
						'jeu_lib' =>$this->input->post('inputJeuLib'),				
						'ipprBas' =>$this->input->post('inputJeuBas'),
						'ipprHaut' =>$this->input->post('inputJeuHaut'),
						'ipprUltra' =>$this->input->post('inputJeuUltra'),					
						'jeu_img_path' => $imageData['file_name'] 			
					) ; 					

					$this->admin_model->updateJeu($this->uri->segment(3), $data) ; 
					redirect('admin/jeux') ; 					
				}
			}		
			else
			{
				$data['heading'] = 'Panneau d\'administration | Jeux';
				$data['title'] = 'Modifier un jeu ';
				$data['content'] = 'admin_jeux_update';

				//variable pour la vue				
				$data['rowUpdate'] = $this->admin_model->getJeu($this->uri->segment(3));
				$data['jeuLib'] = $data['rowUpdate']->jeu_lib;
				$data['ipprBas'] = $data['rowUpdate']->ipprBas;
				$data['ipprHaut'] = $data['rowUpdate']->ipprHaut ;
				$data['ipprUltra'] = $data['rowUpdate']->ipprUltra;			
				$data['jeuPath'] = $data['rowUpdate']->jeu_img_path;	
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}

	function deleteJeu()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			//chargement des données du jeu 
			$data['rowUpdate'] = $this->admin_model->getJeu($this->uri->segment(3));

			//Suppression de l'image
			$fileToDelete = './img/games/'.$data['rowUpdate']->jeu_img_path; ; 
			unlink($fileToDelete);

			$this->admin_model->deleteJeu($this->uri->segment(3));
			redirect('admin/jeux');			
		}
		else
		{
			redirect('admin');			
		}
	}

/******************************************************************************************************************************
													CRUD PC
*******************************************************************************************************************************/
	function pc()
	{
		$this->form_validation->set_rules('inputPCLib', 'Libellé','trim|required|xss_clean');
		$this->form_validation->set_rules('inputPCDescript', 'desription','trim|required|xss_clean');
		$this->form_validation->set_rules('inputPCMarque', 'Marque', 'trim|required|xss_clean');		
		$this->form_validation->set_rules('inputPCScore', 'Score', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputPCIpj', 'IPJ', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputPCGamer', 'Gamer', 'trim|required|xss_clean');
		$this->form_validation->set_rules('InputPCCat', 'Categorie', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputPCTaille', 'Taille', 'trim|xss_clean');	
		/*$this->form_validation->set_rules('inputPcLien1', 'Lien 1', 'trim|xss_clean');				
		$this->form_validation->set_rules('inputPcLien2', 'Lien 2', 'trim|xss_clean');
		$this->form_validation->set_rules('inputPcLien3', 'Lien 3', 'trim|xss_clean');
		$this->form_validation->set_rules('inputPcLien4', 'Lien 4', 'trim|xss_clean');
		$this->form_validation->set_rules('inputPcLien5', 'Lien 5', 'trim|xss_clean');*/

		$this->load->model('admin_model');		

		if ($this->form_validation->run()) 
		{	
			//Configuration de l'upload
			$config['upload_path'] = './img/pc';
			$config['allowed_types'] = 'gif|jpg|jpeg|png' ;
			$config['max_size'] = '1000000' ;			

			//upload du fichier se fait à l'appel de la librairie
			$this->load->library('upload', $config);

			//Fichier à uploader
			$uploadedFile = 'inputPCPath';	

			//si l'upload foire, on affiche les erreurs
			if (!$this->upload->do_upload($uploadedFile))
			{
				$data['error_upload'] = $this->upload->display_errors();
				$data['title'] = 'Les pc';	
				$data['content'] = 'admin_pc';	
				$data['row'] = $this->admin_model->getAllPc();
				$data['rowCateg'] = $this->admin_model->readCate();
				$data['rowMarque'] = $this->admin_model->readMarque();
				$data['rowTaille'] = $this->admin_model->readTaille() ; 
				$this->load->view('admin/adminTemplate',$data);			
			}
			//Sinon on enregistre les données du formulaire en base et redirection vers l'accueil admin
			else
			{	
				//récupération des infos du fichier uploadé
				$imageData = $this->upload->data() ; 

				$data = array(
					'pc_lib' =>$this->input->post('inputPCLib'),				
					'pc_descript' =>$this->input->post('inputPCDescript'),
					'pc_marque_id' =>$this->input->post('inputPCMarque'),	
					'pc_img_path' => $imageData['file_name'], 
					'pc_ipj' =>$this->input->post('inputPCIpj'),
					'pc_score' =>$this->input->post('inputPCScore'),
					'pc_categorie' =>$this->input->post('InputPCCat'),
					'pc_gamer' =>$this->input->post('inputPCGamer'),				
					'pc_taille_ecran' =>$this->input->post('inputPCTaille')				
	/*				'pc_lien1' =>$this->input->post('inputPcLien1'),
					'pc_lien2' =>$this->input->post('inputPcLien2'),
					'pc_lien3' =>$this->input->post('inputPcLien3'),
					'pc_lien4' =>$this->input->post('inputPcLien4'),
					'pc_lien5' =>$this->input->post('inputPcLien5')*/
				) ; 

				$this->admin_model->createPc($data) ; 
				redirect('admin/pc') ; 
			}			
		}
		else
		{						
			$data['heading'] = 'Panneau d\'administration | PC';
			$data['title'] = 'Les pc';	
			$data['content'] = 'admin_pc';	
			$data['row'] = $this->admin_model->readPc();
			$data['lien1'] = $data['row']; 
			$data['row2'] = $this->admin_model->readPc();
			$data['rowCateg'] = $this->admin_model->readCate();
			$data['rowMarque'] = $this->admin_model->readMarque();
			$data['rowTaille'] = $this->admin_model->readTaille();
			$data['rowRam'] = $this->admin_model->readRam();
			$data['rowCarte'] = $this->admin_model->readCarte(); 
			$this->load->view('admin/adminTemplate',$data);
		}		
	}

	function updatePc()
	{
		if ($this->uri->segment(3)) 
		{
			$this->form_validation->set_rules('inputPCLib', 'Libellé','trim|required|xss_clean');
			$this->form_validation->set_rules('inputPCDescript', 'desription','trim|required|xss_clean');
			$this->form_validation->set_rules('inputPCMarque', 'Marque', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputPCScore', 'Score', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputPCIpj', 'IPJ', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputPCGamer', 'Gamer', 'trim|required|xss_clean');
			$this->form_validation->set_rules('InputPCCat', 'Categorie', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputPCTaille', 'Taille', 'trim|xss_clean');
/*			$this->form_validation->set_rules('inputPcLien1', 'Lien Fnac', 'trim|required|xss_clean');				
			$this->form_validation->set_rules('inputPcLien3', 'Lien Amazon', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputPcLien2', 'Lien Matériel', 'trim|required|xss_clean');	*/		

			if ($this->form_validation->run()) 
			{
				$this->load->model('admin_model');		

				//Tojo: Enregistre comme meme les données au cas ou on ne veut pas modifier l'image
				//car le formulaire passe deja la validation a part l'upload d'image
				//préparation des données à enregistrer
				$data = array(
					'pc_lib' =>$this->input->post('inputPCLib'),				
					'pc_descript' =>$this->input->post('inputPCDescript'),
					'pc_marque_id' =>$this->input->post('inputPCMarque'),	
					//'pc_img_path' => $imageData['file_name'], //N'enregistre pas info image
					'pc_ipj' =>$this->input->post('inputPCIpj'),
					'pc_score' =>$this->input->post('inputPCScore'),
					'pc_categorie' =>$this->input->post('InputPCCat'),
					'pc_gamer' =>$this->input->post('inputPCGamer'),				
					'pc_taille_ecran' =>$this->input->post('inputPCTaille')
				) ; 

				$this->admin_model->updatePc($this->uri->segment(3), $data) ; 						

				//Configuration de l'upload
				$config['upload_path'] = './img/pc';
				$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG' ;
				$config['max_size'] = '5120' ;
				$config['overwrite'] = TRUE ; 

				//chargement des données du jeu 
				$data['rowUpdate'] = $this->admin_model->getPc($this->uri->segment(3));

				//Suppression de l'ancienne photo
				$fileToDelete = './img/pc/'.$data['rowUpdate']->pc_img_path;				

				//upload du fichier se fait à l'appel de la librairie
				$this->load->library('upload', $config);

				//Fichier à uploader
				$uploadedFile = 'inputPCPath';	

				//si l'upload foire, on affiche les erreurs et les infos de la page 
				if (!$this->upload->do_upload($uploadedFile))
				{
					$data['error_upload'] = $this->upload->display_errors();
					
					//variable pour la vue
					$data['heading'] = 'Panneau d\'administration | PC';					
					$data['content'] = 'admin_pc_update';			
					$data['rowUpdate'] = $this->admin_model->getPc($this->uri->segment(3));
					$data['pcLib'] = $data['rowUpdate']->pc_lib;
					$data['title'] = 'Modifier '.$data['pcLib'];
					$data['pcDescript'] = $data['rowUpdate']->pc_descript;
					$data['pcScore'] = $data['rowUpdate']->pc_score;
					$data['pcIPJ'] = $data['rowUpdate']->pc_ipj;						
/*					$data['pcLienF'] = $data['rowUpdate']->pc_lienFnac;
					$data['pcLienA'] = $data['rowUpdate']->pc_lienAmazon;
					$data['pcLienM'] = $data['rowUpdate']->pc_lienMateriel;*/
					$data['pcPath'] = $data['rowUpdate']->pc_img_path;
					$data['rowCateg'] = $this->admin_model->readCate();
					$data['rowMarque'] = $this->admin_model->readMarque();
					$data['rowTaille'] = $this->admin_model->readTaille() ; 
					$this->load->view('admin/adminTemplate',$data);
				}
				else
				{	

					@unlink($fileToDelete);

					//récupération des infos du fichier uploadé
					$imageData = $this->upload->data() ; 

					//préparation des données à enregistrer
					$data = array(
	/*					'pc_lib' =>$this->input->post('inputPCLib'),				
						'pc_descript' =>$this->input->post('inputPCDescript'),
						'pc_marque_id' =>$this->input->post('inputPCMarque'),*/	
						'pc_img_path' => $imageData['file_name'] 
				/*		'pc_ipj' =>$this->input->post('inputPCIpj'),
						'pc_score' =>$this->input->post('inputPCScore'),
						'pc_categorie' =>$this->input->post('InputPCCat'),
						'pc_gamer' =>$this->input->post('inputPCGamer'),				
						'pc_taille_ecran' =>$this->input->post('inputPCTaille')		*/		
						/*'pc_lienFnac' =>$this->input->post('inputPcLien1'),
						'pc_lienAmazon' =>$this->input->post('inputPcLien3'),
						'pc_lienMateriel' =>$this->input->post('inputPcLien2')*/
					) ; 				
					$this->admin_model->updatePc($this->uri->segment(3), $data) ; 
					
					//Tojo: Affiche le resultat de l'uplaod
					redirect('admin/updatePc/'.$this->uri->segment(3));					
				}
			}
			//page de modification
			else
			{					
				$data['rowUpdate'] = $this->admin_model->getPc($this->uri->segment(3));
				$data['pcLib'] = $data['rowUpdate']->pc_lib;

				$data['heading'] = 'Panneau d\'administration | PC';				
				$data['content'] = 'admin_pc_update';											
				$data['title'] = 'Modifier '.$data['pcLib'];
				
				$data['pcDescript'] = $data['rowUpdate']->pc_descript;
				$data['pcScore'] = $data['rowUpdate']->pc_score;
				$data['pcIPJ'] = $data['rowUpdate']->pc_ipj;						
			/*	$data['pcLienF'] = $data['rowUpdate']->pc_lienFnac;
				$data['pcLienA'] = $data['rowUpdate']->pc_lienAmazon;
				$data['pcLienM'] = $data['rowUpdate']->pc_lienMateriel;*/
				$data['pcPath'] = $data['rowUpdate']->pc_img_path;
				$data['rowCateg'] = $this->admin_model->readCate();
				$data['rowMarque'] = $this->admin_model->readMarque();
				$data['rowTaille'] = $this->admin_model->readTaille() ; 
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}
		

	function deletePc()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			//chargement des données du jeu 
			$data['rowUpdate'] = $this->admin_model->getPc($this->uri->segment(3));

			//Suppression de l'ancienne photo
			$fileToDelete = './img/pc/'.$data['rowUpdate']->pc_img_path; ; 
			unlink($fileToDelete);

			$this->admin_model->deletePc($this->uri->segment(3));
			redirect('admin/pc');			
		}
		else
		{
			redirect('admin');			
		}
	}

/*******************************************************************************************************************************
												Crud taille ecran
**********************************************************************************************************************************/
function tailles()
	{
		$this->form_validation->set_rules('inputTailleLib', 'Rotation', 'trim|required|xss_clean');		

		if ($this->form_validation->run()) 
		{
			$this->load->model('admin_model');
			$data = array(
				'taille_lib' => $this->input->post('inputTailleLib')				
			);

			$this->admin_model->createTaille($data);
			redirect('admin/tailles');
		}
		else
		{
			$data['heading'] = 'Panneau d\'administration |Les tailles écran';
			$data['title'] = 'Les écrans';		
			$data['content'] = 'admin_taille';
			$data['row'] = $this->admin_model->readTaille();
			$this->load->view('admin/adminTemplate',$data);
		}		
	}

		function updateTaille()
	{
		if ($this->uri->segment(3)) 
		{
			$this->form_validation->set_rules('inputTailleLib', 'Vitesse de rotation', 'trim|required|xss_clean');			

			if ($this->form_validation->run())
			{
				$data = array(
					'taille_lib' => $this->input->post('inputTailleLib')					
				);

				$this->admin_model->updateTaille($this->uri->segment(3), $data);
				redirect('admin/tailles') ; 
			}
			else
			{
				$data['heading'] = 'Panneau d\'administration | Les écrans';
				$data['title'] = 'Modifier une taille ';
				$data['content'] = 'admin_taille_update';			
				$data['rowUpdate'] = $this->admin_model->getTaille($this->uri->segment(3));
				$data['tailleLib'] = $data['rowUpdate']->taille_lib;									
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}


	function deleteTaille()
	{
		//récupération de l'id dans ladresse
		if($this->uri->segment(3))
		{
			$this->admin_model->deleteTaille($this->uri->segment(3));
			redirect('admin/tailles');			
		}

		else{
			redirect('admin');			
		}
	}

	/******************************************************************************************************************************
												CRUD coefficient
*******************************************************************************************************************************/

	function coefficient()
	{

			$data['heading'] = 'Panneau d\'administration | Coefficients';
			$data['title'] = 'Les coefficients' ; 
			$data['content'] = 'admin_coeff' ; 
			$data['row'] = $this->admin_model->readCoeff();
			$this->load->view('admin/adminTemplate', $data) ;	
	}
	
	function updateCoeff()
	{
		if ($this->uri->segment(3)) 
		{
			$this->form_validation->set_rules('inputCoeffVal', 'Coefficent', 'trim|required|xss_clean|numeric');		
			

			if ($this->form_validation->run()) 
			{				
				$data = array(
					'coeff_val'=>$this->input->post('inputCoeffVal')							
				);

				$this->admin_model->updateCoeff($this->uri->segment(3), $data);
				redirect('admin/coefficient');
			}
			else
			{
				$data['heading'] = 'Panneau d\'administration | Coeff';
				
				$data['content'] = 'admin_coeff_update';			
				$data['rowUpdate'] = $this->admin_model->getCoeff($this->uri->segment(3));
				$data['coeffVal'] = $data['rowUpdate']->coeff_val ;				
				$data['coeffLib'] = $data['rowUpdate']->coeff_nom ;	
				$data['title'] = 'Modifier '.$data['coeffLib'];
				$this->load->view('admin/adminTemplate',$data);
			}
		}
	}




}

?>