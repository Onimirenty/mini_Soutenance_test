<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistique extends CI_Controller {

	public function index()
	{
		$this->load->view('statistiqueVente');
		
	}		

	public function statCommande()
	{
		$this->load->view('statistiqueCommande');
	}

	public function statRecette()
	{
		$this->load->view('statistiqueRecette');
	}

	public function statBenefice()
	{
		$this->load->view('statistiqueBenefice');
	}

	public function statProduction()
	{
		$this->load->view('statistiqueProduction');
	}
	
}
