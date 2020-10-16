<?php
class Amis extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("FriendsModel","ModelF");
    }

    public function index()
    {
        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] && isset($_SESSION["id_util"])){
            $datas["friends"] = $this->ModelF->getAllUtilisateurFriends($_SESSION["id_util"]);
            $data = array_merge(array('content'=>'amis_page'),$datas);
            $this->load->view('view_template',$data);
        }
        else{
            $data = array('content'=>'connexion_page');
            $this->load->view('view_template',$data);
        }
    }

}