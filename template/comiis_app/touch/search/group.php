<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<form class="searchform" method="post" autocomplete="off" action="search.php?mod=group">
    <input type="hidden" name="formhash" value="{FORMHASH}" />
    <!--{subtemplate search/pubsearch}-->
</form>
<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
<!--{subtemplate search/group_list}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->