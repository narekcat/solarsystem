<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends Crud
{
    public $table = 'pages';
    public $idkey = 'page_id';
    
    public $add_rules = array
    (
        array
        (
            'field' => 'page_id',
            'label' => 'Идентификатор страницы',
            'rules' => 'trim|required|alpha_dash|max_length[100]'
        ),
        array
        (
            'field' => 'title',
            'label' => 'Название страницы',
            'rules' => 'required|max_length[100]'
        ),
        array
        (
            'field' => 'description',
            'label' => 'Мета-описание страницы',
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
            'label' => 'Основное содержание страницы',
            'rules' => 'required'
        )
    );
    
    public $update_rules = array
    (
        array
        (
            'field' => 'title',
            'label' => 'Название страницы',
            'rules' => 'required|max_length[100]'
        ),
        array
        (
            'field' => 'description',
            'label' => 'Мета-описание страницы',
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
            'label' => 'Основное содержание страницы',
            'rules' => 'required'
        )
    );    
    
    public $contact_rules = array
    (
        array
        (
            'field' => 'name',
            'label' => 'Имя',
            'rules' => 'trim|required|xss_clean|max_length[70]'
        ),
        array
        (
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'trim|required|valid_email|xss_clean|max_length[70]'
        ),
        array
        (
            'field' => 'topic',
            'label' => 'Тема сообшения',
            'rules' => 'required|xss_clean|max_length[70]'
        ),
        array
        (
            'field' => 'message',
            'label' => 'Текст сообшения',
            'rules' => 'required|xss_clean|max_length[5000]'
        ),
        array
        (
            'field' => 'captcha',
            'label' => 'Цифры с картинки',
            'rules' => 'required|numeric|exact_length[5]'
        )
    );
    
    public function get_all()
    {
        $query = $this->db->get('pages');
        return $query->result_array();
    }
}

?>