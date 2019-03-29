<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('m_user');
    }
    
	public function index()
	{
        $this->load->database();
		$jumlah_data = $this->m_user->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/c_user/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['user'] = $this->m_user->data($config['per_page'],$from);
		$this->load->view('v_user',$data);
    }
    
    public function edit(){
        $edit['user'] = $this->m_user->getMhs($_get['nim']);
        $this->load->view('cipage/edit',$edit);

    }

    public function proses_edit(){
        
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $ttl = $this->input->post('ttl');
            $ipk = $this->input->post('ipk');
            $kelas = $this->input->post('kelas');
    
        $this->m_user->update($nama,$nim,$ttl,$ipk,$kelas);
        redirect('cipage/v_user');
    }

    public function hapus($nim){
        $hapus = $this->m_user->hapus($get['nim']);
        redirect('cipage/v_user');
    }
}
