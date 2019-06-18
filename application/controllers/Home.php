<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		//$this->load->model('admin/report_model', 'report_model');
		$session = $this->session->userdata('MY_SESS');
		
		if($session['id']!= '3456'){
		redirect('/login/index', 'refresh');
		}
	}
	public function index()
	{
		$this->load->view('home/home');
	}
	public function sales()
	{
		$this->load->view('home/sales');
	}
	public function catalog()
	{
		$this->load->view('home/catalog');
	}
	public function alc()
	{
		
		$this->load->model('home_model');
		$data['menu_names'] = $this->home_model->menu_names();
		$data['get_names'] = $this->home_model->get_names();
		
		
		$this->load->view('home/alc',$data);
	}
	public function assign()
	{
		
		$this->load->model('home_model');
		$data['menu_names'] = $this->home_model->assigning();
	}
	public function check_assigned(){
		
		$this->load->model('home_model');
		$data = $this->home_model->check_assigned();
		
		//echo "<pre>";
		//print_r($data[0]['assigned_menus']);
		$chked = explode(',',$data[0]['assigned_menus']);
		
		echo json_encode($chked);
		
	}
	
}
