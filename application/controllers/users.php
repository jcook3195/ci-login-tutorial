<?php

class Users extends CI_Controller {

  /**
  * Login function
  */
  public function login() {
    // Username field validation
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
    // Password field validation
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
    // Confirm Password field validation
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
    // If there was an error logging in
    if($this->form_validation->run() == FALSE) {
      // Create an array to contain errors
        $data = array(
          'errors'  => validation_errors()
        );
        // Setting session variabls
        $this->session->set_flashdata($data);

        redirect('home');
    } else {
        // Set form submissions to post variables
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // Load model
        $this->load->model('user_model');
        // Run the login function in the user_model model
        $user_id = $this->user_model->login_user($username, $password);

        // If a user is found
        if($user_id) {
          // Create array with user data
          $user_data = array(
            'user_id'   => $user_id,
            'username'  => $username,
            'logged_in' => true
          );
          // Set user data to session variables
          $this->session->set_userdata($user_data);
          // Set notification for login success
          $this->session->set_flashdata('login_success', 'Welcome, '.$username.'!');
          // Load admin home view
          $data['main_view'] = "admin_view";
          $this->load->view('layouts/main', $data);
          // Redirect to admin page
          //redirect('home/index');
        } else { // No user match
          $this->session->set_flashdata('login_failed', 'Sorry, you are not logged in.');
          redirect('home');
        }
    }
  }

  /**
  * Logout function
  */
  public function logout() {
    // Destroy the session
    $this->session->sess_destroy();
    // Redirect to home page
    redirect('home');
  }

}

?>
