<?PHP exit('Access Denied');?>
<!--{subtemplate common/header_common}-->
<link rel="stylesheet" type="text/css" href="./source/plugin/comiis_imgshow/comiis_img/comiis.css" charset="UTF-8" />
<style>.messages a,.comiis_tkhf_nr li.kmnr .kmnrs a,#Main-B P a{text-decoration:underline;color:{$comiis['linkcolor']};}</style>
</head>
<BODY id="comiis_imgshow">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div class="comiis_wrap">
  <div class="hd header">
    <div class="logo"><img src="{$comiis['logo']}"></div>
    <div class="nav"> <a href="{$_G[siteurl]}">$_G['setting']['bbname']</a> <span>&gt;</span> <a href="{if $comiis['nameurl']}{$comiis['nameurl']}{else}javascript:;{/if}">{$comiis['sohwname']}</a> <span>&gt;</span> <a href="forum.php?mod=forumdisplay&fid={$thread[fid]}">{$_G[cache][forums][$thread[fid]][name]}</a> <span>&gt;</span> {lang comiis_imgshow:text}</div>
    <div class="mainNav"> {$comiis['html']} </div>
  </div>
  <div class="bd body">
    <div class="comiis_inner" id="comiis_pv_main">
      <div class="hd">      
		<div class="comiis_pad">{$comiis['topad']}</div>      
        <h1>{$thread[subject]}</h1>
        <div id="toolBar">
          <ul class="left">
            <li class="full" id="fullSwf"></li><li>|</li>
            <li class="play" title="{lang comiis_imgshow:auto}">{lang comiis_imgshow:slideshow}</li><li>|</li>
            <li class="save"><a href="javascript:void(0)" target="_blank" id="orgPic">{lang comiis_imgshow:view}</a></li><li>|</li>
            <li>{lang comiis_imgshow:prompt}</li>
          </ul>
          <ul class="right">
          <!--{if $comiis['toolBar']}-->
				{$comiis['toolBar']}
          <!--{else}-->
				<li>|</li>
				<li class="shareqq"><a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={$http}&title={$subject}&pics={$all_image}&summary={$message}" target="_blank" id="iwannComent">{lang comiis_imgshow:qzone}</a></li>
				<li class="shareqqwb"><a href="http://share.v.t.qq.com/index.php?c=share&a=index&url={$http}&title={$subject}" target="_blank" id="iwannComent">{lang comiis_imgshow:tqq}</a></li>
				<li class="sharewb"><a href="http://service.weibo.com/share/share.php?title={$subject}&url={$http}&pic={$one_image}&source=bookmark&appkey=&ralateUid=" target="_blank" id="iwannComent">{lang comiis_imgshow:sina}</a></li>
          <!--{/if}-->
          </ul>
          <ul class="right">
          <li class="ckyw"><a href="forum.php?mod=viewthread&t=1&tid={$thread[tid]}" target="_blank" id="iwannComent">{lang comiis_imgshow:viewtid}</a></li>
          <li class="comment"><a href="forum.php?mod=post&action=newthread&fid={$thread[fid]}" title="{lang comiis_imgshow:replie}" target="_blank" id="iwannComent">{lang comiis_imgshow:replie}</a></li>
          </ul>
        </div>
      </div>
      <div class="bd">
        <div id="Main-A">
          <div id="mouseOverleft" style="width:50%;position:absolute;left:0;">
            <div class="pageLeft" style="display:none"><span><a href="javascript:void(0);" onFocus="this.blur()"></a></span></div>
            <div class="pageLeft-bg" style="display:none"></div>
          </div>
          <div id="mouseOverright" style="width:50%;position:absolute;right:0;">
            <div class="pageRight" style="display:none"><span><a href="javascript:void(0);" onFocus="this.blur()"></a></span></div>
            <div class="pageRight-bg" style="display:none"></div>
          </div>
			<DIV id="end"> <A class="close" href="javascript:void(0)"></A>
			  <DIV class="end-inner">
				<DIV class="hd">
				  <DIV class="left"> <SPAN class="firstImg"><IMG id="endimg" /></SPAN> </DIV>
				  <DIV class="right">
					<H2>{$thread[subject]}</H2>
					<UL>
					  <LI class="button"> <A id="replayPic" onFocus="this.blur()" href="javascript:void(0)"><SPAN></SPAN><EM></EM>{lang comiis_imgshow:replay}</A> </LI>
					  <LI class="line"> | </LI>
					  <LI class="button"> <A id="ShareinQQ" onclick="showWindow(this.id, this.href, 'get', 0);" href="./home.php?mod=spacecp&ac=favorite&type=thread&id={$thread[tid]}"><SPAN></SPAN><EM></EM>{lang comiis_imgshow:favorites}</A> </LI>
					  <LI class="button"> <A id="MIcblog" onclick="showWindow(this.id, this.href, 'get', 0);" href="./home.php?mod=spacecp&ac=share&type=thread&id={$thread[tid]}"><SPAN></SPAN><EM></EM>{lang comiis_imgshow:share}</A> </LI>
					</UL>
				  </DIV>
				</DIV>
				<DIV class="bd">
				  <H3> {lang comiis_imgshow:look} </H3>
				  <UL id="lastComend">
				  <!--{loop $more $temp}-->
					<LI>
					  <DIV> <A class="img" href="./plugin.php?id=comiis_imgshow&tid={$temp[tid]}"><IMG src="{echo getforumimg($temp[aid], 0, 122, 92, 2);}" /></A><A href="./plugin.php?id=comiis_imgshow&tid={$temp[tid]}" class="titles"><!--{echo cutstr($temp[subject],36,'');}--></A> </DIV>
					</LI>
				  <!--{/loop}-->
				  </UL>
				</DIV>
				<div class="ft"><a href="{$comiis['keyurl']}" target="_blank" class="buttonClik">{$comiis['keyname']}</a></div>
			  </DIV>
			</DIV>
        </div>
        <div id="Main-B"> loading... </div>
        <div id="Main-C">
          <div class="smallPic"> <a href="javascript:void(0);" onFocus="this.blur()" class="left" id="goleft"></a>
            <div class="left" id="SmallWarp">
              <ul id="Smailllist"> loading.. </ul>
              <a href="javascript:void(0)" onFocus="this.blur()" class="mask"></a> </div>
            <a href="javascript:void(0);" onFocus="this.blur()" class="right" id="goright"></a> </div>
          <div class="scrollLine"><span class="scrollButton"></span></div>
        </div>
      </div>
      <div class="ft">
        <div id="Main-D"> loading... </div>
      </div>
    </div>
  </div>
  <!--{eval $message=cutstr($post[thread][message],$comiis['threadlen']);}-->
  <!--{if $comiis['message'] && $message}--><div class="comiis_tkhf messages">{$message}</div><!--{/if}-->
  <!--{if $comiis['retext'] || $comiis['remessage']}-->
	<div class="comiis_tkhf">
	 <h3><!--{if !isset($post['post']) && $_G['uid'] && $comiis['smilies']}--><a href="javascript:;" class="y" id="fastpostsml" onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2,'pos':'34!'});if($('fastpostmessage').innerHTML =='{lang comiis_imgshow:civilization}'){$('fastpostmessage').innerHTML='';}return false;"><img src="./source/plugin/comiis_imgshow/comiis_img/smilies.gif" class="vm"></a><!--{/if}--><span>{lang comiis_imgshow:read}:{$thread[views]} | {lang comiis_imgshow:comment}:{$thread[replies]}</span><!--{if !isset($post['post'])}-->{lang comiis_imgshow:talk}<!--{else}-->{lang comiis_imgshow:netreplie}<!--{/if}--></h3>
	 <!--{loop $post[post] $temp}-->
	 <div class="comiis_tkhf_nr"><ul>
	 <!--{if $comiis['avatar']}-->
	  <li class="kmptx"><a href="home.php?mod=space&amp;uid={$temp[authorid]}"><img src="./uc_server/avatar.php?uid={$temp[authorid]}&size=small"></a></li>
	  <li class="kmnr">
	  <!--{else}-->
	  <li class="kmnr" style="margin-left:2px;">
	  <!--{/if}-->
	   <div class="kmuid"><a target="_blank" href="home.php?mod=space&amp;uid={$temp[authorid]}">{$temp[author]}</a> <span>{lang comiis_imgshow:date} {$temp[dateline]}</span></div>
	   <div class="kmnrs">{$temp[message]}</div>
	  </li>  
	 </ul></div>
	 <!--{/loop}-->
	 <!--{if $comiis['retext']}-->
	 <div class="comiis_tkhfk">
	 <!--{if isset($post['post'])}--><h3><!--{if $_G['uid'] && $comiis['smilies']}--><a href="javascript:;" class="y" id="fastpostsml" onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2,'pos':'34!'});if($('fastpostmessage').innerHTML =='{lang comiis_imgshow:civilization}'){$('fastpostmessage').innerHTML='';}return false;"><img src="./source/plugin/comiis_imgshow/comiis_img/smilies.gif" class="vm"></a><!--{/if}-->{lang comiis_imgshow:talk}</h3><!--{/if}-->
		<!--{if $_G['uid']}-->
			<!--{if $comiis['smilies']}-->
			<script src="static/js/seditor.js" type="text/javascript"></script>
			<script type="text/javascript" reload="1">smilies_show('fastpostsmiliesdiv', 8, 'fastpost');</script>
			<!--{/if}-->
			<form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&action=reply&fid={$thread[fid]}&tid={$thread[tid]}&replysubmit=yes&infloat=yes&handlekey=kmtwt" onsubmit="comiis_post();return false;">
			<div class="comiis_tkhfk_k">
			<input type="hidden" name="posttime" id="posttime" value="{TIMESTAMP}" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="usesig" value="$usesigcheck" />
			<input type="hidden" name="subject" value="  " />
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			 <textarea name="message" id="fastpostmessage" maxlength="200" onblur="if(this.innerHTML ==''){this.innerHTML='{lang comiis_imgshow:civilization}'}" onfocus="if(this.innerHTML =='{lang comiis_imgshow:civilization}'){this.innerHTML=''}" onKeyDown="seditor_ctlent(event, 'comiis_post()');">{lang comiis_imgshow:civilization}</textarea>
			</div>
			<div class="comiis_tkhfk_an"><button value="replysubmit" id="fastpostsubmit" name="replysubmit" type="submit">{lang comiis_imgshow:submit}</button>
			{lang comiis_imgshow:welcome} <a target="_blank" href="home.php?mod=space&amp;uid=$_G['uid']">{$_G[member][username]}</a> ! <!--{if $comiis['reimg']}--><LABEL><INPUT id="image_message" class="pc" type="checkbox" value="1" CHECKED />{lang comiis_imgshow:replieaddpic}</LABEL><!--{/if}--></div>
			</form>
		<!--{else}-->
			<div class="comiis_tkhfk_k" style="height:70px;text-align:center;line-height:70px;color:#b4b4b4">
			 {lang comiis_imgshow:login1}{$thread[tid]}{lang comiis_imgshow:login2}
			</div>
			<div class="comiis_tkhfk_an"><button id="fastpostsubmit" onclick="showWindow('login', 'member.php?mod=logging&action=login&referer=plugin.php?id=comiis_imgshow%26tid={$thread[tid]}');return false;">{lang comiis_imgshow:submit}</button></div>
		<!--{/if}-->
	 </div>
	 <!--{/if}-->
	</div>
	<!--{/if}-->
	<!--{if $comiis['img']}-->
	<div class="comiis_bt_pic">
		<ul>
		<!--{loop $image_list $temp}-->
			<li><a href="./plugin.php?id=comiis_imgshow&tid={$temp[tid]}"><img src="{echo getforumimg($temp[aid], 0, 145, 120, 2);}" width="145" height="120"></a><a href="./plugin.php?id=comiis_imgshow&tid={$temp[tid]}">		<!--{echo cutstr($temp[subject],40,'');}--></a></li>
		<!--{/loop}-->
		</ul>
	</div>
	<!--{/if}-->
	<div class="comiis_footerptop">
    <div class="ft footer"><span>{$comiis['footcopy']}{lang comiis_imgshow:foot}</span></div>
