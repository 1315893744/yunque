<?PHP exit('Access Denied');?>
<!--{eval $comiis_bg = 1;}-->
<!--{template common/header}-->
<form class="searchform" method="post" autocomplete="off" action="search.php?mod=album">
    <input type="hidden" name="formhash" value="{FORMHASH}" />
    <!--{subtemplate search/pubsearch}-->
</form>
<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
    <!--{subtemplate search/album_list}-->
<!--{/if}-->	
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->