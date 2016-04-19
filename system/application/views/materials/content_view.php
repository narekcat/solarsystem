<div id="wrapper">

    <div id="content">
    
<h3 style="color: red;"><?=$fail_captcha;?></h3>
<h3 style="color: #0000A0;"><?=$success_comment;?></h3>    
    
<h2><?=$main_info['title'];?></h2>
<p><?=$main_info['main_text'];?></p>

<p><strong>Добавить комментарий:</strong></p>

<form action="<?=base_url()."comments/add/$main_info[material_id]";?>" method="post">

<p>Ваше имя<br />
<input type="text" name="author" value="<?=set_value('author')?>" /><br />
<strong><?=form_error('author');?></strong>
</p>

<p>Текст комментария<br />
<textarea name="comment_text" id="comment_text"  cols="50" rows="10">
<?=set_value('comment_text')?></textarea><br />
<strong><?=form_error('comment_text');?></strong>
</p>

<div class="smile"><?=$smiley_table;?></div>

<a name="captcha"></a>
<p>Введите цифры с картинки:</p>
<p><?=$imgcode;?></p>
<p><input type="text" name="captcha" size="10" /><br />
<strong><?=form_error('captcha');?></strong>
</p>

<input name="material_id" type="hidden" value="<?=$main_info['material_id']?>" />
<p><input type="submit" name="post_comment" value="Комментировать" /></p>
</form>

<a name="new_comment"></a>

<?php foreach($comments_list as $item):?>
<div class="comment">
<p class="comment">Дата: <?=$item['date'];?><br />
<strong><?=$item['author'];?></strong></p>
<?=$item['comment_text'];?>
</div>
<?php endforeach;?>
 
<p><a href="#top">Наверх</a></p> 
    </div>

</div>