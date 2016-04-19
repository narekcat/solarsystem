<div id="leftblock">
<table>

<tr>
<td class="tdview">
<h2 class="sidebartitle">Свежие материалы</h2>
</td>
</tr>

<tr>
<td>

<? foreach($latest_materials as $item):?>
<p><a href="<?=base_url()."materials/$item[material_id]";?>">
<?=$item['title'];?></a></p>
<? endforeach; ?>

</td>
</tr>

<tr>
<td class="tdview">
<h2 class="sidebartitle">RSS-подписка</h2>
</td>
</tr>

<tr>
<td>
<p style="text-align: center;">Новые материалы через RSS</p>
</td>
</tr>

<tr>
<td>
<center>
<a href="<?=base_url();?>rss/"><img alt="RSS-лента" src="<?=base_url();?>img/icon_rss.png"/></a>
</center>

<p style="text-align: center;"><a href="<?=base_url();?>rss/">Подписатся!</a></p>

</td>
</tr>

</table>
<br />
<br />
<!--LiveInternet counter-->
<script type="text/javascript">
<!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t17.17;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
//-->
</script>
<!--/LiveInternet-->

</div>