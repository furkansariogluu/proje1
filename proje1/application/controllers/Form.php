<?php

class Form extends CI_Controller
{

    /* Sınıfın yapıcı metodu. Sınıf çağırıldığında otomatik çalışır. */
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Form_Model");
    }

    /* Kayıt formunun ekrana basılması işlemidir. */
    public function index()
    {
        $this->load->view("form.php");
    }

    public function listele()
    {
        $items = $this->Form_Model->get_all();
        //print_r($items);
        $viewData = array(
            "items" => $items
        );

        $this->load->view("listele", $viewData);
    }

    public function insert()
    {
        //echo "Form Kayıt İşlemi" ;
        $data = array(
            "id"      => $this->input->post("id"),

            "name"      => $this->input->post("name"),
            "email"     => $this->input->post("email"),
            "message"   => $this->input->post("message"),

        );

        $insert = $this->Form_Model->insert($data);

        if ($insert) {
echo "Form Başarıyla Gönderildi";
        } else {
echo "Form Başarıyla Gönderilemedi";
           
        }
    }
}
