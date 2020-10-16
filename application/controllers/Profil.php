<?php

class Profil extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UtilisateurModel","ModelU");
    }

    public function index()
    {   
        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] && isset($_SESSION["id_util"])){
            $datas = $this->ModelU->getUtilisateurById($_SESSION["id_util"]);
            $data = array_merge(array('content'=>'profil_page'),$datas[0]);
            $this->load->view('view_template',$data);
        }
        else{
            $data = array('content'=>'connexion_page');
            $this->load->view('view_template',$data);
        }
    }

    public function edit(){
        $data = array(
            'nom_util' => $this->input->post("nom"),
            'prenom_util' => $this->input->post("prenom"),
            'genre_util' => $this->input->post("genre"),
            'age_util' => $this->input->post("age"),
            'emploi_util' => $this->input->post("emploi"),
            'situation_util' => $this->input->post("situation")
        );
        if($data['nom_util'] != "" && $data['prenom_util'] != ""){
            $id = $this->input->post("id");
            $this->ModelU->editUtilisateur($data, $id);
        }
        else{
            show_error('Ne peut pas etre vide',404);
        }
    }

}