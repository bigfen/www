<?php 
	class _MarquesPc extends CI_Controller{
		function __construct(){
			parent::__construct();		
		}
	
		function index(){
			$data['title'] = 'Choix par marque';		
			$data['content'] = 'marque_select';
			$data['rowMarque'] = $this->admin_model->readMarque();
			$data['rowCat'] = $this->admin_model->readCate() ; 
			$data['rowTaille'] = $this->admin_model->readTaille() ; 
			$this->load->view('site/siteTemplate',$data);
		}

		function marqueResult()
		{
			$this->form_validation->set_rules('inputPCMarque', 'Marque', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputCat', 'Catégorie', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputTaille', 'Taille', 'trim|required|xss_clean');

			if ($this->form_validation->run())
			{
				$marqueId = $this->input->post('inputPCMarque') ;
				$catId = $this->input->post('inputCat') ;
				$tailleId = $this->input->post('inputTaille') ; 

				$data['marque'] = $this->input->post('inputPCMarque') ; 
				$data['cat'] = $this->input->post('inputCat') ;
				$data['taille'] = $this->input->post('inputTaille') ; 

				$data['rowPc'] = $this->admin_model->getPcByParam($marqueId, $catId, $tailleId) ; 
				$compteurRes = 0 ; 

				if (empty($data['rowPc'])) {
					$data['nbrPc'] = 'Aucun résultat' ; 
				}
				else
				{					
					foreach ($data['rowPc'] as $unPc)
					{
						$compteurRes++ ;
					}
					$data['nbrPc'] = $compteurRes.' résultat(s)' ; 
				}

				//ceil retourne l'arrondi supérieur. On divise par 3 pour le nombre de vignette par ligne
				$data['nbrRows'] = ceil($compteurRes/3) ; 

				$data['title'] = 'Resultat par marque';		
				$data['content'] = 'marque_select';
				$data['rowMarque'] = $this->admin_model->readMarque();
				$data['rowCat'] = $this->admin_model->readCate() ; 
				$data['rowTaille'] = $this->admin_model->readTaille() ; 
				$this->load->view('site/siteTemplate',$data);
			}
			else
			{
				redirect(site_url()) ; 
			}			
		}
	}
	
?>