<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:53
//Identify: cb4e919aa577a5fea1d44e60ea782c6d

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(($op == 'manual')) { ?>	
<?php if($ra) { ?>
<li id="<?php echo $ra['aid'];?>" class="mysclist_li b_b">
<a href="javascript:;" onclick="delarticle(<?php echo $ra['aid'];?>);" class="f_d y"><i class="comiis_font">&#xe647</i></a>
<a href="javascript:;" onclick="downarticle(<?php echo $ra['aid'];?>);" class="f_d y"><i class="comiis_font">&#xe600</i></a>
<a href="javascript:;" onclick="uparticle(<?php echo $ra['aid'];?>);" class="f_d y"><i class="comiis_font">&#xe67a</i></a>			
<h2 class="f_b"><?php echo $ra['title'];?></h2>
</li>
<?php } ?>	
<?php } elseif(($op == 'get')) { if(is_array($articlelist)) foreach($articlelist as $list) { ?><li id="<?php echo $list['aid'];?>" class="mysclist_li b_b">
<a href="javascript:;" onclick="delarticle(<?php echo $list['aid'];?>);" class="f_d y"><i class="comiis_font">&#xe647</i></a>
<a href="javascript:;" onclick="downarticle(<?php echo $list['aid'];?>);" class="f_d y"><i class="comiis_font">&#xe600</i></a>
<a href="javascript:;" onclick="uparticle(<?php echo $list['aid'];?>);" class="f_d y"><i class="comiis_font">&#xe67a</i></a>			
<h2 class="f_b"><?php echo $list['title'];?></h2>
</li>
<?php } } elseif(($op == 'search')) { if(is_array($articlelist)) foreach($articlelist as $list) { ?><input type="checkbox" name="article" id="article_<?php echo $list['aid'];?>_pc" value="<?php echo $list['aid'];?>" onclick="getarticlenum();"/>
<label for="article_<?php echo $list['aid'];?>_pc" class="b_b"><i class="comiis_font f_d">&#xe643</i><span id="article_<?php echo $list['aid'];?>" class="f_b"><?php echo $list['title'];?></span></label>
<?php } } elseif(($op == 'add')) { if(is_array($articlelist)) foreach($articlelist as $ra) { ?><li id="raid_li_<?php echo $ra['aid'];?>" class="mysclist_li b_t">
<input type="hidden" name="raids[]" value="<?php echo $ra['aid'];?>">
<a href="javascript:;" class="f_d y" onclick="raid_delete(<?php echo $ra['aid'];?>);"><i class="comiis_font">&#xe647</i></a>
<h2><a href="<?php echo fetch_article_url($ra);; ?>" class="f_b"><?php echo $ra['title'];?></a></h2>
</li>
<?php } } else { ?>
<li class="comiis_styli comiis_flex b_b cl">
<div class="styli_tit comiis_input_style f_c">
<div class="comiis_login_select comiis_inner b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe620</i>
<span class="z">
<span class="comiis_question f_c" id="searchcate_name"></span>
</span>					
</span>
<?php echo $category;?>
</div>
</div>
<div class="flex"><input type="text" name="searchkey" id="searchkey" value="<?php echo $searchkey;?>" class="comiis_input b_b" style="padding:4px 0;" /></div>
<div class="styli_r"><button type="button" name="search_button" value="false" onclick="articlesearch();" class="comiis_sendbtn bg_0 f_f"><?php echo $comiis_lang['tip129'];?></button></div>
</li>
<li class="comiis_styli comiis_flex b_b cl">
<div class="styli_tit f_c">
<?php echo $comiis_lang['tip130'];?>:
</div>
<div class="flex"><input type="text" name="manualid" id="manualid" value="0" class="comiis_input b_b" style="padding:4px 0;" /></div>
<div class="styli_r"><button type="button" name="raid_button" value="false" onclick="manualadd();" class="comiis_sendbtn bg_0 f_f"><?php echo $comiis_lang['all42'];?></button></div>
</li>
<li id="chkalldiv" class="comiis_input_style">
<div class="comiis_stylitit b_b bg_e f_c cl">
<span class="y"><?php echo $comiis_lang['tip131'];?> <span id="articlenum">0</span>/<span id="articlenumall"><?php echo $count;?></span> <?php echo $comiis_lang['tip132'];?></span>
<input type="checkbox" name="chkall" id="chkall" value="" onclick="selectall();">
<label for="chkall"><i class="comiis_font f_d">&#xe643</i><?php echo $comiis_lang['tip133'];?></label><br>
</div>	
<ul id="articlelist" class="bartl"><?php if(is_array($articlelist)) foreach($articlelist as $list) { ?><input type="checkbox" name="article" id="article_<?php echo $list['aid'];?>_pc" value="<?php echo $list['aid'];?>" onclick="getarticlenum();"/>
<label for="article_<?php echo $list['aid'];?>_pc" class="b_b"><i class="comiis_font f_d">&#xe643</i><span id="article_<?php echo $list['aid'];?>" class="f_b"><?php echo $list['title'];?></span></label>
<?php } ?>
</ul>
</li>
<li class="comiis_btnbox cl">
<button name="choosebutton" class="comiis_btn bg_c f_f" onclick="choosearticle();"><?php echo $comiis_lang['post20'];?></button>
</li>
<li class="comiis_stylitit b_t b_b bg_e f_c cl"><span class="y"><?php echo $comiis_lang['view36'];?> (<span id="selectednum" class="f_0">0</span>)</span><?php echo $comiis_lang['tip134'];?></li>	
<ul id="selectedarticle" class="comiis_mysclist comiis_post_xgwz bartl"></ul>
<li class="comiis_btnbox cl">
<input type="hidden" id="selectedarray" name="selectedarray" value="" />
<?php if($_GET['update']) { ?>
<input type="hidden" id="update" name="update" value="1" />
<?php } ?>
<button type="submit" name="dsf" onclick="addrelatearticle();" class="comiis_btn bg_0 f_f"><?php echo $comiis_lang['all8'];?></button>
</li>
<script>
function articlesearch() {
var searchkey = document.getElementById('searchkey').value;
var searchcate = document.getElementById('searchcate').value;
var url = 'portal.php?mod=portalcp&ac=related&op=search&catid=<?php echo $catid;?>&aid=<?php echo $aid;?>&inajax=1&searchcate=' + searchcate;
$.ajax({
type:'POST',
url: url,
data: "searchkey=" + searchkey,
dataType:'xml',
}).success(function(s) {
s = trim(s.lastChild.firstChild.nodeValue);
if(s) {
document.getElementById('articlelist').innerHTML = s;
getarticlenum();
} else {
document.getElementById('articlelist').innerHTML = '';
getarticlenum();
return false;
}	
});		
}
function getarticlenum() {
var article = document.getElementsByName("article");
for(var i = 0, j = 0; i < article.length; i++){
if(article[i].checked) {
j++;
}
}
document.getElementById('articlenum').innerHTML = j;
document.getElementById('articlenumall').innerHTML = article.length;
}
function manualadd() {
var manualid = document.getElementById('manualid').value;
if(document.getElementById(manualid)) {
popup.open('<?php echo $comiis_lang['tip135'];?>', 'alert');
return false;
}
var url = 'portal.php?mod=portalcp&ac=related&op=manual&catid=<?php echo $catid;?>&aid=<?php echo $aid;?>&inajax=1&manualid='+manualid;
$.ajax({
type:'GET',
url: url,
dataType:'xml',
}).success(function(s) {
s = trim(s.lastChild.firstChild.nodeValue);
if(s) {
document.getElementById('selectedarticle').innerHTML += s;
updatearticlearray();
} else {
popup.open('<?php echo $comiis_lang['tip136'];?>', 'alert');
return false;
}	
});
}
function updatearticlearray() {
var list = document.getElementById("selectedarticle").getElementsByTagName("li");
var str = '';
for(var i = 0; i < list.length; i++){
if(str == '') {
str = list[i].id;
} else {
str = str + ',' + list[i].id;
}

}
document.getElementById('selectedarray').value = str;
document.getElementById('selectednum').innerHTML = list.length;
}
function selectall() {
var input = document.getElementById("chkalldiv").getElementsByTagName("input");
var checkall = 'chkall';
count = 0;
for(var i = 0; i < input.length; i++) {
var e = input[i];
if(e.name && e.name != checkall) {
e.checked = input[checkall].checked;
if(e.checked) {
count++;
}
}
}
comiis_input_style();
return count;
}	
function choosearticle() {
var article = document.getElementsByName("article");
for(var i = 0; i < article.length; i++){
if(article[i].checked) {
var choosed = document.getElementById("article_"+article[i].value).innerHTML;
choosed ='<li id="'+article[i].value+'" class="mysclist_li b_b"><a href="javascript:;" onclick="delarticle('+article[i].value+');" class="f_d y"><i class="comiis_font">&#xe647</i></a><a href="javascript:;" onclick="downarticle('+article[i].value+');" class="f_d y"><i class="comiis_font">&#xe600</i></a><a href="javascript:;" onclick="uparticle('+article[i].value+');" class="f_d y"><i class="comiis_font">&#xe67a</i></a><h2>'+choosed+'</h2></li>';
if(!document.getElementById(article[i].value)) {
document.getElementById("selectedarticle").innerHTML += choosed;
}
}
}
updatearticlearray();
}
function addrelatearticle() {
var relatedid = document.getElementById("selectedarray").value;
if(relatedid) {
var url = 'portal.php?mod=portalcp&ac=related&op=add&catid=<?php echo $catid;?>&aid=<?php echo $aid;?>&inajax=1&relatedid='+relatedid;
if(document.getElementById('update')) {
url += '&update=1';
}
$.ajax({
type:'GET',
url: url,
dataType:'xml',
}).success(function(s) {
s = trim(s.lastChild.firstChild.nodeValue);
if(s) {
document.getElementById('raid_div').innerHTML = s;
}
});
} else {
document.getElementById('raid_div').innerHTML = '';
}
comiis_fmenu('#comiis_related_article');
}
function uparticle(id) {
var lastid = getdivid(id, 'last');
if(lastid) {
var lastdiv = document.getElementById(lastid);
var div = document.getElementById(id);
document.getElementById("selectedarticle").insertBefore(div,lastdiv);
}
updatearticlearray();
}
function downarticle(id) {
var nextid = getdivid(id, 'next');
if(nextid) {
var nextdiv = document.getElementById(nextid);
var div = document.getElementById(id);
document.getElementById("selectedarticle").insertBefore(nextdiv,div);
}
updatearticlearray();
}
function delarticle(id) {
var div = document.getElementById(id);
div.parentNode.removeChild(div);
updatearticlearray();
}
function getdivid(id,type) {
var str = document.getElementById('selectedarray').value;
var arr = new Array();
var rstr = '';
arr = str.split(",");
for (var i = 0; i < arr.length; i++) {
if (arr[i] == id) {
if(type == 'last') {
if(arr[i-1]) {
rstr = arr[i-1];
}
} else if(type == 'next') {
if(arr[i+1]) {
rstr = arr[i+1];
}
}
break;
}
}
return rstr;
}
function getrelatedarticle() {
var input = document.getElementById("raid_div").getElementsByTagName("input");
if(input) {
var id = '';
for(var i = 0;i < input.length;i++){
if(id) {
id = id + ',' + input[i].value;
} else {
id = input[i].value;
}
}
if(id != '') {
var url = 'portal.php?mod=portalcp&ac=related&op=get&catid=<?php echo $catid;?>&aid=<?php echo $aid;?>&inajax=1&id='+id;
$.ajax({
type:'GET',
url: url,
dataType:'xml',
}).success(function(s) {
s = trim(s.lastChild.firstChild.nodeValue);
if(s) {
document.getElementById("selectedarray").value = id;
document.getElementById('selectedarticle').innerHTML = s;
document.getElementById('selectednum').innerHTML = input.length;
}
});
}
} else {
return true;
}
}
function trim(str) {
return (str + '').replace(/(\s+)$/g, '').replace(/^\s+/g, '');
}
</script>
<?php } ?>