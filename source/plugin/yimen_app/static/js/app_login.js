var jq = jQuery.noConflict();

function showMenu() {
    document.getElementById("yimen_x").style.display = "";
    document.getElementById("yimen_menu").style.display = "";
}

function closeMenu() {
    document.getElementById("yimen_x").style.display = "none";
    document.getElementById("yimen_menu").style.display = "none";
}

function qqLogin() {
    //QQ登录
    jsBridge.qqLogin(function (succ, ret) {
        if (succ) {
            if (ret.unionid == undefined) {
                ret.unionid = ''
            }
            toLogin('qq', {
                nickname: ret.userinfo.nickname,
                openid: ret.openid,
                figureurl: escape(ret.userinfo.figureurl_qq_2),
                unionid: ret.unionid,
                at: ret.access_token
            });
        } else {
            alert("");
        }
    })
    ;
}

function wxLogin() {
    //微信登录
    jsBridge.wxLogin(function (succ, ret) {
        if (succ) {
            var data = {};
            if (ret.userinfo != undefined) {
                data = {
                    nickname: ret.userinfo.nickname,
                    openid: ret.openid,
                    headimgurl: escape(ret.userinfo.headimgurl),
                    unionid: ret.unionid,
                };
            }
            data.code = ret.code;
            toLogin('wechat', data);
        } else {
            alert(lang('loginerr'));
        }
    });
}

function sinaLogin() {
    jsBridge.weibo.login(function (succ, ret) {
        if (succ) {
            toLogin('sina', {
                token: ret.token,
                uid: ret.uid
            });
        } else {
            alert(lang('loginerr'));
        }
    });
}

function toLogin(type, data) {
    jq.ajax({
        url: "./plugin.php?id=yimen_app&s=login/app_" + type,
        type: "POST",
        dataType: 'json',
        data: data,
        success: (res) => {
            if (res.code == 1) {
                if (res.url != null) {
                    login(res.url);
                } else {
                    jsBridge.backToHome(true);
                }
            } else {
                alert(res.msg)
            }
        },
        error: (res) => {
            alert(JSON.stringify(res));
        }
    });
}

function login(url) {
    window.location.href = url;
}