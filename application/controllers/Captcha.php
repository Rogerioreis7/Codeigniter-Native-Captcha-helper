<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captcha extends CI_Controller {
  
  public function index() {
    // loading captcha helper
    $this->load->helper('captcha');
    //validating form fields
    $this->form_validation->set_rules('username', 'Email Address', 'required');
    $this->form_validation->set_rules('user_password', 'Password', 'required');
    $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
    $userCaptcha = $this->input->post('userCaptcha');
    if ($this->form_validation->run() == false){
      // numeric random number for captcha
      $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
      // setting up captcha config
      $vals = array(
             'word' => $random_number,
             'img_path' => './captcha/',
             'img_url' => base_url().'captcha/',
             'img_width' => 140,
             'img_height' => 32,
             'expiration' => 7200
            );
      $data['captcha'] = create_captcha($vals);
      $this->session->set_userdata('captchaWord',$data['captcha']['word']);
      $this->load->view('captcha', $data);
    }
    else {
      // do your stuff here.
      echo 'I m here clered all validations';
    }
  }
  public function check_captcha($str){
    $word = $this->session->userdata('captchaWord');
    if(strcmp(strtoupper($str),strtoupper($word)) == 0){
      return true;
    }
    else{
      $this->form_validation->set_message('check_captcha', 'Please enter correct words!');
      return false;
    }
  }
}