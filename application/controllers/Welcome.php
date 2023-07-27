<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Karyawan', 'karyawan');
	}
	public function index()
	{
		$data['Karyawan'] = $this->Karyawan->get_data();

		$gradeS = 0;
		$gradeA = 0;
		$gradeB = 0;
		$gradeC = 0;
		$gradeD = 0;


		foreach ($data['Karyawan'] as $k) {
			if ($k->grade === 'S') {
				$gradeS++;
			} elseif ($k->grade === 'A') {
				$gradeA++;
			} elseif ($k->grade === 'B') {
				$gradeB++;
			} elseif ($k->grade === 'C') {
				$gradeC++;
			} elseif ($k->grade === 'D') {
				$gradeD++;
			}
		}
		$data['gradeS'] = $gradeS;
		$data['gradeA'] = $gradeA;
		$data['gradeB'] = $gradeB;
		$data['gradeC'] = $gradeC;
		$data['gradeD'] = $gradeD;

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('welcome_message', $data);
		$this->load->view('templates/footer');
	}
}