<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favors extends CI_Controller {

    public function index()
    {
        $this->load->view('headfoot/header');
        $this->load->view('favors');
        $this->load->view('headfoot/footer');
    }

    public function my()
    {
        $this->load->view('headfoot/header');
        $this->load->view('myfavors');
        $this->load->view('headfoot/footer');
    }    
}