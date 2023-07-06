<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('adminpanel/common_model');
    }

    public function index() {

        $userbackendsession = $this->session->userdata('userbackendsession');

        if ($userbackendsession != '') {
			redirect('adminpanel/dashboard');			
        } else if ($userbackendsession == '') {
            $data = array();
            $data['error'] = '';
            $this->load->view('adminpanel/login_form', $data);
        }        
    }

    public function login_validation() {

    
        $captcha;

        if (isset($_POST['g-recaptcha-response']))
            $captcha = $_POST['g-recaptcha-response'];

        if (!$captcha) {
            // echo "1"; exit();
            $data = array();
            $data['error'] = 'ERROR: Please complete the CAPTCHA';
            $this->load->view('adminpanel/login_form', $data);
            // exit();
        } else {
            //echo "ok-else-1"; exit();
            $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf6jzAgAAAAAIUcdM0_DVNkyYgPk_HGMdVjfKBV&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);
            // $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);
            if ($response['success'] == false) {
                $data = array();
                $data['error'] = 'ERROR: You Are A Spammer...!!!';
                $this->load->view('adminpanel/login_form', $data);
            } else {
                //exit();
                //echo '<h2>Thanks for posting comment.</h2>';exit();


                $this->load->library('form_validation');

                $this->form_validation->set_rules('vUserName', 'username', 'required|trim|xss_clean');
                $this->form_validation->set_rules('pPassword', 'password', 'required|trim|xss_clean|callback_username_check');

                if ($this->form_validation->run()) {
                    $this->load->model('adminpanel/model_users');
                    $userDetail = $this->model_users->get_user_id();
                    //Var_dump($userDetail); die();

                    $data = array(
                        'userbackendsession' => $userDetail["id"],
                        'is_logged_inbackendsession' => 1,
                        'uTypebackendsession' => 'colomboBACKUSER',
                        'vUserNamebackendsession' => $userDetail["vUserName"],
                        'iUserTypebackendsession' => $userDetail["iUserType"]
                    );
                    $this->session->set_userdata($data);

                    // system log
                    $tDes = "log into system";
                    $this->common_model->add_log($tDes, "main_slider");
                    //
                    //redirect('adminpanel/login/main_slider');
					
					
					
					redirect('adminpanel/dashboard');
					//redirect('adminpanel/main_slider');
                } else {
                    $data = array();
                    $data['error'] = '';
                    $this->load->view('adminpanel/login_form', $data);
                }
            }
        }
    }

    // sgin up page validation
    public function signup_validation() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('uName', 'Username', 'required|trim|is_unique[user.vUserName]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
        //$this->form_validation->set_rules('email','Email','required|trim|valid_email');

        $this->form_validation->set_message('is_unique', 'User name you entered is already exists.');

        if ($this->form_validation->run()) {
            $this->load->model('model_users');
            if ($this->model_users->add_user()) {
                echo "data added";
            } else {
                echo "Data not added to the tabel";
            }
        } else {
            $this->load->view('signup');
        }
    }

    public function username_check() {
        $this->load->model('adminpanel/model_users');
        if ($this->model_users->can_log()) {
            return true;
        } else {
            $this->form_validation->set_message('username_check', 'Incorect user name or password.');
            return false;
        }
    }

    public function main_slider() {
        if ($this->session->userdata('is_logged_inbackendsession')) {
            set_title("main_slider");
            $this->load->view('adminpanel/main_slider');
        } else {
            redirect('adminpanel/login/restricted');
        }
    }

    public function restricted() {
        $this->load->view('adminpanel/restricted');
    }

    public function logout() {



        $array_items = array('userbackendsession' => '', 'is_logged_inbackendsession' => '', 'uTypebackendsession' => '', 'vUserNamebackendsession' => '', 'iUserTypebackendsession' => '');
        $this->session->unset_userdata($array_items);
        //$this->load->cache('index');
        //$this->load->driver('cache');
        //$this->cache->clean();
        //$this->output->nocache();
        $this->session->sess_destroy();
        redirect('adminpanel/login');
    }

    public function signup() {
        $this->load->view('adminpanel/signup');
    }

}

?>
