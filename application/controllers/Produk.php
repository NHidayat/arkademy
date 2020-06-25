<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation']);
	}
	
	public function index()
	{
		if ($this->input->get('submit') == 'Submit') {
			$data_produk = $this->app->get_like('produk','nama_produk', $this->input->get('txt_cari'));
		} else {
			$data_produk =  $this->app->get_all('produk');
		}
		$data = [
			'data_produk' => $data_produk,
			'title'       => 'Produk'
		];

		$this->template->load('v_produk', $data);
	}

	public function add()
	{
		$this->produk_validation();

		$data_produk = [
			'nama_produk' => $this->input->post('nama_produk'),
			'jumlah'      => $this->input->post('jumlah'),
			'harga'       => $this->input->post('harga'),
			'keterangan'  => $this->input->post('keterangan'),
		];

		if ($this->input->post('submit') == 'Submit') {			

			if ($this->form_validation->run() == TRUE) {
				if ($this->app->insert('produk', $data_produk)) {
					redirect('produk', $this->session->set_flashdata('alert','Data Produk <strong>Berhasil</strong> Ditambahkan'));
				}
			}
		}

		$inputan = ['nama_produk','jumlah','harga','keterangan'];
		$data = [
			'row'   => $this->input->post($inputan),
			'title' => 'Tambah Produk',
		];
		$this->template->load('v_produk_form', $data);
	}


	public function update()
	{
		$nama = str_replace('%20', ' ', $this->uri->segment(3));
		$this->cek_data($nama);
		$get_data = $this->app->get_where('produk',['nama_produk' => $nama])->row();
		
		$this->produk_validation();
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|max_length[100]');

		$data_produk = [
			'nama_produk' => $this->input->post('nama_produk'),
			'jumlah'      => $this->input->post('jumlah'),
			'harga'       => $this->input->post('harga'),
			'keterangan'  => $this->input->post('keterangan'),
		];

		if ($this->input->post('submit') == 'Submit') {

			if ($this->form_validation->run() == TRUE) {

				if ($this->app->update('produk', $data_produk, ['nama_produk' => $nama])) {
					redirect('produk', $this->session->set_flashdata('alert','Data Produk <strong>'.$nama.'</strong> Berhasil Diupdate'));
				}
			}
		}	

		$data = [
			'row' => get_object_vars($get_data),
			'title' => 'Edit data '.$nama.'',
		];

		$this->template->load('v_produk_form', $data);
	}

	public function delete()
	{
		$nama = str_replace('%20', ' ', $this->uri->segment(3));
		$this->cek_data($nama);

		if ($this->app->delete('produk',['nama_produk' => $nama]))  {
			redirect('produk', $this->session->set_flashdata('alert','Data <strong>'.$nama.'</strong> Berhasil Dihapus'));
		}
	}

	private function produk_validation()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|max_length[100]|is_unique[produk.nama_produk]');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric|max_length[11]');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric|max_length[11]');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|max_length[1000]');
		formValidation_message();
	}

	private function cek_data($data) {
		if (!isset($data) || $this->app->get_where('produk', ['nama_produk' => $data])->num_rows() < 1) {
			redirect('produk', $this->session->set_flashdata('alert','Data yang dimaksud tidak ditemukan'));
		} 
	}

}
