var jq = jQuery.noConflict();

function toLogin(type) {
    var names = {
        qq: lang('qqlogin'),
        pc_wechat: lang('wxlogin'),
        sina: lang('wblogin')
    };
    jq.ajax({
        url: "./plugin.php?id=yimen_app&s=login/get_oauth_url&type=" + type,
        type: "POST",
        dataType: 'json',
        success: (res) => {
            //console.log(res);
            if (res.code == 1) {
                // window.location.href = res.url
                layer.open({
                    type: 2,
                    title: names[type],
                    maxmin: true,
                    shadeClose: true, //点击遮罩关闭层
                    area: ['800px', '520px'],
                    content: res.url
                });
            }
        },
        error: (res) => {
            alert(JSON.stringify(res));
        }
    });
}