<?php

class Admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();		
	}


/******************************************
		      CRUD Marques
*******************************************/

	function createMarque($data)
	{
		$this->db->insert('marques',$data);
	}

	function readMarque()
	{
		$this->db->order_by('marque_lib', 'asc');
		$req = $this->db->get('marques');		
		if ($req->num_rows>0) {

			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function updateMarque($id, $data)
	{
		$this->db->where('marque_id', (int)$id);
		$this->db->update('marques', $data);
	}

	function getMarque($id)
	{		
		$this->db->where('marque_id', (int)$id);
		$marque = $this->db->get('marques');
		if($marque->num_rows>0)
		{
			$row = $marque->row();
			return $row;
		}
	}

	function deleteMarque($id)
	{
		$this->db->where('marque_id', (int)$id);
		$this->db->delete('marques');
	}

/*****************************************
		CRUD Carte graphique
*******************************************/

	function createCarte($data)
	{
		$this->db->insert('cartesgraphique',$data);
	}

	function updateCarte($id, $data)
	{
		$this->db->where('cartegraph_id', (int)$id);
		$this->db->update('cartesgraphique', $data);
	}

	function deleteCarte($id){
		$this->db->where('cartegraph_id', (int)$id);		
		$this->db->delete('cartesgraphique');
	}

	function readCarte(){		
		$this->db->order_by('cartegraph_lib', 'asc'); 
		$req = $this->db->get('cartesgraphique');
		if ($req->num_rows>0) 
		{
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function getCarte($id)
	{
		$this->db->where('cartegraph_id', (int)$id);
		$carte = $this->db->get('cartesgraphique');
		if($carte->num_rows>0)
		{
			$row = $carte->row();
			return $row;
		}
	}


/******************************************
			CRUD ram
*******************************************/
	function createRam($data)
	{
		$this->db->insert('rams',$data);
	}

	function updateRam($id, $data)
	{
		$this->db->where('ram_id', (int)$id);
		$this->db->update('rams', $data);
	}

	function deleteRam($id)
	{
		$this->db->where('ram_id', (int)$id);
		$this->db->delete('rams');
	}

	function readRam()
	{
		$this->db->order_by('ram_lib', 'asc');
		$req = $this->db->get('rams');
		if ($req->num_rows>0)
		{
			foreach ($req->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function getRam($id)
	{
		$this->db->where('ram_id', (int)$id);
		$ram = $this->db->get('rams');
		if($ram->num_rows>0)
		{
			$row = $ram->row();
			return $row;
		}
	}



/******************************************
			CRUD rotations du disque dur
*******************************************/
	function createRotation($data)
	{
		$this->db->insert('rotations',$data);
	}

	function updateRotation($id, $data)
	{
		$this->db->where('rotation_id', (int)$id);
		$this->db->update('rotations', $data);
	}

	function deleteRotation($id)
	{
		$this->db->where('rotation_id', (int)$id);
		$this->db->delete('rotations');
	}

	function readRotation()
	{
		$this->db->order_by('rotation_vitesse', 'asc');
		$req = $this->db->get('rotations');
		if ($req->num_rows>0) 
		{
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function getRotation($id)
	{
		$this->db->where('rotation_id', (int)$id);
		$disc = $this->db->get('rotations');
		if($disc->num_rows>0)
		{
			$row = $disc->row();
			return $row;
		}	
	}




/******************************************
			CRUD processeur
*******************************************/
	function createProcesseur($data)
	{
		$this->db->insert('processeurs',$data);
	}	

	function updateProcesseur($id, $data)
	{
		$this->db->where('processeur_id', (int)$id);
		$this->db->update('processeurs', $data);
	}

	function deleteProcesseur($id)
	{
		$this->db->where('processeur_id', (int)$id);
		$this->db->delete('processeurs');
	}

	function readProcesseur(){
		$this->db->order_by('processeur_lib', 'asc');
		$req = $this->db->get('processeurs');
		if ($req->num_rows>0) {
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function getProcesseur($id)
	{
		$this->db->where('processeur_id', (int)$id);
		$process = $this->db->get('processeurs');
		if($process->num_rows>0)
		{
			$row = $process->row();
			return $row;
		}
	}


/********************************************************************************************************************
											CRUD jeux
*********************************************************************************************************************/
	function createJeu($data)
	{
		$this->db->insert('jeux',$data);
	}	

	function updateJeu($id, $data)
	{
		$this->db->where('jeu_id', $id);
		$this->db->update('jeux', $data);
	}

	function deleteJeu($id)
	{
		$this->db->where('jeu_id', (int)$id);
		$this->db->delete('jeux');
	}

	function readJeu()
	{
		$this->db->order_by('jeu_lib', 'asc');
		$req = $this->db->get('jeux');
		if ($req->num_rows>0) 
		{
			foreach ($req->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function getJeu($id)
	{
		$this->db->where('jeu_id', (int)$id);
		$jeu = $this->db->get('jeux');
		if($jeu->num_rows>0)
		{
			$row = $jeu->row();
			return $row;
		}
	}

/******************************************
		      CRUD utilisateur
*******************************************/

	function createUser($data)
	{
		$this->db->insert('users',$data);
	}

	function readUser()
	{
		$this->db->order_by('user_name', 'asc');
		$req = $this->db->get('users');
		if ($req->num_rows>0) 
		{
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function updateUser($id, $data)
	{
		$this->db->where('user_id', (int)$id);
		$this->db->update('users', $data);
	}

	function getUser($id)
	{
		$this->db->where('user_id', (int)$id);
		$marque = $this->db->get('users');
		if($marque->num_rows>0)
		{
			$row = $marque->row();
			return $row;
		}
	}

	function deleteUser($id)
	{
		$this->db->where('user_id', (int)$id);
		$this->db->delete('users');
	}


/******************************************
		      CRUD pc
*******************************************/

	function createPc($data)
	{
		$this->db->insert('pc',$data);
	}

	function readPc()
	{
		$this->db->order_by('pc_lib', 'asc');
		$req = $this->db->get('pc');
		if ($req->num_rows>0) 
		{
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function updatePc($id, $data)
	{
		$this->db->where('pc_id', (int)$id);
		$this->db->update('pc', $data);
	}

	function getPc($id)
	{
		$this->db->where('pc_id', (int)$id);
		$pc = $this->db->get('pc');
		if($pc->num_rows>0)
		{
			$row = $pc->row();
			return $row;
		}
	}

	//fais une jointure entre pc et catégories/marques/tailles
	function getAllPc()
	{
		/*$this->db->order_by('pc_lib', 'asc');	
		$this->db->select('*')
		->from('pc')
		->join('categories', 'categories.categorie_id = pc.pc_categorie')
		->join('marques', 'marques.marque_id = pc.pc_marque_id')
		->join('tailles', 'tailles.taille_id = pc.pc_taille_ecran') ;	*/

		//$pcInfo = $this->db->query('SELECT * FROM pc join categories on pc.pc_categorie = categories.categorie_id join marques on marques.marque_id = pc.pc_marque_id join tailles on tailles.taille_id = pc.pc_taille_ecran order by pc_lib ASC') ; 
		$pcInfo = $this->db->get('pc');
					
		//$pcInfo = $this->db->get();

		if ($pcInfo->num_rows()>0)
		{
			foreach ($pcInfo->result() as $row)
			{
				$data[] = $row ;
			}
			return $data ;
		}
	}

	function getPcByMarque($marqueID)
	{
		$this->db->order_by('pc_lib', 'asc');
		$this->db->where('pc_marque_id', (int)$marqueID) ; 
		$pc = $this->db->get('pc');
		if ($pc->num_rows()>0)
		{
			foreach ($pc->result() as $row)
			{
				$data[] = $row;
			}
			return $data ;
		}
	}



	function deletePc($id)
	{
		$this->db->where('pc_id', (int)$id);
		$this->db->delete('pc');
	}


/******************************************
		      CRUD tailles
*******************************************/

	function createTaille($data)
	{
		$this->db->insert('tailles',$data);
	}

	function readTaille()
	{
		$this->db->order_by('taille_lib', 'asc');
		$req = $this->db->get('tailles');
		if ($req->num_rows>0) {
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function updateTaille($id, $data)
	{
		$this->db->where('taille_id', (int)$id);
		$this->db->update('tailles', $data);
	}

	function getTaille($id)
	{
		$this->db->where('taille_id', (int)$id);
		$taille = $this->db->get('tailles');
		if($taille->num_rows>0)
		{
			$row = $taille->row();
			return $row;
		}
	}

	function deleteTaile($id)
	{
		$this->db->where('taille_id', (int)$id);
		$this->db->delete('tailles');
	}

	/******************************************
		      CRUD FAQ
*******************************************/

	function createFaq($data)
	{
		$this->db->insert('faq',$data);
	}

	function readFaq()
	{
		$req = $this->db->get('faq');
		if ($req->num_rows>0) {
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function updateFaq($id, $data)
	{
		$this->db->where('faq_id', (int)$id);
		$this->db->update('faq', $data);
	}

	function getFaq($id)
	{
		$this->db->where('faq_id', (int)$id);
		$marque = $this->db->get('faq');
		if($marque->num_rows>0)
		{
			$row = $marque->row();
			return $row;
		}
	}

	function deleteFaq($id)
	{
		$this->db->where('faq_id', (int)$id);
		$this->db->delete('faq');
	}


/******************************************
		      CRUD categories
*******************************************/

	function createCate($data)
	{
		$this->db->insert('categories',$data);
	}

	function readCate()
	{
		$req = $this->db->get('categories');
		if ($req->num_rows>0) {
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function updateCate($id, $data)
	{
		$this->db->where('categorie_id', (int)$id);
		$this->db->update('categories', $data);
	}

	function getCate($id)
	{
		$this->db->where('categorie_id', (int)$id);
		$categorie = $this->db->get('categories');
		if($categorie->num_rows>0)
		{
			$row = $categorie->row();
			return $row;
		}
	}

	function deleteCate($id)
	{
		$this->db->where('categorie_id', (int)$id);
		$this->db->delete('categories');
	}

	/*****************************************
		CRUD coefficient
*******************************************/

	function createCoeff($data)
	{
		$this->db->insert('coefficients',$data);
	}

	function updateCoeff($id, $data)
	{
		$this->db->where('coeff_id', (int)$id);
		$this->db->update('coefficients', $data);
	}

	function deleteCoeff($id){
		$this->db->where('coeff_id', (int)$id);		
		$this->db->delete('coefficients');
	}

	function readCoeff(){		
		$this->db->order_by('coeff_id', 'asc'); 
		$req = $this->db->get('coefficients');
		if ($req->num_rows>0) 
		{
			foreach ($req->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}		
	}

	function getCoeff($id)
	{
		$this->db->where('coeff_id', (int)$id);
		$carte = $this->db->get('coefficients');
		if($carte->num_rows>0)
		{
			$row = $carte->row();
			return $row;
		}
	}

	/*******************************************************************************************************************************
												SPECIAL ADMIN
	*******************************************************************************************************************************/
//vérifie si le couple login/pass existe bien en base
function verif_id($login, $pass)
{
	$this->db->where('nimda_login',$login) ; 
	$this->db->where('nimda_passwd',sha1($pass)) ; 
	$query = $this->db->get('nimda');
	if ($query->num_rows()>0)
	{
		return true ; 
	}

}

/********************************************************************************************************************************
									Requetes avec jointures
********************************************************************************************************************************/

	function getPcByParam($marqueId, $catId, $tailleId)
	{
		$this->db->select('*')
		->from('pc')	
		->join('marques', 'marques.marque_id = pc.pc_marque_id')
		->join('categories', 'categories.categorie_id = pc.pc_categorie')
		->join('tailles', 'tailles.taille_id = pc.pc_taille_ecran') ;
		$this->db->where('categorie_id', (int)$catId); 
		$this->db->where('marque_id', (int)$marqueId);
		$this->db->where('taille_id', (int)$tailleId);
		
		$this->db->order_by('pc_id', 'asc'); 		
		$pcInfo = $this->db->get();

		if ($pcInfo->num_rows()>0)
		{
			foreach ($pcInfo->result() as $row)
			{
				$data[] = $row;
			}
			return $data ;
		}		
	}

}

?>