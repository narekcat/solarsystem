<div id="wrapper">

    <div id="content">
    
<p><strong>������������� ��������</strong></p>
<?=get_tinymce();?>

<form action = "<?=base_url()."materials/update/$material_id";?>" method="post">

<p>�������� ���������<br>
<input type="text" name="title" value="<?=set_value('title',$title);?>"><br>
<strong><?=form_error('title');?></strong>
</p>

<p>����-�������� ���������<br>
<input type="text" name="description" value="<?=set_value('description',$description);?>"><br>
<strong><?=form_error('description');?></strong>
</p>

<p>�������� �����<br>
<input type="text" name="keywords" value="<?=set_value('keywords',$keywords);?>"><br>
<strong><?=form_error('keywords');?></strong>
</p>

<p>���� � ����-������ ��� ������<br>
<input type="text" name="small_img_url" value="<?=set_value('small_img_url',$small_img_url);?>"><br>
<strong><?=form_error('small_img_url');?></strong>
</p>

<p>������� ��������<br>
<textarea name="short_text" cols="75" rows="7"><?=set_value('short_text',$short_text);?></textarea><br>
<a href="javascript:setup();">������������ TinyMCE</a><br />
<strong><?=form_error('short_text');?></strong>
</p>

<p>������ �����<br>
<textarea name="main_text" cols="75" rows="20"><?=set_value('main_text',$main_text);?></textarea><br>
<a href="javascript:setup();">������������ TinyMCE</a><br />
<strong><?=form_error('main_text');?></strong>
</p>

<p>���� ����������<br>
<input type="text" name="date" value = "<?=set_value('date',$date);?>"><br>
<strong><?=form_error('date');?></strong>
</p>

<p>����� ���������<br>
<input type="text" name="author" value="<?=set_value('author',$author);?>"><br>
<strong><?=form_error('author');?></strong>
</p>

<p>��������� ���������<br>
<input type = "checkbox" name = "section[]" value = "articles" <?= populate($material_id,$names,'articles'); echo set_checkbox('section[]','articles');?>>������, articles<br>

<input type = "checkbox" name = "section[]" value = "giant-planet" <?= populate($material_id,$names,'giant-planet'); echo set_checkbox('section[]','giant-planet')?>>�������-�������, giant-planet<br>

<input type = "checkbox" name = "section[]" value = "big-planet" <?= populate($material_id,$names,'big-planet'); echo set_checkbox('section[]','big-planet')?>>������� �������, big-planet<br>

<input type = "checkbox" name = "section[]" value = "sputnikofplanet" <?= populate($material_id,$names,'sputnikofplanet'); echo set_checkbox('section[]','sputnikofplanet')?>>�������� ������, sputnikofplanet<br>

<input type = "checkbox" name = "section[]" value = "smallbody" <?= populate($material_id,$names,'smallbody'); echo set_checkbox('section[]','smallbody')?>>����� ����, smallbody<br>

<input type = "checkbox" name = "section[]" value = "video" <?= populate($material_id,$names,'video'); echo set_checkbox('section[]','video')?>>����������, video<br>

<strong><?=form_error('section[]');?></strong>
</p>

<p><input type = "submit" name = "update_button" value = "��������  ��������"></p>

</form>
    
<p><a href="#top">������</a></p>

    </div>

</div>