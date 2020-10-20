bui.ready(function () {
    //初始化
    var config;
    init();

    function init() {
        // load config
        bui.ajax({
            url: "/plugin.php?id=yimen_app&s=user/get_login_config",
            method: 'POST',
        }).done(function (res) {
            if (res.code == 1) {
                config = res.data;
                $('.logo').css('background-image', 'url(\'./img/' + config.head_img + '.jpg\')')
                $('.btns .btn').css('background', '');
                $('.btns .active').css('background', 'linear-gradient(to right, ' + config.button_left_color + ', ' + config.button_right_color + '')
                $("#toreg").css('background', 'linear-gradient(to right, ' + config.button_left_color + ', ' + config.button_right_color + '')
                $("#tologin").css('background', 'linear-gradient(to right, ' + config.button_left_color + ', ' + config.button_right_color + '')
                var i = 0;
                if (/LT-APP/.test(navigator.userAgent)) {
                    if (config.app_qq == 0) {
                        $('#qq').css('display', 'none')
                        i++;
                    }
                    if (config.app_wx == 0) {
                        $('#wechat').css('display', 'none')
                        i++;
                    }
                    if (config.app_wb == 0) {
                        $('#sina').css('display', 'none')
                        i++;
                    }
                } else {
                    if (/MicroMessenger/.test(navigator.userAgent)) {
                        $('#qq').css('display', 'none')
                        $('#sina').css('display', 'none')
                        i = 2;
                        if (config.gzh_wx == 0) {
                            $('#wechat').css('display', 'none')
                            i++;
                        }
                    } else {
                        $('#wechat').css('display', 'none')
                        i++;
                        if (config.h5_qq == 0) {
                            $('#qq').css('display', 'none')
                            i++;
                        }
                        if (config.h5_wb == 0) {
                            $('#sina').css('display', 'none')
                            i++;
                        }
                    }
                }
                if (i == 3) {
                    $("#loginss").css('display', 'none');
                }
            } else {
                tip('error', res.msg);
            }
        }).fail(function (res) {
            tip('error', '网络错误');
        })
    }

    $('#back').click(() => {
        if (/LT-APP/.test(navigator.userAgent)) {
            jsBridge.backToHome(true);
        } else {
            window.history.go(-1);
        }
    });
    // 动态给 main高度
    $('.main').css("height", (document.body.clientHeight - $(".logo").height()) + "px");
    $("#login").click(() => {
        var style = $("#login-box").css("display");
        if (style == 'none') {
            $("#login-box").css("display", "");
            $("#reg-box").css("display", "none");
            $("#login").addClass('active');
            $("#reg").removeClass('active');
            $('.btns .btn').css('background', '');
            $('.btns .active').css('background', 'linear-gradient(to right, ' + config.button_left_color + ', ' + config.button_right_color + '')
        }
    })
    $("#reg").click(() => {
        var style = $("#reg-box").css("display");
        if (style == 'none') {
            $("#login-box").css("display", "none");
            $("#reg-box").css("display", "");
            $("#login").removeClass('active');
            $("#reg").addClass('active');
            $('.btns .btn').css('background', '');
            $('.btns .active').css('background', 'linear-gradient(to right, ' + config.button_left_color + ', ' + config.button_right_color + '')
        }
    })
    $(".forget").click(() => {
        tip('error', '暂未开放');
    })
    $("#tologin").click(() => {
        var username = $("#username").val(),
            password = $("#password").val();
        //do check param
        if (checkUsername(username) && checkPassword(password)) {
            //todo:: succcess
            bui.ajax({
                url: "/plugin.php?id=yimen_app&s=user/login",
                method: 'POST',
                data: {
                    username,
                    password
                }
            }).done(function (res) {
                if (res.code == 1) {
                    tip('check', '登录成功');
                    if (/LT-APP/.test(navigator.userAgent)) {
                        // in app
                        jsBridge.backToHome(true);
                    } else {
                        try {
                            window.location = document.referrer
                        } catch (e) {
                            window.Location = './';
                        }
                    }
                } else {
                    tip('error', res.msg);
                }
            }).fail(function (res) {
                tip('error', '网络错误');
            })
        }
    });
    $("#toreg").click(() => {
        var username = $("#rusername").val(),
            email = $("#remail").val(),
            password = $("#rpassword").val();
        //do check param
        if (checkUsername(username) && checkEmail(email) && checkPassword(password)) {
            //todo:: succcess
            bui.ajax({
                url: "/plugin.php?id=yimen_app&s=user/reg",
                method: 'POST',
                data: {
                    username,
                    email,
                    password
                }
            }).done(function (res) {
                if (res.code == 1) {
                    tip('check', '注册成功');
                    $('#login').click();
                    $("#username").val(username);
                    $("#password").val(password);
                    console.log('注册成功');
                } else {
                    tip('error', res.msg);
                }
            }).fail(function (res) {
                tip('error', '网络错误');
            })
        }
    });
    $('#qq').click(() => {
        //qq登录
        if (/LT-APP/.test(navigator.userAgent)) {
            qqLogin();
        } else {
            webLogin('qq');
        }
    });
    $('#wechat').click(() => {
        //qq登录
        if (/LT-APP/.test(navigator.userAgent)) {
            wxLogin();
        } else {
            webLogin('wechat');
        }
    });
    $('#sina').click(() => {
        //qq登录
        if (/LT-APP/.test(navigator.userAgent)) {
            sinaLogin();
        } else {
            webLogin('sina');
        }
    });

    function tip(type, msg) {
        bui.hint({
            content: "<i class='icon-" + type + "'></i><br />" + msg,
            position: "center",
            effect: "fadeInDown"
        });
    }

    function checkUsername(username) {
        if (username == '') {
            tip('error', '用户名不能为空');
            return false;
        }
        return true;
    }

    function checkEmail(email) {
        if (email == '') {
            tip('error', '邮箱不能为空');
            return false;
        }
        var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
        if (!reg.test(email)) {
            tip('error', '邮箱格式不正确');
            return false;
        }
        return true;
    }

    function checkPassword(password) {
        if (password == '') {
            tip('error', '密码不能为空');
            return false;
        }
        return true;
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
            }
        });
    }

    function toLogin(type, data) {
        bui.ajax({
            url: "/plugin.php?id=yimen_app&s=login/app_" + type,
            method: 'POST',
            data: data
        }).done(function (res) {
            if (res.code == 1) {
                tip('check', '登录成功');
                jsBridge.backToHome(true);
            } else {
                tip('error', res.msg);
            }
        }).fail(function (res) {
            alert(res);
            tip('error', '网络错误');
        })
    }

    function webLogin(type) {
        bui.ajax({
            url: "/plugin.php?id=yimen_app&s=login/get_oauth_url&type=" + type,
            method: 'POST'
        }).done(function (res) {
            if (res.code == 1) {
                window.location.href = res.url
            } else {
                tip('error', res.msg);
            }
        }).fail(function (res) {
            tip('error', '网络错误');
        })
    }
});