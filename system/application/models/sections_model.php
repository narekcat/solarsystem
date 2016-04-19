<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sections_model extends Crud
{
    public $table = 'sections';
    public $idkey = 'section_id';
    
    public $add_rules = array
    (
        array
        (
            'field' => 'section_id',
            'label' => 'Идентификатор катергории',
            'rules' => 'trim|required|alpha_desh|max_length[100]'
        ),
        array
        (
            'field' => 'title',
            'label' => 'Название катергории',
            'rules' => 'required|max_length[100]'
        ),
        array
        (
            'field' => 'description',
            'label' => 'Мета-описание катергории',
            'rules' => 'required|max_length[250]'
        ),
        array
        (
            'field' => 'keywords',
            'label' => 'Ключевые слова',
            'rules' => 'required|max_length[250]'
        ),
        array
        (
            'field' => 'main_text',
            'label' => 'Краткое описание катергории',
            'rules' => 'required'
        )
    );
    
    public $update_rules = array
    (
        array
        (
            'field' => 'title',
            'label' => 'Название катергории',
            'rules' => 'required|max_length[100]'
        ),
        array
        (
            'field' => 'description',
            'label' => 'Мета-описание катергории',
            'rules' => 'required|max_length[250]'
        ),
        array
        (
            'field' => 'keywords',
            'label' => 'Ключевые слова',
            'rules' => 'required|max_length[250]'
        ),
        array
        (
            'field' => 'main_text',
            'label' => 'Краткое описание катергории',
            'rules' => 'required'
        )
    );    
    
    public function get_all()
    {
        $query = $this->db->get('sections');
        return $query->result_array();
    }
}

?>