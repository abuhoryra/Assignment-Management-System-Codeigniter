<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherModel extends CI_Model {

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

    public function teacadd(){
    	$data = array(
       
        'studentusername' => $this->session->userdata('username'),
        'teacherusername' => $this->input->post('teacherusername')
        );
       $this->db->insert('addteacher',$data);
        
        
    }

    public function assignadd() {

    	 $data = array(
       
       'teacher' => $this->session->userdata('username'),
       'assignment' => $this->input->post('assignment')
       
       );
    	
       $this->db->insert('assignment',$data);

       $last_id = $this->db->insert_id();

       $students = $this->input->post('student');

       foreach ($students as $key) {
         
         $data=array(
          'stu_username'  => $key,
          'assignment_id' => $last_id
         );

         $this->db->insert('studentassignment', $data);
       }
    }


    public function check() {
       
      $sis = $this->session->userdata('username');
      $tec = $this->input->post('teacherusername');
        
      $result = $this->db->select('id')
                        ->from('addteacher')
                        ->where('studentusername', $sis)
                        ->where('teacherusername', $tec)
                        ->get()->row_array();
      
      if($result) 
          return false;
      else 
        return true;
    }


    public function getAllassignment(){
      $this->db->select('*');
      $this->db->from('assignment');
      $this->db->where('teacher',$this->session->userdata('username'));
      $result = $this->db->get();
      return $result;
    }

    public function deleteAssignment($id){
      $this->db->delete('studentassignment', array('assignment_id' => $id));
      $this->db->delete('assignment', array('id' => $id));
    }


      public function updateAssign($id){
         
        $data = array(
          'assignment' => $this->input->post('assignedit')
        
);

     $this->db->where('id', $id);
      $this->db->update('assignment', $data);
    }
}
