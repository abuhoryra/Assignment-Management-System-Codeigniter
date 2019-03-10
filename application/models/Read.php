<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Model {

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
    
    
    public function userinfo(){
         $this->db->select('s.*, p.img_name')
                ->from('signup s')
                ->join('profileimage p', 'p.username=s.username', 'left');
        $this->db->where('s.id',$this->session->userdata('id'));
        $result=$this->db->get();
        return $result;
    }

    public function update_user_photo() {

      $user = $this->db->select('img_name')
                       ->from('profileimage');

       return $user;
      if($user['img_name']) {
        $file_path = './upload/'.$user['img_name'];

        if(file_exists($file_path)) {
          unlink($file_path);
        }
      }
    }
    public function up(){
         
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'dob' => $this->input->post('dob')
        );

         $idata = array(
              //'username' => $this->session->userdata('username'),
              'img_name' => $this->upload->file_name
            );

      $this->db->where('id', $this->session->userdata('id'));
      $this->db->update('signup', $data);
       
        
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('profileimage', $idata);
       
       
    }

     public function fetchpost($limit,$start){
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('username',$this->session->userdata('username'));
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit,$start);
        $result=$this->db->get();
        return $result;
    }

      public function teacherdata(){
         $this->db->select('*');
        $this->db->from('signup');
        $this->db->where('level',2);
        $this->db->order_by('id', 'DESC');
        $result=$this->db->get();
        return $result;
    }

    public function loadmyteacher(){
         $this->db->select('*');
        $this->db->from('addteacher');
        $this->db->where('studentusername',$this->session->userdata('username'));
        $this->db->order_by('id', 'DESC');
        $result=$this->db->get();
        return $result;
    }
    public function loadmystudent(){
         $this->db->select('at.*, s.firstname, s.lastname');
        $this->db->from('addteacher at')
                  ->join('signup s', 's.username=at.studentusername');
        $this->db->where('at.teacherusername',$this->session->userdata('username'));
        $this->db->order_by('at.id', 'DESC');
        $result=$this->db->get();
        return $result;
    }
     public function loadassign(){
         $this->db->select('as.*, s.stu_username,s.assignment_id');
        $this->db->from('assignment as')
                 ->join('studentassignment s', 's.assignment_id=as.id');
        
        $this->db->where('s.stu_username',$this->session->userdata('username'));
        $this->db->order_by('id', 'DESC');
        $result=$this->db->get();
        return $result;
    }


   
}
