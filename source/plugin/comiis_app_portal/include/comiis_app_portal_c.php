<?php

function comiis_app_portal_html($_arg_0)
{
	global $_G;
	global $comiis_portal;
	global $comiis_portal_lang;
	global $comiis_app_portal_time;
	global $comiis_app_portal_info;
	global $plugin_id;
	global $key;
	$_var_8 = intval($_arg_0);
	$_var_9 = DB::fetch_first("SELECT * FROM %t WHERE id='%d'", array("comiis_app_portal_page", $_var_8));
	if ($_var_9["id"] != $_var_8) {
		return NULL;
	}
	$_var_10 = $_var_11 = $comiis_portal = array();
	$_var_12 = $_var_13 = $_var_14 = '';
	$_var_15 = DB::fetch_all("SELECT * FROM %t WHERE pid='%d' and `show`='1' ORDER BY displayorder, id", array("comiis_app_portal_diy", $_var_8));
	$_var_16 = DISCUZ_ROOT . "./source/plugin/comiis_app_portal/comiis";
	$plugin_id = "comiis_app_portal";
	foreach ($_var_15 as $_var_19) {
		if (strlen($_var_19["dir"]) < 20 && is_dir($_var_16 . "/" . $_var_19["dir"] . "/touch") && is_file($_var_16 . "/" . $_var_19["dir"] . "/touch/comiis_template.php")) {
			$_var_20 = file_get_contents($_var_16 . "/" . $_var_19["dir"] . "/touch/comiis_template.php");
			$_var_21 = strpos($_var_20, "\n");
			$_var_20 = !($_var_21 === false) ? substr($_var_20, $_var_21 + 1) : $_var_20;
			$_var_21 = strpos($_var_20, "<comiis::readdata>");
			if ($_var_21 !== false) {
				$_var_11[$_var_19["dir"]] = substr($_var_20, 0, $_var_21);
				$_var_12 = substr($_var_20, $_var_21 + 18);
			} else {
				$_var_12 = $_var_20;
			}
			if (strpos($_var_20, "\$comiis_portal") && is_file($_var_16 . "/" . $_var_19["dir"] . "/language/language_" . currentlang() . ".php")) {
				include_once libfile("language/" . currentlang(), "plugin/comiis_app_portal/comiis/" . $_var_19["dir"]);
				$comiis_portal = array_merge($comiis_portal, $comiis_portal_lang);
			}
			$_var_12 = strpos($_var_20, "\$comiis[") ? str_replace("\$comiis[", "\$_G['block']['" . $_var_19["diyid"] . "'][", $_var_12) : $_var_12;
			$_var_12 = strpos($_var_20, "{\$data['id']}") ? str_replace("{\$data['id']}", "_" . $_var_19["diyid"], $_var_12) : $_var_12;
			if ($_var_19["type"] == "footer") {
				$_var_14 = $_var_14 . ("<div id=\"comiis_app_block_" . $_var_19["id"] . "\" class=\"bg_f" . ($_var_19["indenttop"] ? " tfu10" : '') . ($_var_19["indentbottom"] ? " bfu10" : '') . ($_var_19["margintop"] ? " mt10" : '') . ($_var_19["marginbottom"] ? " mb10" : '') . ($_var_19["bordertop"] ? " b_t" : '') . ($_var_19["borderbottom"] ? " b_b" : '') . " cl\">" . $_var_12 . "</div>");
			} else {
				$_var_13 = $_var_13 . ("<div id=\"comiis_app_block_" . $_var_19["id"] . "\" class=\"bg_f" . ($_var_19["indenttop"] ? " tfu10" : '') . ($_var_19["indentbottom"] ? " bfu10" : '') . ($_var_19["margintop"] ? " mt10" : '') . ($_var_19["marginbottom"] ? " mb10" : '') . ($_var_19["bordertop"] ? " b_t" : '') . ($_var_19["borderbottom"] ? " b_b" : '') . " cl\">" . $_var_12 . "</div>");
			}
		}
	}
	$_var_13 = "<!--{block return}--><style>" . implode('', $_var_11) . strip_tags($_var_9["css"]) . "</style>\r\n<script>\r\nfunction comiis_app_portal_loop(h, speed, delay, sid) {\r\nvar t = null;\r\nvar o = document.getElementById(sid);\r\no.innerHTML += o.innerHTML;\r\no.scrollTop = 0;\r\nfunction start() {\r\n\tt = setInterval(scrolling, speed);\r\n\to.scrollTop += 2;\r\n}\r\nfunction scrolling() {\r\n\tif(o.scrollTop % h != 0) {\r\n\t\to.scrollTop += 2;\r\n\t\tif(o.scrollTop >= o.scrollHeight / 2){\r\n\t\t\to.scrollTop = 0;\r\n\t\t}\r\n\t} else {\r\n\t\tclearInterval(t);\r\n\t\tsetTimeout(start, delay);\r\n\t}\r\n}\r\nsetTimeout(start, delay);\r\n}\r\nfunction comiis_app_portal_swiper(a, b){\r\nif(typeof(Swiper) == 'undefined') {\r\n\t\$.getScript(\"./source/plugin/comiis_app_portal/image/comiis.js\").done(function(){\r\n\t\tnew Swiper(a, b);\r\n\t});\r\n}else{\r\n\tnew Swiper(a, b);\r\n}\r\n}\r\n</script>" . $_var_13 . "<!--{/block}-->" . ($_var_14 ? "<!--{block footer}-->" . $_var_14 . "<!--{/block}-->" : '');
	$_var_13 = comiis_app_portal_template($_var_13);
}
function comiis_app_portal_template($_arg_0)
{
	global $comiis_replacecode;
	$_var_2 = "((\\\$[a-zA-Z_-ÿ][a-zA-Z0-9_-ÿ]*(\\-\\>)?[a-zA-Z0-9_-ÿ]*)(\\[[a-zA-Z0-9_\\-\\.\"\\'\\[\\]\$-ÿ]+\\])*)";
	$_var_3 = "([a-zA-Z_-ÿ][a-zA-Z0-9_-ÿ]*)";
	$_arg_0 = preg_replace_callback("/\\{" . "\\\$comiis_portal" . "\\[\\'(.+?)\\'\\]\\}/is", "comiis_app_portal_languagevar", $_arg_0);
	$_arg_0 = preg_replace_callback("/[\n\r\t]*\\{echo\\s+(.+?)\\}[\n\r\t]*/is", "comiis_app_portal_echo1", $_arg_0);
	$_arg_0 = preg_replace("/([\n\r]+)\t+/s", "\\1", $_arg_0);
	$_arg_0 = preg_replace("/\\<\\!\\-\\-\\{(.+?)\\}\\-\\-\\>/s", "{\\1}", $_arg_0);
	$_arg_0 = preg_replace_callback("/[\n\r\t]*\\{eval\\}\\s*(\\<\\!\\-\\-)*(.+?)(\\-\\-\\>)*\\s*\\{\\/eval\\}[\n\r\t]*/is", "comiis_app_portal_evaltags_2", $_arg_0);
	$_arg_0 = preg_replace_callback("/[\n\r\t]*\\{eval\\s+(.+?)\\s*\\}[\n\r\t]*/is", "comiis_app_portal_evaltags_1", $_arg_0);
	$_arg_0 = preg_replace("/\\{(\\\$[a-zA-Z0-9_\\-\\>\\[\\]\\'\"\$\\.-ÿ]+)\\}/s", "<?=\\1?>", $_arg_0);
	$_arg_0 = preg_replace_callback("/\\{hook\\/(\\w+?)(\\s+(.+?))?\\}/i", "comiis_app_portal_hooktags_13", $_arg_0);
	$_arg_0 = preg_replace_callback("/" . $_var_2 . "/s", "comiis_app_portal_addquote_1", $_arg_0);
	$_arg_0 = preg_replace_callback("/\\<\\?\\=\\<\\?\\=" . $_var_2 . "\\?\\>\\?\\>/s", "comiis_app_portal_addquote_1", $_arg_0);
	$_arg_0 = "<? if(!defined('IN_DISCUZ')){exit('Access Denied');}\nglobal \$_G, \$return, \$footer;?>\n" . $_arg_0 . '';
	$_arg_0 = preg_replace_callback("/([\n\r\t]*)\\{if\\s+(.+?)\\}([\n\r\t]*)/is", "comiis_app_portal_if123", $_arg_0);
	$_arg_0 = preg_replace_callback("/([\n\r\t]*)\\{elseif\\s+(.+?)\\}([\n\r\t]*)/is", "comiis_app_portal_elseif123", $_arg_0);
	$_arg_0 = preg_replace("/\\{else\\}/i", "<? } else { ?>", $_arg_0);
	$_arg_0 = preg_replace("/\\{\\/if\\}/i", "<? } ?>", $_arg_0);
	$_arg_0 = preg_replace_callback("/[\n\r\t]*\\{loop\\s+(\\S+)\\s+(\\S+)\\}[\n\r\t]*/is", "comiis_app_portal_loop12", $_arg_0);
	$_arg_0 = preg_replace_callback("/[\n\r\t]*\\{loop\\s+(\\S+)\\s+(\\S+)\\s+(\\S+)\\}[\n\r\t]*/is", "comiis_app_portal_loop123", $_arg_0);
	$_arg_0 = preg_replace("/\\{\\/loop\\}/i", "<? } ?>", $_arg_0);
	$_arg_0 = preg_replace("/\\{" . $_var_3 . "\\}/s", "<?=\\1?>", $_arg_0);
	if (!empty($comiis_replacecode)) {
		$_arg_0 = str_replace($comiis_replacecode["search"], $comiis_replacecode["replace"], $_arg_0);
	}
	$_arg_0 = preg_replace("/ \\?\\>[\n\r]*\\<\\? /s", " ", $_arg_0);
	$_arg_0 = preg_replace_callback("/[\n\r\t]*\\{block\\s+([a-zA-Z0-9_\\[\\]]+)\\}(.+?)\\{\\/block\\}/is", "comiis_app_portal_stripblock_12", $_arg_0);
	$_arg_0 = preg_replace("/\\<\\?(\\s{1})/is", "<?php\\1", $_arg_0);
	$_arg_0 = preg_replace("/\\<\\?\\=(.+?)\\?\\>/is", "<?php " . $_var_4 . " .= \\1;?>", $_arg_0);
	return $_arg_0;
}
function comiis_app_portal_echo1($_arg_0)
{
	return "{eval \$a=" . $_arg_0[1] . "}{\$a}";
}
function comiis_app_portal_evaltags_2($_arg_0)
{
	return comiis_app_portal_evaltags($_arg_0[2]);
}
function comiis_app_portal_evaltags_1($_arg_0)
{
	return comiis_app_portal_evaltags($_arg_0[1]);
}
function comiis_app_portal_hooktags_13($_arg_0)
{
	return comiis_app_portal_hooktags($_arg_0[1], $_arg_0[3]);
}
function comiis_app_portal_addquote_1($_arg_0)
{
	return comiis_app_portal_addquote("<?=" . $_arg_0[1] . "?>");
}
function comiis_app_portal_if123($_arg_0)
{
	return comiis_app_portal_stripvtags($_arg_0[1] . "<? if(" . $_arg_0[2] . ") { ?>" . $_arg_0[3]);
}
function comiis_app_portal_elseif123($_arg_0)
{
	return comiis_app_portal_stripvtags($_arg_0[1] . "<? } elseif(" . $_arg_0[2] . ") { ?>" . $_arg_0[3]);
}
function comiis_app_portal_loop12($_arg_0)
{
	return comiis_app_portal_stripvtags("<? if(is_array(" . $_arg_0[1] . ")) foreach(" . $_arg_0[1] . " as " . $_arg_0[2] . ") { ?>");
}
function comiis_app_portal_loop123($_arg_0)
{
	return comiis_app_portal_stripvtags("<? if(is_array(" . $_arg_0[1] . ")) foreach(" . $_arg_0[1] . " as " . $_arg_0[2] . " => " . $_arg_0[3] . ") { ?>");
}
function comiis_app_portal_stripblock_12($_arg_0)
{
	return comiis_app_portal_stripblock($_arg_0[1], $_arg_0[2]);
}
function comiis_app_portal_languagevar($_arg_0)
{
	global $comiis_portal;
	if (isset($comiis_portal[$_arg_0[1]])) {
		return $comiis_portal[$_arg_0[1]];
	}
	return "!" . $_arg_0[1] . "!";
}
function comiis_app_portal_evaltags($_arg_0)
{
	global $comiis_replacecode;
	$_var_2 = count($comiis_replacecode["search"]);
	$comiis_replacecode["search"][$_var_2] = $_var_3 = "<!--EVAL_TAG_" . $_var_2 . "-->";
	$comiis_replacecode["replace"][$_var_2] = "<? " . $_arg_0 . "?>";
	return $_var_3;
}
function comiis_app_portal_hooktags($_arg_0, $_arg_1 = '')
{
	global $comiis_replacecode;
	global $_G;
	$_var_4 = count($comiis_replacecode["search"]);
	$comiis_replacecode["search"][$_var_4] = $_var_5 = "<!--HOOK_TAG_" . $_var_4 . "-->";
	$_var_6 = '';
	$_arg_1 = !($_arg_1 == '') ? "[" . $_arg_1 . "]" : '';
	$comiis_replacecode["replace"][$_var_4] = "<?php " . $_var_6 . "if(!empty(\$_G['setting']['pluginhooks']['" . $_arg_0 . "']" . $_arg_1 . ")) \$return .= \$_G['setting']['pluginhooks']['" . $_arg_0 . "']" . $_arg_1 . ";?>";
	return $_var_5;
}
function comiis_app_portal_addquote($_arg_0)
{
	return str_replace("\\\"", "\"", preg_replace("/\\[([a-zA-Z0-9_\\-\\.-ÿ]+)\\]/s", "['\\1']", $_arg_0));
}
function comiis_app_portal_stripvtags($_arg_0, $_arg_1 = '')
{
	$_arg_0 = str_replace("\\\\\"", "\\\"", preg_replace("/\\<\\?\\=(\\\$.+?)\\?\\>/s", "\\1", $_arg_0));
	$_arg_1 = str_replace("\\\\\"", "\\\"", $_arg_1);
	return $_arg_0 . $_arg_1;
}
function comiis_app_portal_stripblock($_arg_0, $_arg_1)
{
	$_arg_1 = preg_replace("/<\\?=\\\$(.+?)\\?>/", "{\$\\1}", $_arg_1);
	preg_match_all("/<\\?=(.+?)\\?>/", $_arg_1, $_var_2);
	$_var_3 = '';
	$_var_2[1] = array_unique($_var_2[1]);
	foreach ($_var_2[1] as $_var_4) {
		$_var_3 = $_var_3 . ("\$__" . $_var_4 . " = " . $_var_4 . ";");
	}
	$_arg_1 = preg_replace("/<\\?=(.+?)\\?>/", "{\$__\\1}", $_arg_1);
	$_arg_1 = str_replace("?>", "\n\$" . $_arg_0 . " .= <<<EOF\n", $_arg_1);
	$_arg_1 = str_replace("<?", "\nEOF;\n", $_arg_1);
	$_arg_1 = str_replace("\nphp ", "\n", $_arg_1);
	return "<?\n" . $_var_3 . "\$" . $_arg_0 . " = <<<EOF\n" . $_arg_1 . "\nEOF;\n?>";
}
if (!defined("IN_DISCUZ")) {
	echo "Access Denied";
	return 0;
}
global $comiis_portal;