</div>
<div style="display:none"><div id="favoritenumber"></div><div id="fastpostreturn"></div><div id="return_ShareinQQ"></div><div id="return_MIcblog"></div><!--{loop $attachment $temp}--><span id="comiis_message{$temp[aid]}"><!--{echo cutstr($aid_message[message][$temp[aid]],$comiis['messagelen']);}--></span><!--{/loop}--></div>
<script type="text/javascript">
var tname = "{lang comiis_imgshow:source}{$comiis['sohwname']}{lang comiis_imgshow:sourcereplie}";
</script>
<script type="text/javascript" src="./source/plugin/comiis_imgshow/comiis_img/comiis.js" charset="UTF-8"></script>
<script type="text/javascript">
var comiis_reurl="plugin.php?id=comiis_imgshow&tid={$thread[tid]}";
var comiis_Rewrite="{if $comiis['Rewrite']}?r={else}&r={/if}";
<!--{if $comiis['scroll']}-->
jQuerys(function(){
	var scrollPos;
	if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {
		scrollPos = document.documentElement;
	} else if (typeof document.body != 'undefined') {
		scrollPos = document.body;
	}
	jQuerys(scrollPos).animate({
		scrollTop: jQuerys("#toolBar").offset().top - 10
	},1000);
});
<!--{/if}-->
var kmtitle='<DIV class="TimeInfo"><SPAN>{echo gmdate(lang('plugin/comiis_imgshow', 'gmdate'), $thread[dateline] + getglobal("member/timeoffset") * 3600);}</SPAN><SPAN>{lang comiis_imgshow:sources}<a href="forum.php?mod=forumdisplay&fid={$thread[fid]}" target="_blank">{$_G[cache][forums][$thread[fid]][name]}</a></SPAN><SPAN style="PADDING-RIGHT: 0px">{lang comiis_imgshow:author}<a href="home.php?mod=space&amp;uid={$thread[authorid]}" target="_blank">{$thread[author]}</a></SPAN></DIV>';
<!--{loop $attachment $temp}-->
hdPic.fn._tmpArray.push({'showtit': jQuerys("#comiis_message{$temp[aid]}").html(),'smallpic': '{echo getforumimg($temp[aid], 0, 116, 86, 1);}','bigpic': '{echo $temp[remote]?$_G['setting']['ftp']['attachurl']:$_G['setting']['attachurl'];}forum/{$temp[attachment]}'});
<!--{/loop}-->
jQuerys("#endimg").attr("src",hdPic.fn._tmpArray[0].smallpic);
</script>
<!--{eval comiis_rewrite($comiis['Rewrite']);output();}-->
</body>
</html>