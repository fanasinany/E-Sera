<?php

class Connexion extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UtilisateurModel","ModelU");
    }

    public function index()
    {
        testsess('Profil','connexion_page');
    }

    public function login()
    {
        $pseudo = $this->input->post("pseudo");
        $password = $this->input->post("password");
        if($pseudo != "" && $password != ""){
            $datas = $this->ModelU->verifierLogin($pseudo,$password);
            if($datas && !empty($datas)){
                foreach($datas as $data){
                    $id = $data->id_util;
                }
                $data_session = array(
                    'id_util'  => $id,
                    'pseudo'     => $pseudo,
                    'logged_in' => TRUE
                );
            
                $this->session->set_userdata($data_session);
            }
            else{
                show_error("Identifiants incorrects", 404);
            }
        }
        else{
            show_error("Champs requis", 500);
        }
    }

    public function logout()
    {
        $this->ModelU->changeStatus($_SESSION["id_util"]);
        session_destroy();
        redirect('/');
    }
}