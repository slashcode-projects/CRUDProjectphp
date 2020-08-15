<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class ProductOps extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 
        $this->load->library('form_validation'); 
        $this->load->model('user'); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
    }     
 
    function create(){
       if($this->isUserLoggedIn){   
        log_message("debug", "Add new product");
            $userId = $this->session->userdata('userId');
            $loggedInUser = $this->user->getUserById($userId);
            $data['loggedInUser'] =  $loggedInUser;
        
            $this->form_validation->set_rules('p_code','Product Code','required');
            $this->form_validation->set_rules('p_category','Product Category','required');
            $this->form_validation->set_rules('p_party','Product Segment','required');
            $this->form_validation->set_rules('p_type','Product Type','required');
            $this->form_validation->set_rules('p_rate','Product Rate','required');
        
        if($this->form_validation->run() == false){
            $this->load->view('users/create',$data);    
        }
        else
        {
            //save entry
            $formArray = array();
            $formArray['p_code'] = $this->input->post('p_code');
            $formArray['p_category'] = $this->input->post('p_category');
            $formArray['p_party'] = $this->input->post('p_party');  
            $formArray['p_type'] = $this->input->post('p_type');
            $formArray['p_rate'] = $this->input->post('p_rate');
            $formArray['inserted_date'] = date("Y-m-d H:i:s");   
            $formArray['addedByUser'] = $loggedInUser['first_name'];
            $this->load->model('Product_model');    
            $this->Product_model->create($formArray);
            $this->session->set_flashdata('success','Record Inserted Sucessfully');
            redirect('users/account');
        }
    }
        else{
        redirect('users/login'); 
    }
    }

    public function edit($p_code){ 
        if($this->isUserLoggedIn){   
            log_message("debug", "Edit product :: ".$p_code);
            $userId = $this->session->userdata('userId');
            $loggedInUser = $this->user->getUserById($userId);
            $data['loggedInUser'] =  $loggedInUser;

            $this->load->model('Product_model');
            $product = $this->Product_model->getProductById($p_code);
            $data['product'] = $product;
        
            $this->form_validation->set_rules('p_code','Product Code','required');
            $this->form_validation->set_rules('p_category','Product Category','required');
            $this->form_validation->set_rules('p_party','Product Segment','required');
            $this->form_validation->set_rules('p_type','Product Type','required');
            $this->form_validation->set_rules('p_rate','Product Rate','required');
        
        if($this->form_validation->run() == false){
            $this->load->view('users/edit',$data);    
        }
        else
        {
            //save entry
            $formArray = array();
            $formArray['p_category'] = $this->input->post('p_category');
            $formArray['p_party'] = $this->input->post('p_party');  
            $formArray['p_type'] = $this->input->post('p_type');
            $formArray['p_rate'] = $this->input->post('p_rate');
            $formArray['last_modified_date'] = date("Y-m-d H:i:s");   
            $formArray['updatedbyuser'] = $loggedInUser['first_name'];
            
            $this->Product_model->updateProduct($p_code,$formArray);
            $this->session->set_flashdata('success','Record Updated Sucessfully');
            redirect('users/account');  
        }

    }
    else{
        redirect('users/login'); 
    }
    }
    function delete($p_code){
       if($this->isUserLoggedIn){   
        log_message("debug", "Delete product :: ".$p_code);
        $this->load->model('Product_model');
        $product = $this->Product_model->getProductById($p_code);
        if(empty($product)){
            $this->session->set_flashdata('success','Record not found in database');
            redirect('users/account');
        }
        else{
            $this->Product_model->deleteProduct($p_code);
            $this->session->set_flashdata('success','Record deleted successfully');
            redirect('users/account');
        }
        }
        else{
        redirect('users/login'); 
    }
    }
}