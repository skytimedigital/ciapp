<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function update_avatar($user_id){
        if($_FILES['avatar']['error'] == 0){
            $file['avatar'] = $this->upload->file_name;
        }
        $this->db->where('id', $user_id);
        return $this->db->update('users', $file);
    }
    /*
     * Get user by username
     */
    function get_username($username)
    {
        return $this->db->get_where('users',array('username'=>$username))->row_array();
    } 
    function signup($formdata)
    {
        return $this->db->insert('users',$formdata);
    }  
    public function unique($key, $value)
    {
        $data[$key] = $value;
        $query = $this->db->get_where('users', $data);
        if(empty($query->row_array()))
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $result = $this->db->get('users')->row();
        if($result != NULL)
        { 
            if(password_verify($password, $result->password))
            {
                $username = $result->username;
                return $result->id;
            }
            
        } 
        else 
        { 
            return false;
        }
    }    
    /*
     * Get user by id
     */
    function get_user($id)
    {
        return $this->db->get_where('users',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all users
     */
    function get_all_users()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('users')->result_array();
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('users',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($id)
    {
        return $this->db->delete('users',array('id'=>$id));
    }
}