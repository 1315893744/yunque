<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<div class="sidebarBlock cl" style="width: 270px; padding: 20px; margin-bottom: 0; box-shadow: none; margin-bottom: 15px; box-shadow: 0 0 3px rgba(0,0,0,.1);">
  <h3>子版块</h3>
  <div id="subforum_<?php echo $_G['forum']['fid'];?>">
    <ul>
      <?php if(is_array($sublist)) foreach($sublist as $sub) { ?> 
      <?php $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];?>      <li class="cl" style="padding: 15px 0;">
        <!-- 图标 -->
        <div class="subforum-icn cl" style="float: left; padding: 0 12px 0 0;"> 
          <?php if($sub['icon']) { ?> 
          <?php echo $sub['icon'];?> 
          <?php } else { ?> 
          <a href="<?php echo $forumurl;?>"<?php if($sub['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($sub['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $sub['name'];?>" /></a> 
          <?php } ?> 
        </div>
        <!-- 名称 -->
        <div class="cl" style="float: left;">
        <h2 style="height: 35px; line-height: 35px; font-size: 14px;"><a href="<?php echo $forumurl;?>" <?php if(!empty($sub['redirect'])) { ?>target="_blank"<?php } ?> style="<?php if(!empty($sub['extra']['namecolor'])) { ?>color: <?php echo $sub['extra']['namecolor'];?>;<?php } ?>"><?php echo $sub['name'];?></a><?php if($sub['todayposts'] && !$sub['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $sub['todayposts'];?>)</em><?php } ?> </h2>
       <p> <?php if(empty($sub['redirect'])) { ?><em>主题: <?php echo dnumber($sub['threads']); ?></em>, <em>帖数: <?php echo dnumber($sub['posts']); ?></em><?php } ?> </p>
       </div>
      </li>
      
      <?php } ?> 
      <?php echo $_G['forum']['endrows'];?>
      <?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_subforum_extra'][$sub[fid]])) echo $_G['setting']['pluginhooks']['forumdisplay_subforum_extra'][$sub[fid]];?>
    </ul>
  </div>
  <?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_subforum_extra'][$sub[fid]])) echo $_G['setting']['pluginhooks']['forumdisplay_subforum_extra'][$sub[fid]];?>
</div>

