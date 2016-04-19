<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_lib
{
    public function get_settings($id,$name,$total,$limit)
    {
        $config = array();
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo;Первая';
        $config['last_link'] = 'Последная&raquo;';
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        
        $config['full_tag_open'] = '<ul id="pagination">';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        
        switch ($id)
        {
            case 'section':
            $config['base_url'] = base_url().'sections/show/'.$name;
            $config['uri_segment'] = 4;
            $config['num_links'] = 2;
            
            return $config;
            break;
            
            case 'material_edit_list':
            $config['base_url'] = base_url().'materials/edit_list/';
            $config['uri_segment'] = 3;
            $config['num_links'] = 2;
            
            return $config;
            break;
            
            case 'material_delete':
            $config['base_url'] = base_url().'materials/delete/';
            $config['uri_segment'] = 3;
            $config['num_links'] = 2;
            
            return $config;
            break;
            
            case 'comment_edit_list':
            $config['base_url'] = base_url().'comments/edit_list';
            $config['uri_segment'] = 3;
            $config['num_links'] = 2;
            
            return $config;
            break;
            
            case 'comment_delete':
            $config['base_url'] = base_url().'comments/delete';
            $config['uri_segment'] = 3;
            $config['num_links'] = 2;
            
            return $config;
            break;
            
            case 'search':
            $config['base_url'] = base_url().'search/';
            $config['uri_segment'] = 2;
            $config['num_links'] = 2;
            
            return $config;
            break;
        }
    }
}

?>