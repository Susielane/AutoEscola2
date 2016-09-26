<meta charset="utf-8">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
 
	
  // Exibir informações sobre o nosso sistema

  public function index(){
	
    $this->load->view('template');
  }
	
}
