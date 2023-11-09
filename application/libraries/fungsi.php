<?php

class fungsi {
    protected $ci;

    function __construct() {
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('Mdl_user');
        $user_id = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->Mdl_user->get($user_id)->row();
        return $user_data;
    }

    //proses function PDFDom
    function PdfGeneration($html, $filename){
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0 ) );
    }
    //end proses function PDFDom

    public function curen_item(){
        $this->ci->load->model('Mdl_item');
        return $this->ci->Mdl_item->get()->num_rows();
    }

    public function curen_costumer(){
        $this->ci->load->model('Mdl_costumer');
        return $this->ci->Mdl_costumer->get()->num_rows();
    }

    public function curen_user(){
        $this->ci->load->model('Mdl_user');
        return $this->ci->Mdl_user->get()->num_rows();
    }

    public function curen_supplier(){
        $this->ci->load->model('Mdl_supplier');
        return $this->ci->Mdl_supplier->get()->num_rows();
    }
}