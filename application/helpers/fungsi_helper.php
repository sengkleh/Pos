<?php

    // cek login
     function check_already_login(){
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_user');
        if($user_session) {
            redirect('Ctr_dashboard');
    }
}
    //end  cek login

    //cek yg belum login
     function check_not_login(){
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_user');
        if(!$user_session) {
            redirect('Ctr_auth');
    }
}
    //end cek yg belum login

    //cek akses admin
    function user_login(){
        $ci =& get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level != 1 ){
            redirect('Ctr_auth');
        }
}
    //end cek akses admin

    //format indo curren 
    function format_number($angka){
        $hasil = 'Rp ' . number_format($angka, 2, ".", ",");
        return $hasil;
}
    //end format indo curren 

    //format indo date 
    function indo_date($date){
        $d = substr($date,8,2);
        $m = substr($date,5,2);
        $y = substr($date,0,4);
        return $d.'-'.$m.'-'.$y;
}
    //end format indo date  

  
