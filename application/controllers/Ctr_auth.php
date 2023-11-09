<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_auth extends CI_Controller {

    //proses login
	public function index(){

        //fungsi setelah login difolder helper
        check_already_login();

		$this->load->view('template/login');

	}

    //prosess multi login
    public function proseslogin(){
        $post = $this->input->post(null, TRUE);

        //ambil dari nama submit login
        if(isset($post['login'])){

            //ambil dari model
            $this->load->model('Mdl_user');
            $query = $this->Mdl_user->login($post);
            if($query->num_rows() > 0) {
                $row =$query->row();

                //parem dari database
                $params = array(
                    'id_user'   => $row->id_user,
                    'level'     => $row->level
                );

                //session ambil data
                $this->session->set_userdata($params);

                //aler berhasil
                echo "<script>
                alert ('Selamat, Login Berhasil !!');
                window.location='".site_url('Ctr_dashboard')."';
                </script>";

            }else{

                //alert gagal
                echo "<script>
                alert ('Maaf Login Gagal');
                window.location='".site_url('Ctr_auth/index')."';
                </script>";
            }
        }
    }


    // proses logout
    public function proseslogout(){
        $params = array ('id_user', 'level');
        $this->session->unset_userdata($params);
        redirect('Ctr_auth/index');
    }
}
