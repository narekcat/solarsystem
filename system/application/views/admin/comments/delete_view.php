<div id="wrapper">

    <div id="content">

<p><strong>Удалить комментарий</strong></p>

<form action="<?=base_url();?>comments/delete" method="post">

<?php foreach($comments_list as $item):?>

<table>
<tr>
<td><p><?="<input name='comment_id' type='radio' value='$item[comment_id]'>";?></p>
</td>
<td><p><?=$item['comment_text'];?></p>
</td>
</tr>
</table>
<div class="gray_line"></div>

<?php endforeach; ?>

<p><input type="submit" name="delete_button" value="Удалить комментарий" /></p>
</form>

<?= $page_nav; ?>

<p><a href="#top">Наверх</a></p>

    </div>

</div>