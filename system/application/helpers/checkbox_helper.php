<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function populate($material_id,$names,$section_name)
{
    switch($section_name)
    {
        case 'articles':
        for ($i=0;$i<1;$i++)
        {
            $cname = 'section'.$i;
            if($names[$cname] == 'articles')
            {
                echo 'checked';
            }
        }
        break;
        
        case 'giant-planet':
        for ($i=0;$i<2;$i++)
        {
            $cname = 'section'.$i;
            if($names[$cname] == 'giant-planet')
            {
                echo 'checked';
            }
        }
        break;
        
        case 'big-planet':
        for ($i=0;$i<3;$i++)
        {
            $cname = 'section'.$i;
            if($names[$cname] == 'big-planet')
            {
                echo 'checked';
            }
        }
        break;
        
        case 'sputnikofplanet':
        for ($i=0;$i<4;$i++)
        {
            $cname = 'section'.$i;
            if($names[$cname] == 'sputnikofplanet')
            {
                echo 'checked';
            }
        }
        break;
        
        case 'smallbody':
        for ($i=0;$i<5;$i++)
        {
            $cname = 'section'.$i;
            if($names[$cname] == 'smallbody')
            {
                echo 'checked';
            }
        }
        break;
        
        case 'video':
        for ($i=0;$i<6;$i++)
        {
            $cname = 'section'.$i;
            if($names[$cname] == 'video')
            {
                echo 'checked';
            }
        }
        break;
    }
}

?>