<?php 
class ForgotPassword extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('m_user');


    }

    function index(){
        $this->load->view('v_forgotpassword');
    }

    function accountNotFound($email){
        $this->load->view('errors/v_erroraccountnotfound', $email);
    }

    function resetSuccess(){
        $this->load->view('v_resetsuccess');
    }

    function forgotPass(){
        $em = $this->input->post('email');
        $cek = $this->m_user->getRecord($email)->result();
        if($cek){
            
            $tkn = random_bytes(6);

            $data = array(
                'password' => $tkn,
            );
            $where = array(
                'email' => $em,
            );
            $this->m_user->updateRecord($where, $data, 'user');
            $this->sendEmail($em, $tkn);
            

            $this->resetSuccess();
        }
        else{
            $this->accountNotFound($em);
        }
        
    }

    function sendEmail($email, $token){
        $cek = $this->m_user->getRecord($email)->result();
        if($cek){
            $account_name = "BengCool - Collaborative, Community, Marketplace";  
            $gmail_account_username = "bengcool.cs@gmail.com"; 
            $gmail_account_password = "bengcoolmemangcool"; 
            $to = $email;  
            $subject = 'Forgot My Password'; 
            $body = 'Halo, '.$cek->nama.'<br> <br> 
                    <b> Kami mendapatkan konfirmasi bahwa anda mencoba mengubah password anda. </b> <br>
                    Silakan lakukan login ke dalam sistem menggunakan password ini <br> <br>
                    Email : '.$cek->email.' <br>
                    New Password : '.$token.' <br> <br>
                    Jika anda tidak berusaha untuk mengubah password anda, segera lakukan login dan ubah password anda. <br> <br>
                    <br>
                    <br>
                    <br>
                    <b> Best Regards, </b> <br>
                    - BengCool - 
                    ';  
     
            $config['smtp_crypto'] = 'tls';
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = '587';
            $config['smtp_user'] =  $gmail_account_username;
            $config['smtp_pass'] =  $gmail_account_password;
            $config['mailtype'] = 'html';
            $config['charset']  = 'iso-8859-1';
    
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->set_crlf( "\r\n" );
            $this->email->from($gmail_account_username, $account_name);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($body);
         
           
            if($this->email->send()){
                echo "berhasil";
            }
            else {
               echo "error";
               echo $this->email->print_debugger();
            }
        }
        
   }
}




?>