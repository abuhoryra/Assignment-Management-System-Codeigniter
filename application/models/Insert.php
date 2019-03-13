<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert extends CI_Model {

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

    public function sinsert()
	{
		$data = array(
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
        'phone' => $this->input->post('phone'),
        'dob' => $this->input->post('dob'),
        'level' => $this->input->post('level')
        );
        $this->db->insert('signup',$data);
	}

    public function getMyInfo($username=null) {

        if($username==null) {
            $username = $this->session->userdata('username');
        }

        return $this->db->select('*')
                        ->from('signup')
                        ->where('username', $username)
                        ->get()->row_array();
    }
    
    public function log(){
         $username = $this->input->post('username');
         $password = $this->input->post('password');

         $member = $this->db->select('*')
                         ->from('signup')
                         ->where('username',$username)
                         ->get()->row_array();

        if(password_verify($password, $member['password'])){
            return true;
        }

        return false;
    }

    public function addpost(){
        $data = array(
        'username' => $this->session->userdata('username'),
        'post' => $this->input->post('addpost') 
        );
        $this->db->insert('post',$data);
      
    }

    public function deleteTeacher($id){
        
        $this->db->delete('addteacher', array('id' => $id));
        $this->db->delete('studentassignment', array('stu_username' => $this->session->userdata('username')));
       
    }


     public function img_check() {
       
      $sis = $this->session->userdata('username');
     // $tec = $this->input->post('teacherusername');
        
      $result = $this->db->select('id')
                        ->from('profileimage')
                        ->where('username', $sis)
                        //->where('teacherusername', $tec)
                        ->get()->row_array();
      
      if($result) 
          return false;
      else 
        return true;
    }
}
