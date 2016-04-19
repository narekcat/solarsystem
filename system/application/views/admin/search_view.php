<div id="wrapper">
    <div id="content">

<p><strong>�� ������� "<?=$this->session->userdata('search_query')?>" �������:</strong></p>

<?php
for ($i = $msearch_results['start_from']; $i < $msearch_results['start_from'] + $msearch_results['limit']; $i++)
{
    if (isset($msearch_results[$i][0]))
    {
        $msearch_results[$i][1] = highlight_phrase($msearch_results[$i][1], $this->session->userdata('search_query'),'<span style="background:#FFFF66">','</span>');
        $msearch_results[$i][2] = highlight_phrase($msearch_results[$i][2], $this->session->userdata('search_query'),'<span style="background:#FFFF66">','</span>');

        print <<<HERE
        <table>
        <tr>

        <td align = "center">
        <p><a href = base_url()"/materials/{$msearch_results[$i][0]}"><img class="small_img" src="{$msearch_results[$i][3]}" width="45" height="45"></a></p>
        </td>

        <td align = "center">
        <p class = "anons_title"><a href = base_url()"/materials/{$msearch_results[$i][0]}">{$msearch_results[$i][1]}</a></p>
        <p class = "anons_text">�������: {$msearch_results[$i][4]}<br>
        ���������� ���������: {$msearch_results[$i][5]}</p>
        </td>

        </tr>
        </table>

        <p>{$msearch_results[$i][2]}</p>
        <div class="grey_line"></div>
        <div class="grey_line"></div>
HERE;
    }
}

echo $page_nav;
?>

<p><a href="#top">������</a></p>

    </div>
</div>
