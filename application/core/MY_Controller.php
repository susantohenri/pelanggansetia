<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }

  protected function loadview($param = [])
  {
    $this->load->view('index', array_merge([
      'page_title' => 'Home',
      'header' => '&nbsp;',
      'menu' => $this->menu,
      'active_menu' => 0,
      'page' => 'landing.php'
    ], $param));
  }

  protected function generatetoken()
  {
    $token = md5(time());
    $this->session->set_userdata('token', $token);
    return $token;
  }

  protected function validatesubmission()
  {
    $post = $this->input->post();
    if (!$post) return false;
    if (!isset($post['token'])) return false;
    $token = $this->session->userdata('token');
    if ($token !== $post['token']) return false;
    $this->session->unset_userdata('token');
    return $post;
  }
}
