<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
require DISCUZ_ROOT . './source/plugin/comiis_app_portal/language/language.' . currentlang() . '.php';
$plugin_url = 'plugins&operation=config&do=' . $pluginid . '&identifier=' . $plugin['identifier'] . '&pmod=comiis_app_portal_rewrite';
loadcache(array('comiis_app_portal_rewrite'));
$comiis_app_portal_rewrite = $_G['cache']['comiis_app_portal_rewrite'] ? $_G['cache']['comiis_app_portal_rewrite'] : 'page-{id}.html';
if (submitcheck('comiis_submit')) {
	$comiis_app_portal_rewrite = addslashes($_GET['rewrite']);
	save_syscache('comiis_app_portal_rewrite', $comiis_app_portal_rewrite);
}
$comiis_app_portal_rewrites = str_replace(array('/', '(', ')', '.', '*', '?', '^', '$', '+', ','), array('\\/', '\\(', '\\)', '\\.', '\\*', '\\?', '\\^', '\\$', '\\+', '\\,'), $comiis_app_portal_rewrite);
$comiis_app_portal_rewrites = str_replace('{id}', '(.+)', $comiis_app_portal_rewrites);
showformheader($plugin_url);
showtableheader();
showtitle($comiis_app_portal_lang['102']);
showsetting($comiis_app_portal_lang['103'], 'rewrite', $comiis_app_portal_rewrite, 'text', '', '', $comiis_app_portal_lang['104']);
showsubmit('comiis_submit', 'submit', '', '');
showtablefooter();
showformfooter();
showtips($comiis_app_portal_lang['105'], 'tips', true, $comiis_app_portal_lang['106']);
echo '<div id="cpcontainer" style="padding:10px 5px;"><h1>Apache Web Server(' . $comiis_app_portal_lang['107'] . ')</h1>
<pre class="colorbox">
&lt;IfModule mod_rewrite.c&gt;
	RewriteEngine On
	RewriteCond %{QUERY_STRING} ^(.*)$
	RewriteRule ^(.*)/' . $comiis_app_portal_rewrites . '$ $1/plugin.php?id=comiis_app_portal&pid=$2&%1
&lt;/IfModule&gt;
</pre>
<h1>Apache Web Server(' . $comiis_app_portal_lang['108'] . ')</h1>
<pre class="colorbox">
# ' . $comiis_app_portal_lang['109'] . '
RewriteEngine On

# ' . $comiis_app_portal_lang['110'] . '
RewriteBase /discuz

# Rewrite ' . $comiis_app_portal_lang['111'] . '
RewriteCond %{QUERY_STRING} ^(.*)$
RewriteRule ^' . $comiis_app_portal_rewrites . '$ plugin.php?id=comiis_app_portal&pid=$1&%1

</pre>
<h1>IIS Web Server(' . $comiis_app_portal_lang['107'] . ')</h1>
<pre class="colorbox">
[ISAPI_Rewrite]

# 3600 = 1 hour
CacheClockRate 3600

RepeatLimit 32

# Protect httpd.ini and httpd.parse.errors files
# from accessing through HTTP
RewriteRule ^(.*)/' . $comiis_app_portal_rewrites . '(\\?(.*))*$ $1/plugin\\.php\\?id=comiis_app_portal&pid=$2&$4

</pre>
<h1>IIS7 Web Server(' . $comiis_app_portal_lang['107'] . ')</h1>
<pre class="colorbox">
&lt;rewrite&gt;
	&lt;rules&gt;
		&lt;rule name="portal_topic"&gt;
			&lt;match url="^(.*/)*' . $comiis_app_portal_rewrites . '\\?*(.*)$" /&gt;
			&lt;action type="Rewrite" url="{R:1}/plugin.php\\?id=comiis_app_portal&amp;amp;pid={R:2}&amp;amp;{R:3}" /&gt;
		&lt;/rule&gt;
	&lt;/rules&gt;
&lt;/rewrite&gt;
</pre>
<h1>Zeus Web Server</h1>
<pre class="colorbox">
match URL into $ with ^(.*)/' . $comiis_app_portal_rewrites . '\\?*(.*)$
if matched then
	set URL = $1/plugin.php?id=comiis_app_portal&pid=$2&$3
endif

</pre>

<h1>Nginx Web Server</h1>
<pre class="colorbox">
rewrite ^([^\\.]*)/' . $comiis_app_portal_rewrites . '$ $1/plugin.php?id=comiis_app_portal&pid=$2 last;
if (!-e $request_filename) {
	return 404;
}
</pre>
</div>';