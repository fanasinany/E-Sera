<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->model("UtilisateurModel","ModelU");	
	}

	public function index()
	{
		testsess('Profil','inscription_page');
	}
	
	public function inscrire()
	{
		$nom = $this->input->post("nom");
		$prenom = $this->input->post("prenom");
		$pseudo = $this->input->post("pseudo");
		$password = $this->input->post("password");
		$Cpassword = $this->input->post("Cpassword");

		if($nom != "" && $prenom != "" && $pseudo != "" && $password != "" && $Cpassword != ""){
			//Verifie pseudo si non utilisé
			$nbr_pseudo = $this->ModelU->verifierPseudo($pseudo);

			if($nbr_pseudo == 0){
				//Verifie si les passwords sont identiques
				if($password == $Cpassword){
					$pwdwithhash = password_hash($password,PASSWORD_BCRYPT);
					$this->ModelU->ajouterUtilisateur($nom,$prenom,$pseudo,$pwdwithhash);
				}
				else{
					show_error("Mot de passe different",500);
				}
			}
			else{
				show_error("Pseudo deja utilisé",503);
			}

		}
		else{
			show_error("Champs requis",404);
		}
	}
}
