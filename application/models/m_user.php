<?php 
 
class m_user extends CI_Model{
	function data($number,$offset){
		return $query = $this->db->get('user',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('user')->num_rows();
    }

    public function getMhs($nim){
        $this->db->from('user');
        $this->db->from('nim', $nim);

        $query = $this->db->get();
        return $query->result();

    }

    public function update($nama, $nim, $ttl, $ipk, $kelas){
        $data = array(
            'nama' => $nama,
            'nim' => $nim,
            'ttl' => $ttl,
            'ipk' => $ipk,
            'kelas' => $kelas
        );
        $this->db->where('nim', $nim);
        $this->db->update('user',$data);
    }

    public function hapus($nim){
        $this->db->where('nim',$nim);
        $this->db->update('user');
    }
}