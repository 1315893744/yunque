<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
function comiis_relatekw()
{
    $return = '';
    $subjectenc = rawurlencode(strip_tags($_GET['subjectenc']));
    $messageenc = rawurlencode(strip_tags(preg_replace('/\\[.+?\\]/U', '', $_GET['messageenc'])));
    $redata = dfsockopen('http://zhannei.baidu.com/api/customsearch/keywords?title=' . $subjectenc . $messageenc);
    $redatajson = json_decode($redata, true);
    $return = diconv(implode(',', $redatajson['result']['res']['keyword_list']), 'utf-8', CHARSET);
    return $return;
}