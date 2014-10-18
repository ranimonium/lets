<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exchange extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('favor', 'exchange'));
    }

    public function index()
    {
        $data['favors'] = $this->favor->get_favors();

        $this->load->view('headfoot/header');
        $this->load->view('favors', $data);
        $this->load->view('headfoot/footer');
    }

    public function my()
    {
        $this->load->view('headfoot/header');
        $this->load->view('myfavors');
        $this->load->view('headfoot/footer');
    }    

    public function change_exchangeStatus($userid, $exchangeid, $favorid, $status){
        $ownerid = $this->favor->get_ownerid($favorid);
        if($ownerid == $userid){
            $this->exchange->set_request($exchangeid, $userid, $status);
            echo 'change done';
        } else {
            echo "You have no right to do this shit."
        }
    }
    
}