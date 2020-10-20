<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:25
//Identify: dfc9492f324c7938f96b286981f13611

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<script type="text/javascript">
var warning_time, forum_optionlist = '<?php if($forum_optionlist) { echo str_replace('encoding="'.CHARSET.'"', 'encoding="utf-8"', $forum_optionlist);; } else { echo str_replace('encoding="'.CHARSET.'"', 'encoding="utf-8"', getsortedoptionlist());; } ?>';
function warning(identifier, text){
clearTimeout(warning_time);
$('.comiis_post_sort li').removeClass('comiis_list_tip');
$("#comiis_list_" + identifier).addClass('comiis_list_tip')
popup.open(text, 'alert');
warning_time = setTimeout(function() {
$("#comiis_list_" + identifier).removeClass('comiis_list_tip');
}, 3000);
}
function mb_strlen(str) {
var len = 0;
for(var i = 0; i < str.length; i++) {
len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
}
return len;
}
function checkoption(identifier, required, checktype, checkmaxnum, checkminnum, checkmaxlength) {
if(checktype == 'select') {
var select_redata = 0;
if($('#comiis_select_' + identifier).length > 0) {
select_redata = $('#comiis_select_' + identifier).val();
}else if($('#typeoption_' + identifier).length > 0) {
select_redata = $('#typeoption_' + identifier).val();
}
if(select_redata == 0){
if(required != '0'){
warning(identifier, '<?php echo $comiis_lang['tip58'];?>');
return false;			
}else if(required == '0'){
warning(identifier, '<?php echo $comiis_lang['tip59'];?>');
return true;
}
}
return true;
}
if(checktype == 'radio' || checktype == 'checkbox') {
var nodes = document.getElementById('select_' + identifier).getElementsByTagName('INPUT');
var nodechecked = false;
for(var i=0; i<nodes.length; i++) {
if(nodes[i].checked) {
nodechecked = true;
}
}
if(!nodechecked && required != '0') {
warning(identifier, '<?php echo $comiis_lang['tip60'];?>');
return false;
}
return true;
}
if(checktype == 'image') {
var checkvalue = document.getElementById('sortaid_' + identifier).value;
} else {
var checkvalue = document.getElementById('typeoption_' + identifier).value;
}
if(required != '0') {
if(checkvalue == '') {
warning(identifier, '<?php echo $comiis_lang['tip58'];?>');
return false;
}
}
if(checkvalue) {
if(checktype == 'email' && !(/^[\-\.\w]+@[\.\-\w]+(\.\w+)+$/.test(checkvalue))) {
warning(identifier, '<?php echo $comiis_lang['tip61'];?>');
return false;
} else if((checktype == 'text' || checktype == 'textarea') && checkmaxlength != '0' && mb_strlen(checkvalue) > checkmaxlength) {
warning(identifier, '<?php echo $comiis_lang['tip62'];?>');
return false;
} else if((checktype == 'number' || checktype == 'range')) {
if(isNaN(checkvalue)) {
warning(identifier, '<?php echo $comiis_lang['tip63'];?>');
return false;
} else if(checkmaxnum != '0' && parseInt(checkvalue) > parseInt(checkmaxnum)) {
warning(identifier, '<?php echo $comiis_lang['tip64'];?>');
return false;
} else if(checkminnum != '0' && parseInt(checkvalue) < parseInt(checkminnum)) {
warning(identifier, '<?php echo $comiis_lang['tip65'];?>');
return false;
}
} else if(checktype == 'url' && !(/(http[s]?|ftp):\/\/[^\/\.]+?\..+\w[\/]?$/i.test(checkvalue))) {
warning(identifier, '<?php echo $comiis_lang['tip66'];?>');
return false;
}
}
return true;
}
function xmlobj() {
var obj = new Object();
obj.createXMLDoc = function(xmlstring) {
var xmlobj = false;
if(window.DOMParser && document.implementation && document.implementation.createDocument) {
try{
var domparser = new DOMParser();
xmlobj = domparser.parseFromString(xmlstring, 'text/xml');
} catch(e) {
}
} else if(window.ActiveXObject) {
var versions = ["MSXML2.DOMDocument.5.0", "MSXML2.DOMDocument.4.0", "MSXML2.DOMDocument.3.0", "MSXML2.DOMDocument", "Microsoft.XmlDom"];
for(var i=0; i<versions.length; i++) {
try {
xmlobj = new ActiveXObject(versions[i]);
if(xmlobj) {
xmlobj.async = false;
xmlobj.loadXML(xmlstring);
}
} catch(e) {}
}
}
return xmlobj;
};
obj.xml2json = function(xmlobj, node) {
var nodeattr = node.attributes;
if(nodeattr != null) {
if(nodeattr.length && xmlobj == null) {
xmlobj = new Object();
}
for(var i = 0;i < nodeattr.length;i++) {
xmlobj[nodeattr[i].name] = nodeattr[i].value;
}
}
var nodetext = "text";
if(node.text == null) {
nodetext = "textContent";
}
var nodechilds = node.childNodes;
if(nodechilds != null) {
if(nodechilds.length && xmlobj == null) {
xmlobj = new Object();
}
for(var i = 0;i < nodechilds.length;i++) {
if(nodechilds[i].tagName != null) {
if(nodechilds[i].childNodes[0] != null && nodechilds[i].childNodes.length <= 1 && (nodechilds[i].childNodes[0].nodeType == 3 || nodechilds[i].childNodes[0].nodeType == 4)) {
if(xmlobj[nodechilds[i].tagName] == null) {
xmlobj[nodechilds[i].tagName] = nodechilds[i][nodetext];
} else {
if(typeof(xmlobj[nodechilds[i].tagName]) == "object" && xmlobj[nodechilds[i].tagName].length) {
xmlobj[nodechilds[i].tagName][xmlobj[nodechilds[i].tagName].length] = nodechilds[i][nodetext];
} else {
xmlobj[nodechilds[i].tagName] = [xmlobj[nodechilds[i].tagName]];
xmlobj[nodechilds[i].tagName][1] = nodechilds[i][nodetext];
}
}
} else {
if(nodechilds[i].childNodes.length) {
if(xmlobj[nodechilds[i].tagName] == null) {
xmlobj[nodechilds[i].tagName] = new Object();
this.xml2json(xmlobj[nodechilds[i].tagName], nodechilds[i]);
} else {
if(xmlobj[nodechilds[i].tagName].length) {
xmlobj[nodechilds[i].tagName][xmlobj[nodechilds[i].tagName].length] = new Object();
this.xml2json(xmlobj[nodechilds[i].tagName][xmlobj[nodechilds[i].tagName].length-1], nodechilds[i]);
} else {
xmlobj[nodechilds[i].tagName] = [xmlobj[nodechilds[i].tagName]];
xmlobj[nodechilds[i].tagName][1] = new Object();
this.xml2json(xmlobj[nodechilds[i].tagName][1], nodechilds[i]);
}
}
} else {
xmlobj[nodechilds[i].tagName] = nodechilds[i][nodetext];
}
}
}
}
}
};
return obj;
}
var xml = new xmlobj();
var xmlpar = xml.createXMLDoc(forum_optionlist);
var forum_optionlist_obj = new Object();
xml.xml2json(forum_optionlist_obj, xmlpar);
function changeselectthreadsort(selectchoiceoptionid, optionid, type) {
if(selectchoiceoptionid == '0') {
return;
}
var soptionid = 's' + optionid;
var sselectchoiceoptionid = 's' + selectchoiceoptionid;

forum_optionlist = forum_optionlist_obj['forum_optionlist'];
var choicesarr = forum_optionlist[soptionid]['schoices'];
var lastcount = 1;
var name = issearch = id = nameid = '';
if(type == 'search') {
issearch = ', \'search\'';
name = ' name="searchoption[' + optionid + '][value]"';
id = 'id="' + forum_optionlist[soptionid]['sidentifier'] + '"';
} else {
name = ' name="typeoption[' + forum_optionlist[soptionid]['sidentifier'] + ']"';
id = 'id="typeoption_' + forum_optionlist[soptionid]['sidentifier'] + '"';
}
if((choicesarr[sselectchoiceoptionid]['slevel'] == 1 || type == 'search') && choicesarr[sselectchoiceoptionid]['scount'] == 1) {
nameid = name + ' ' + id;
}	
var selectoption = '<div class="styli_tit f_c">'+$('#comiis_list_' + forum_optionlist[soptionid]['sidentifier'] + ' .styli_tit').html() + '</div><div class="flex"><div><div id="select_' + forum_optionlist[soptionid]['sidentifier']+'" ><div class="comiis_login_select kmselect"><div class="inner"><i class="comiis_font f_d">&#xe60c</i><div class="z"><div class="comiis_question" id="typeoption_' + (nameid ? forum_optionlist[soptionid]['sidentifier'] : (forum_optionlist[soptionid]['sidentifier'] + '_' + lastcount)) + '_name"></div></div><select' + (nameid ? nameid : (' id="typeoption_' + forum_optionlist[soptionid]['sidentifier'] + '_' + lastcount + '"')) + ' class="ps vm" onchange="changeselectthreadsort(this.value, \'' + optionid + '\'' + issearch + ');checkoption(\'' + forum_optionlist[soptionid]['sidentifier'] + '\', \'' + forum_optionlist[soptionid]['srequired'] + '\', \'' + forum_optionlist[soptionid]['stype'] + '\')" ' + ((forum_optionlist[soptionid]['sunchangeable'] == 1 && type == 'update') ? 'disabled' : '') + '><option value="0"><?php echo $comiis_lang['post31'];?></option>';
for(var i in choicesarr) {
nameid = '';
if((choicesarr[sselectchoiceoptionid]['slevel'] == 1 || type == 'search') && choicesarr[i]['scount'] == choicesarr[sselectchoiceoptionid]['scount']) {
nameid = name + ' ' + id;
}
if(choicesarr[i]['sfoptionid'] != '0') {
var patrn1 = new RegExp("^" + choicesarr[i]['sfoptionid'] + "\\.", 'i');
var patrn2 = new RegExp("^" + choicesarr[i]['sfoptionid'] + "$", 'i');
if(selectchoiceoptionid.match(patrn1) == null && selectchoiceoptionid.match(patrn2) == null) {
continue;
}
}
if(choicesarr[i]['scount'] != lastcount) {
if(parseInt(choicesarr[i]['scount']) >= (parseInt(choicesarr[sselectchoiceoptionid]['scount']) + parseInt(choicesarr[sselectchoiceoptionid]['slevel']))) {
break;
}
selectoption += '</select></div></div></div>' + "\r\n" + '<div class="comiis_login_select kmselect b_t"><div class="inner"><i class="comiis_font f_d">&#xe60c</i><div class="z"><div class="comiis_question" id="typeoption_' + (nameid ? forum_optionlist[soptionid]['sidentifier'] : forum_optionlist[soptionid]['sidentifier'] + '_' + i.replace(/\./g, '_')) + '_name"></div></div><select' + (nameid ? nameid : (' id="typeoption_' + forum_optionlist[soptionid]['sidentifier'] + '_' + i.replace(/\./g, '_') + '"')) + ' class="ps vm" onchange="changeselectthreadsort(this.value, \'' + optionid + '\'' + issearch + ');checkoption(\'' + forum_optionlist[soptionid]['sidentifier'] + '\', \'' + forum_optionlist[soptionid]['srequired'] + '\', \'' + forum_optionlist[soptionid]['stype'] + '\')" ' + ((forum_optionlist[soptionid]['sunchangeable'] == 1 && type == 'update') ? 'disabled' : '') + '><option value="0"><?php echo $comiis_lang['post31'];?></option>';
lastcount = parseInt(choicesarr[i]['scount']);
}
var patrn1 = new RegExp("^" + choicesarr[i]['soptionid'] + "\\.", 'i');
var patrn2 = new RegExp("^" + choicesarr[i]['soptionid'] + "$", 'i');
var isnext = '';
if(parseInt(choicesarr[i]['slevel']) != 1) {
isnext = '&raquo';
}
if(selectchoiceoptionid.match(patrn1) != null || selectchoiceoptionid.match(patrn2) != null) {
selectoption += "\r\n" + '<option value="' + choicesarr[i]['soptionid'] + '" selected="selected">' + choicesarr[i]['scontent'] + isnext + '</option>';
} else {
selectoption += "\r\n" + '<option value="' + choicesarr[i]['soptionid'] + '">' + choicesarr[i]['scontent'] + isnext + '</option>';
}
}
selectoption += '</select></div></div></div></div>';	
if(type == 'search') {
selectoption  += "\r\n" + '<input type="hidden" name="searchoption[' + optionid + '][type]" value="select">';
}
document.getElementById('comiis_list_' + forum_optionlist[soptionid]['sidentifier']).innerHTML = selectoption;
$(".comiis_input_style select").each(function(){
var obj = $(this);
$('#' + obj.attr('id') + '_name').text(obj.find('option:selected').text());
});
}
</script>
