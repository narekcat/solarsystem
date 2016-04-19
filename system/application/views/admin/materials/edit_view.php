<div id="wrapper">

    <div id="content">
    
<p><strong>Редактировать материал</strong></p>
<?=get_tinymce();?>

<form action = "<?=base_url()."materials/update/$material_id";?>" method="post">

<p>Название материала<br>
<input type="text" name="title" value="<?=set_value('title',$title);?>"><br>
<strong><?=form_error('title');?></strong>
</p>

<p>Мета-описание материала<br>
<input type="text" name="description" value="<?=set_value('description',$description);?>"><br>
<strong><?=form_error('description');?></strong>
</p>

<p>Ключевые слова<br>
<input type="text" name="keywords" value="<?=set_value('keywords',$keywords);?>"><br>
<strong><?=form_error('keywords');?></strong>
</p>

<p>Путь к мини-иконке для анонса<br>
<input type="text" name="small_img_url" value="<?=set_value('small_img_url',$small_img_url);?>"><br>
<strong><?=form_error('small_img_url');?></strong>
</p>

<p>Краткое описание<br>
<textarea name="short_text" cols="75" rows="7"><?=set_value('short_text',$short_text);?></textarea><br>
<a href="javascript:setup();">Использовать TinyMCE</a><br />
<strong><?=form_error('short_text');?></strong>
</p>

<p>Полный текст<br>
<textarea name="main_text" cols="75" rows="20"><?=set_value('main_text',$main_text);?></textarea><br>
<a href="javascript:setup();">Использовать TinyMCE</a><br />
<strong><?=form_error('main_text');?></strong>
</p>

<p>Дата добавления<br>
<input type="text" name="date" value = "<?=set_value('date',$date);?>"><br>
<strong><?=form_error('date');?></strong>
</p>

<p>Автор материала<br>
<input type="text" name="author" value="<?=set_value('author',$author);?>"><br>
<strong><?=form_error('author');?></strong>
</p>

<p>Категория материала<br>
<input type = "checkbox" name = "section[]" value = "articles" <?= populate($material_id,$names,'articles'); echo set_checkbox('section[]','articles');?>>Статьи, articles<br>

<input type = "checkbox" name = "section[]" value = "giant-planet" <?= populate($material_id,$names,'giant-planet'); echo set_checkbox('section[]','giant-planet')?>>Планеты-гиганты, giant-planet<br>

<input type = "checkbox" name = "section[]" value = "big-planet" <?= populate($material_id,$names,'big-planet'); echo set_checkbox('section[]','big-planet')?>>Большие планеты, big-planet<br>

<input type = "checkbox" name = "section[]" value = "sputnikofplanet" <?= populate($material_id,$names,'sputnikofplanet'); echo set_checkbox('section[]','sputnikofplanet')?>>Спутники планет, sputnikofplanet<br>

<input type = "checkbox" name = "section[]" value = "smallbody" <?= populate($material_id,$names,'smallbody'); echo set_checkbox('section[]','smallbody')?>>Малые тела, smallbody<br>

<input type = "checkbox" name = "section[]" value = "video" <?= populate($material_id,$names,'video'); echo set_checkbox('section[]','video')?>>Видеоуроки, video<br>

<strong><?=form_error('section[]');?></strong>
</p>

<p><input type = "submit" name = "update_button" value = "Обнавить  материал"></p>

</form>
    
<p><a href="#top">Наверх</a></p>

    </div>

</div>