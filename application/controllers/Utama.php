<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}
	public function index()
	{
		$data = array(
			'layanan' => $this->m_model->data_layanan(),
		);
		$this->load->view('utama', $data, FALSE);
	}
	// public function report()
	// {
	// 	$data['layanan'] = $this->m_model->data_layanan();

	// 	// var_dump($data);
	// 	$this->load->library('dompdf_gen');

	// 	$this->load->view('report', $data);

	// 	$paper_size = 'A4';
	// 	$orientation = 'landscape';
	// 	$html = $this->output->get_output();

	// 	$this->dompdf->set_paper($paper_size, $orientation);

	// 	$this->dompdf->load_html($html);
	// 	$this->dompdf->render();
	// 	$this->dompdf->stream("laporan.pdf", array('Attachment'));
	// }
}
