<div id="wrapper">

    <div id="content">
<h2><?=$main_info['title'];?></h2>
<p><?=$main_info['main_text'];?></p>

<?php foreach($materials_list as $item):?>
<table>
<tr>
<td align="center">
<p><a href="<?=base_url()."materials/$item[material_id]";?>">
<img class="small_img" src="<?=$item['small_img_url'];?>" 
width="45" height="45" alt="<?=$item['title'];?>"></a></p>
</td>

<td align="center">

<p class="anons_title"><a href="<?=base_url()."materials/$item[material_id]";?>">
<?=$item['title'];?></a></p>

<p class="anons_text">
Добавил:<?=$item['author']?><br />
Просмотров материала:<?=$item['count_views']?></p>
</td>
</tr>
</table>

<p><?=$item['short_text'];?></p>
<div class="grey_line"></div>

<?php endforeach; ?>

<?= $page_nav; ?>
 
<p><a href="#top">Наверх</a></p> 
    </div>

</div>