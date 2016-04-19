<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration_model extends Model
{
    public $preferences_rules = array
    (
        array
        (
            'field' => 'admin_login',
            'label' => 'Логин',
            'rules' => 'alpha_dash|trim|required|max_length[50]'
        ),
        array
        (
            'field' => 'admin_pass',
            'label' => 'Пароль',
            'rules' => 'alpha_dash|trim|required|max_length[50]'
        ),
        array
        (
            'field' => 'user_per_page',
            'label' => 'Материалов на страницу',
            'rules' => 'required|numeric'
        ),
        array
        (
            'field' => 'admin_per_page',
            'label' => 'Материалов на страницу',
            'rules' => 'required|numeric'
        )
    );
    
    public $login_rules = array
    (
        array
        (
            'field' => 'login',
            'label' => 'Логин',
            'rules' => 'trim|required|alpha_dash|max_length[50]'
        ),
        array
        (
            'field' => 'pass',
            'label' => 'Пароль',
            'rules' => 'trim|required|alpha_dash|max_length[50]'
        )
    );
    
    public $search_rules = array
    (
        array
        (
            'field' => 'search',
            'label' => 'Поисковый запрос',
            'rules' => 'trim|required|min_length[3]|max_length[50]|xss_clean'
        )
    );
    
    public function __construct()
    {
        parent::Model();
        $this->get_preferences();
    }
    
    public function get_preferences()
    {
        $query = $this->db->get('preferences');
        $preferences = $query->result_array();
        
        foreach($preferences as $item)
        {
            $val = $item['value'];
            if(is_numeric($val))
            {
                settype($val,"int");
            }
            $this->config->set_item($item['pref_id'],$val);
        }
    }
    
    public function get_archive()
    {
        $sql = "SELECT DISTINCT left(date, 7) AS month FROM materials ORDER BY month DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function archive_by_month($url_month)
    {
        $this->db->like('date',$url_month,'both');
        $this->db->order_by('material_id','desc');
        $query = $this->db->get('materials');
        return $query->result_array();
    }
    
    public function feeds_info()
    {
        $this->db->order_by('material_id','desc');
        $this->db->limit(20);
        $query = $this->db->get('materials');
        return $query->result_array();
    }
    
    public function materials_search($search,$limit,$start_from)
    {
        $query = $this->db->get('materials');
        $all_materials = $query->result_array();
        
        $i = -1;
        
        $total_result = array();
        
        foreach($all_materials as $material)
        {
            $material['main_text'] = strip_tags($material['main_text']);
            $length = strlen($material['main_text']);
            $position = stripos($material['main_text'],$this->session->userdata['search_query']);
            
            if($position !== FALSE)
            {
                $i++;
                $begin_from = $position - $length-100;
                $material['main_text'] = substr($material['main_text'],$begin_from,250);
                
                $total_result[$i][0] = $material['material_id'];
                $total_result[$i][1] = $material['title'];
                $total_result[$i][2] = $material['main_text'];
                $total_result[$i][3] = $material['small_img_url'];
                $total_result[$i][4] = $material['author'];
                $total_result[$i][5] = $material['count_views'];
                $total_result['counter'] = $i+1;
            }
        }
        
        $msearch_results = array();
        
        for($i=$start_from;$i<$start_from+$limit;$i++)
        {
            if(isset($total_result[$i][0]))
            {
                $msearch_results[$i][0] = $total_result[$i][0];
                $msearch_results[$i][1] = $total_result[$i][1];
                $msearch_results[$i][2] = $total_result[$i][2];
                $msearch_results[$i][3] = $total_result[$i][3];
                $msearch_results[$i][4] = $total_result[$i][4];
                $msearch_results[$i][5] = $total_result[$i][5];
                
                $msearch_results['counter'] = $total_result['counter'];
                $msearch_results['start_from'] = $start_from;
                $msearch_results['limit'] = $limit;
            }
        }
        return $msearch_results;
    }
    
}

?>