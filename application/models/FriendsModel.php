<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FriendsModel extends CI_Model {

	private $table = "friends";
	
	public function getAllUtilisateurFriends($id){
		$sql = "SELECT id_util,nom_util,age_util,prenom_util,emploi_util,situation_util,genre_util,status_util 
			FROM utilisateur
			INNER JOIN $this->table WHERE friends.id_utilr = utilisateur.id_util
			AND id_utilf = '$id' AND status_friends = 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}
