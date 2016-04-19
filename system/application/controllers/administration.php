<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration extends Controller
{
    public function index()
    {
        $this->auth_lib->check_admin();

        $this->load->model('comments_model');
        $this->load->model('pages_model');
        $this->load->model('sections_model');

        $data= array();
        $data['materials_count'] = $this->materials_model->count_all();
        $data['pages_count'] = $this->pages_model->count_all();
        $data['sections_count'] = $this->sections_model->count_all();
        $data['comments_count'] = $this->comments_model->count_all();
        $data['popular_materials'] = $this->materials_model->get_popular();
        $data['latest_comments'] = $this->comments_model->get_latest();

        $name='main_admin';
        $this->display_lib->admin_page($data,$name);

    }

    public function archive()
    {
        $url_month = $this->uri->segment(2);
        if(strlen($url_month) != 7)
        {
            redirect(base_url());
        }
        else
        {
            $data = array();
            $data['latest_materials'] = $this->materials_model->get_latest();
            $data['popular_materials'] = $this->materials_model->get_popular();
            $data['archive_list'] = $this->administration_model->get_archive();
            $data['url_month'] = $url_month;
            $data['archive_result'] = $this->administration_model->archive_by_month($url_month);
            if(!$data['archive_result'])
            {
                redirect(base_url());
            }
            else
            {
                $name = 'admin/archive';
                $this->display_lib->user_info_page($data,$name);
            }
        }
    }

    public function preferences()
    {
        $this->auth_lib->check_admin();
        if(isset($_POST['save_button']))
        {
            $this->form_validation->set_rules($this->administration_model->preferences_rules);
            if($this->form_validation->run() == TRUE)
            {
                $data = array();
                $data['user_per_page'] = $this->input->post('user_per_page');
                $data['admin_per_page'] = $this->input->post('admin_per_page');
                $data['admin_login'] = $this->input->post('admin_login');
                $data['admin_pass'] = $this->input->post('admin_pass');
                $data['search_per_page'] = $this->input->post('search_per_page');

                foreach($data as $key => $value)
                {
                    $this->db->where('pref_id',$key);
                    $this->db->update('preferences',array('value' => $value));
                }

                $data = array ('info' => 'Настройки сохранены');
                $this->display_lib->admin_info_page($data);
            }
            else
            {
                $name= 'preferences';
                $this->display_lib->admin_page($data = array(),$name);
            }
        }
        else
        {
            $name= 'preferences';
            $this->display_lib->admin_page($data = array(),$name);
        }
    }


    public function login()
    {
        $this->form_validation->set_rules($this->administration_model->login_rules);
        if($this->form_validation->run() == FALSE)
        {
            $this->display_lib->login_page();
        }
        else
        {
            $this->auth_lib->do_login($this->input->post('login'),$this->input->post('pass'));
        }
    }

    public function logout()
    {
        $this->auth_lib->check_admin();
        $this->auth_lib->do_logout();
    }

    public function rss()
    {
        $data = array('feeds' => $this->administration_model->feeds_info());
        $this->load->view('rss_view',$data);
    }

    public function search($start_from = 0)
    {
        $this->load->library('pagination');
        $this->load->library('pagination_lib');
        $this->load->helper('text');

        $data = array();
        $data['latest_materials'] = $this->materials_model->get_latest();
        $data['archive_list'] = $this->administration_model->get_archive();
        $data['popular_materials'] = $this->materials_model->get_popular();

        $limit = $this->config->item('search_per_page');

        if(isset($_POST['search_button']))
        {
            $this->form_validation->set_rules($this->administration_model->search_rules);
            $val_res = $this->form_validation->run();

            $ses_search = array();
            $ses_search['val_passed'] ='';
            $ses_search['search_query'] ='';
            $this->session->set_userdata($ses_search);

            if($val_res == TRUE)
            {
                $search = $this->input->post('search',TRUE);
                $search = htmlspecialchars($search);

                $ses_search = array();
                $ses_search['val_passed'] ='yes';
                $ses_search['search_query'] =$search;
                $this->session->set_userdata($ses_search);

                $msearch_results = $this->administration_model->materials_search($search,$limit,$start_from);

                if(empty($msearch_results))
                {
                    $data['info'] = 'Инфармация по Вашему запросу не найдена';
                    $name = 'info';
                    $this->display_lib->user_info_page($data,$name);
                }
                else
                {
                    $total = $msearch_results['counter'];
                    $settings = $this->pagination_lib->get_settings('search','',$total,$limit);
                    $this->pagination->initialize($settings);

                    $data['msearch_results'] = $msearch_results;
                    $data['page_nav'] = $this->pagination->create_links();

                    $name = 'admin/search';
                    $this->display_lib->user_info_page($data,$name);
                }
            }
            else
            {
                $data['info'] = 'Неверные параметры поиска';
                $name = 'info';
                $this->display_lib->user_info_page($data,$name);
            }
        }
        else
        {
            if($this->session->userdata('val_passed') === 'yes')
            {
                $search = $this->session->userdata('search_query');
                $msearch_results = $this->administration_model->materials_search($search,$limit,$start_from);

                if(empty($msearch_results))
                {
                    $data['info'] = 'Инфармация по Вашему запросу не найдена';
                    $name = 'info';
                    $this->display_lib->user_info_page($data,$name);
                }
                else
                {
                    $total = $msearch_results['counter'];
                    $settings = $this->pagination_lib->get_settings('search','',$total,$limit);
                    $this->pagination->initialize($settings);

                    $data['msearch_results'] = $msearch_results;
                    $data['page_nav'] = $this->pagination->create_links();

                    $name = 'admin/search';
                    $this->display_lib->user_info_page($data,$name);
                }
            }
            else
            {
                $data['info'] = 'Неверные параметры поиска';
                $name = 'info';
                $this->display_lib->user_info_page($data,$name);
            }
        }
    }

}

?>
