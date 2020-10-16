<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurModel extends CI_Model {

	private $table = "utilisateur";
	
	public function ajouterUtilisateur($nom,$prenom,$pseudo,$password){

		$data = array(
			'nom_util' => $nom,
			'prenom_util' => $prenom,
			'pseudo' => $pseudo,
			'password' => $password
		);

		$this->db->insert($this->table, $data);
	}

	public function verifierPseudo($pseudo){
		$sql = "SELECT * FROM $this->table WHERE pseudo = '$pseudo' ";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function verifierLogin($pseudo,$password){
		$sql = "SELECT * FROM $this->table WHERE pseudo = '$pseudo' ";
		$query = $this->db->query($sql);
		if($query->num_rows() == 1){
			foreach($query->result() as $row){
				$pswhash = $row->password;
				$id_util = $row->id_util;
			}
			if( password_verify($password, $pswhash) ){
				$this->changeStatus($id_util);
				return $query->result();
			}
			else return false;
		}else return false;
	}

	public function getUtilisateurById($id){
		$sql = "SELECT * FROM $this->table WHERE id_util = '$id' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function editUtilisateur(array $data, int $id){
		$this->db->where('id_util', $id);
		$this->db->update($this->table, $data);
	}

	public function changeStatus($id){
		$data = $this->getUtilisateurById($id)[0];
		if($data['status_util'] == 0){
			$this->db->where('id_util', $id);
			$this->db->update($this->table, array('status_util' => 1));
		}
		else{
			$this->db->where('id_util', $id);
			$this->db->update($this->table, array('status_util' => 0));		
		}
	}
}
