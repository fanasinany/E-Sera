<?php

if(!function_exists('testsess'))
{
  function testsess($redirectcontroller, $pagedemande)
  {
    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]){
      redirect($redirectcontroller);
    }
    else{
        $data = array('content'=>$pagedemande);
        get_instance()->load->view('view_template',$data);
    }
  }
}