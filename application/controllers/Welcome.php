<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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


        if($this->session->userdata('username') && $this->session->userdata('level')==1){
                redirect('Welcome/dash');
            }
            elseif($this->session->userdata('username') && $this->session->userdata('level')==2){
                redirect('Teacher/dashboard');
            }
		    $this->load->view('login');
	}
    public function signup()
	{
       
		$this->load->view('signup');
	} 
    
    public function savedata()
	{



        $this->form_validation->set_rules('firstname','Firstname','required');
        $this->form_validation->set_rules('lastname','Lastname','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('dob','Date of birth','required');
        $this->form_validation->set_rules('level','User Type','required');
        if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('signup');
                }
                else
                {
                        
        $this->load->model('Insert');
        $this->Insert->sinsert();
        redirect('Welcome/index');
                }
       
	}
    
    public function updatedata() {

        

       if ($_FILES['img']['size'] == 0) {
    
             redirect('Show/read');

        }


        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = false;
        $config['encrypt_name']         = true;
        $config['width']                = 100;
        $config['height']               = 150;
       
        $this->load->library('upload',$config);
       

        if(!$this->upload->do_upload('img')) {

            echo $this->upload->display_errors();
        }
        else {
                     $data = $this->upload->data();  
                     
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = './upload/'.$data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE;  
                     $config['quality'] = '100%';  
                     $config['width'] = 400;  
                     $config['height'] = 400;  
                      $config['new_image'] = './upload/'.$data["file_name"]; 
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     //$this->load->model('Read');
               $this->load->model('Read');
         $this->Read->up();

             redirect('Show/read');

           
           
          

           
        }
























        
        //redirect('Welcome/dash');
	}
    public function login(){
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);
        $this->load->model('Insert');
        $result=$this->Insert->log($username,$password);
        $sdata=array();
        if($result){
            $sdata['id']=$result['id'];
            $sdata['username']=$result['username'];
            $sdata['level']=$result['level'];
            $this->session->set_userdata($sdata);
            if($this->session->userdata('username') && $this->session->userdata('level')==1){
                redirect('Welcome/dash');
            }
           if($this->session->userdata('username') && $this->session->userdata('level')==2){
                redirect('Teacher/dashboard');
            }
        }
        else{
            echo "Wrong";
        }
    }
    public function dash(){
    		//if($this->session->userdata('username') && $this->session->userdata('level')==1){
			//$this->load->view('dashboard');
            redirect('Teacher/loadteacher');
		//}
		//elseif($this->session->userdata('username') && $this->session->userdata('level')==2){
			//redirect('Teacher/dashboard');
		//}
       // else{
            //redirect('Welcome/index');
        //}
    }
    
    public function logout(){
        $this->session->unset_userdata('username');
       
       
        redirect('Welcome/index');
    }


    public function post()
    {
    	if($this->session->userdata('username') && $this->session->userdata('level')==1){

           $this->load->model('Insert');
           $this->Insert->addpost();

    		redirect('Show/readpost');
    	}
    	else{
    		redirect('Welcome/index');
    	}
    }

    public function img_upload(){
        $this->form_validation->set_rules('username','Already Uploaded','callback_img_valid');
        
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = false;
        $config['encrypt_name']         = true;
        $config['width']                = 100;
        $config['height']               = 150;
       
        $this->load->library('upload',$config);
       

        if(!$this->upload->do_upload('img')) {

            echo $this->upload->display_errors();
        }
        else {
                     $data = $this->upload->data();  

                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = './upload/'.$data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE;  
                     $config['quality'] = '100%';  
                     $config['width'] = 400;  
                     $config['height'] = 400;  
                      $config['new_image'] = './upload/'.$data["file_name"]; 
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  

            $data = array(
              'username' => $this->session->userdata('username'),
              'img_name' => $this->upload->file_name
            );
            if($this->form_validation->run()== FALSE){
              echo "You Already Upload Your Image";
            }
            else {
             $this->db->insert('profileimage',$data);

             redirect('Show/read');
            }

           
        }
    }


    public function img_valid(){
        $this->load->model('Insert');

        if($this->Insert->img_check()){
          return true;
        }
        else {
          return false;
        }
       }
}
