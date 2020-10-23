<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * File name: User Controller
 * Created date: 12/10/2018
 * Author: Youness Bougteb
 * License: Sky Time Digital
 * Website: www.skytimedigital.com
 */

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('code', 'url', 'form', 'security'));
		$this->load->library(array('session', 'form_validation', 'image_lib'));
		$this->load->model('user_model');
		
	}
	public function index()
	{
		auth();
		$data['title'] = 'User Home';
		$user_id = $this->session->userdata('user_id');
		$data['profile'] = $this->user_model->get_user($user_id);
		// $data['user_view'] = 'users/index';
		$data['user_view'] = 'users/profile_page';
        $this->load->view('layouts/user',$data);
	}	
	public function upload_avatar(){
		auth();
		$path = APPPATH.'../file/media/photo/avatar/';
		$config = [
			'upload_path' => $path,
			'allowed_types' => 'jpg|png|jpeg|gif|JPEG|JPG|PNG',
		];
		$config['encrypt_name'] = TRUE;
		$user_id = $this->session->userdata('user_id');
		$user['profile'] = $this->user_model->get_user($user_id);
		$this->load->library('upload', $config);
		$this->form_validation->set_error_delimiters();
		if ( ! $this->upload->do_upload('avatar'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('users/errors', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->process_avatar($data['upload_data']['file_name'],$data['upload_data']['full_path']);
			$this->user_model->update_avatar($user_id);
			alert('Your avatar has been updated','success');
			redirect('user/view/'.$user['profile']['username']);
		}

	}

	// process image
	private function process_avatar($image, $path)
	{
		$config = [
			'image_library'	=> 'gd2',
			'source_image' 	=> $path,
			'maintain_ratio'=>  TRUE,
			'height'		=>  150,
			'new_image' 	=> APPPATH.'../file/media/photo/avatar/'.$image,
		];
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}	
	public function avatar($image)
    {
		auth();
        $path = APPPATH.'../file/media/photo/avatar/';
        image_check($path, $image);
	}	
	public function images($image)
    {
		auth();
        $path = APPPATH.'../file/media/photo/images/';
        image_check($path, $image);
	}
	
	public function view($username = NULL)
	{
		auth();
		$data['profile'] = $this->user_model->get_username($username);

		if(empty($data['profile']))
		{
			redirect('user/index');
		}
		$data['title'] = $data['profile']['first_name'] .' | Profile';
		$data['user_view'] = 'users/profile';
		$this->load->view('layouts/user',$data);
	}	

    /*
     * Edit a user
     */
    public function edit($id)
    {
		auth();

        $data['title'] = 'Update User';
		$data['profile'] = $this->user_model->get_user($id);
		$uid = $data['profile']['id'];

        if(isset($uid) && $this->session->userdata('user_id') == $uid || isset($uid) && $this->session->userdata('user_id') == 1)
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $form_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'username' => $this->input->post('username'),					
					'country' => $this->input->post('country'),
					'url' => $this->input->post('url'),
					'email' => $this->input->post('email'),
					'country' => $this->input->post('country'),
					'institution' => $this->input->post('institution'),
					'description' => $this->input->post('description'),
                );

                $this->user_model->update_user($id,$form_data);
                redirect('user/index');
            }
            else
            {
                $data['user_view'] = 'users/edit';
                $this->load->view('layouts/user',$data);
            }
        }
        else {
			alert('You can only edit your account', 'danger');
            redirect('user/index');
        }
    }	
	public function register()
	{
        $data['title'] = 'Sign Up';
		rules('first_name', 'First name', 'required');
		rules('last_name', 'Last name', 'required');
		rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_email_exists');
		rules('username', 'Username', 'required|callback_username_exists');
		rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]|callback_password_expression');
		rules('password2', 'Confirm Password', 'matches[password]');

		if($this->form_validation->run() === FALSE)
		{
			$data['user_view'] = 'users/add';
            $this->load->view('layouts/user',$data);
		}
		else
		{
			$form_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'password' => hashed($this->input->post('password')),
				'email' => $this->input->post('email'),
			);

            $this->user_model->signup($form_data);
            alert('You may log in now','success');
			redirect('user/login');
		}
    }

	public function login()
	{
        $data['title'] = 'Sign in';
		rules('username', 'Username', 'required');
		rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Sign in';
			$data['user_view'] = 'users/login';
            $this->load->view('layouts/user',$data);
		}
		else
		{
			$username = $this->input->post('username');
            $password = $this->input->post('password');
			$user_id = $this->user_model->login($username, $password);
			if($user_id)
			{
				$user_data['user_id'] = $user_id;
				$user_data['username'] = $username;
				$user_data['is_logged_in'] = true;
				$this->session->set_userdata($user_data);
                alert('You are logged in now','success');
				redirect('user/index');
			}
			else
			{
				alert('Login is invalid', 'danger');
				redirect('user/login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
        alert('Successful logout!', 'info');
		redirect('user/login');
	}

	// is username taken
	public function username_exists($username)
	{
		$this->form_validation->set_message('username_exists', 'The username exists, please choose another username!');
		if($this->user_model->unique('username', $username))
		{ 
			return true; 
		} else { 
			return false; 
		}
	}

	// is email used before
	public function email_exists($email)
	{
		$this->form_validation->set_message('email_exists', 'The email was used before, please login or use another email!');
		if($this->user_model->unique('email', $email))
		{ 
			return true; 
		} else { 
			return false; 
		}
	}

    public function password_expression($expression)
    {
        if (1 !== preg_match("/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $expression))
        {
			$this->form_validation->set_message('password_expression', '%s must be at least 6 characters and must contain at least one lower case letter, one upper case letter and one digit');
			return false;
        }
        else
        {
        	return true;
        }
    }
}
