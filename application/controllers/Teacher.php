
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

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

       public function dashboard(){
       	$this->load->model('Read');
		    $data['data']=$this->Read->loadmystudent();
       $this->load->view('teacherdash',$data);
       	
				//$this->load->view('teacherdash');
		}

		public function loadteacher(){

         if($this->session->userdata('username')&& $this->session->userdata('level')==1){
        $this->load->model('Read');
        $data['data']=$this->Read->teacherdata();
        $this->load->view('dashboard',$data);

        }
        else{
            redirect('Welcome/index');
        }



			//$this->load->model('Read');
			//$this->Read->teacherdata();

		}


		public function techinsert(){
      
      $this->form_validation->set_rules('teacherusername','teacherusername','callback_valid');
            if($this->form_validation->run()== FALSE){
              echo "Already Added";
            }
               else{
      $this->load->model('TeacherModel');
      $this->TeacherModel->teacadd();
      redirect('Teacher/loadteacher');
           }
      
      

			
		}


	
       public function myteacher(){
       	redirect('Teacher/showteacher');
       	//$this->load->view('myteacher');
       }

       public function showteacher(){
       	 if($this->session->userdata('username')&& $this->session->userdata('level')==1){
       	$this->load->model('Read');
		$data['data']=$this->Read->loadmyteacher();
		$data['sdata']=$this->Read->loadassign();
       $this->load->view('myteacher',$data);
      }
        else{
            redirect('Welcome/index');
        }

       }
       

  public function addassign(){

   	if($this->session->userdata('username')&& $this->session->userdata('level')==2) {

     	$this->load->model('TeacherModel');
    	$this->TeacherModel->assignadd();
    	redirect('Teacher/dashboard');
   }
   else {
        redirect('Welcome/index');
    }
  }

       public function viewassign(){
       	$this->load->model('Read');
		$sdata['sdata']=$this->Read->loadassign();
       $this->load->view('studentassign',$sdata);

   

       }


       public function valid(){
        $this->load->model('TeacherModel');

        if($this->TeacherModel->check()){
          return true;
        }
        else {
          return false;
        }
       }

       public function getAssignment(){
        $this->load->model('TeacherModel');
        $data['adata'] = $this->TeacherModel->getAllassignment();
        $this->load->view('assignment',$data);
       }

       public function assignmentDelete($uid){
   
       
        $this->load->model('TeacherModel');
       $this->TeacherModel->deleteAssignment($uid);
       redirect('Teacher/getAssignment');
        
      
       }
       public function assignmentEdit($uid){
   
       
        $this->load->model('TeacherModel');
       $this->TeacherModel->updateAssign($uid);
       redirect('Teacher/getAssignment');
        
      
       }


       public function load_teacher_profile(){
        $this->load->model('TeacherModel');
        $data['tdata'] = $this->TeacherModel->tech_profile();
        $this->load->view('teacherprofile', $data);
       }

       public function update_teacher(){
        $this->load->model('TeacherModel');
        $this->TeacherModel->teacher_profile_update();
        redirect('Teacher/load_teacher_profile');
       }

	
}
