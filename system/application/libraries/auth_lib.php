<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_lib
{
    public function do_login($login,$pass)
    {
        $CI=& get_instance();
        
        $right_login = $CI->config->item('admin_login');
        $right_pass = $CI->config->item('admin_pass');
        
        
        if(($right_login === $login) && ($right_pass === $pass))
        {
            $ses = array();
            $ses['admin_logined'] = 'yes';
            $ses['admin_hesh'] = $this->the_hesh();
            $CI->session->set_userdata($ses);
            redirect('administration');
        }
        else
        {
            redirect ('administration/login');
        }
    }
    
    public function do_logout()
    {
        $CI=& get_instance();
        
        $ses = array();
        $ses['admin_logined'] ='';
        $ses['admin_hesh'] = '';
        $CI->session->unset_userdata($ses);
        redirect('administration/login');
    }
    
    public function the_hesh()
    {
        $CI =& get_instance();
        $hesh = md5($CI->config->item('admin_pass').$_SERVER['REMOTE_ADDR'].'cigniter');
        return $hesh;
    }
    
    public function check_admin()
    {
        $CI=& get_instance();
        
        if(($CI->session->userdata('admin_logined') === 'yes') && ($CI->session->userdata('admin_hesh') === $this->the_hesh()))
        {
            return true;
        }
        else
        {
            redirect('administration/login');
        }
    }
}

?>