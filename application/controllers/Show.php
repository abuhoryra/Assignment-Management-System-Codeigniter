<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

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
	public function read(){
        if($this->session->userdata('username')&& $this->session->userdata('level')==1){
        $this->load->model('Read');
        $data['data']=$this->Read->userinfo();
       $this->load->view('profile',$data);
        }
        else{
            redirect('Welcome/index');
        }
    }
    public function readpost(){
        if($this->session->userdata('username')&& $this->session->userdata('level')==1){
            $this->load->library('pagination');

            $config['base_url'] = base_url() . "Show/readpost";;
            $config['total_rows'] = $this->db->count_all('post');
            $config['per_page'] = 3;
            $config["uri_segment"] = 3;
            $config['full_tag_open']  = '<div class="pagging text-center"><nav><ul class="pagination">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span></li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';


            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
           // echo $this->pagination->create_links();
           $this->load->model('Read');
           $data['data']=$this->Read->fetchpost($config["per_page"], $page);
           $this->load->view('post',$data);
        }
        else{
            redirect('Welcome/index');
        }
    }

    public function teacherDelete($tid){
        $this->load->model('Insert');
        $this->Insert->deleteTeacher($tid);
        redirect('Teacher/showteacher');
    }


    

}
