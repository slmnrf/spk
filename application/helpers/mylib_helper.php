<?php

function chek_seesion(){
    $ci=&get_instance();
    $session=$ci->session->userdata('status_login');
    if($session!='ok') {
        redirect(base_url());
    }
}


?>