<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('MPembinaan');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);

		$this->load->model('MRegulasi');
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);

		$this->load->model('MNews');
		$data['NewsData'] = $this->MNews->get_news(6);
		$data['nextLoad'] = 10;

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('Berita', $data);
		$this->load->view('Footer', $dataFooter);
	}

	public function DetailBerita($idx)
	{
		$this->load->model('MNews');
		$NewsDetail = $this->MNews->get_detailnews($idx);
		foreach($NewsDetail as $row)
		{
			$data['judul'] = $row['judul'];
			$data['uraian']= $row['uraian'];
		}

		$this->load->model('MPembinaan');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);

		$this->load->model('MRegulasi');
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('DetailBerita', $data);
		$this->load->view('Footer', $dataFooter);
	}
	
	public function LoadMore($nextLoad)
	{
		$this->load->model('MNews');
		$data['NewsData'] = $this->MNews->get_news($nextLoad);
		$nextLoad = $nextLoad+4;
		$data['nextLoad'] = $nextLoad;

		$this->load->model('MPembinaan');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);

		$this->load->model('MRegulasi');
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('Berita', $data);
		$this->load->view('Footer', $dataFooter);
	}
}
