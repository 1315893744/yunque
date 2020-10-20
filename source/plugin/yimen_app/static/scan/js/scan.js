bui.ready(function () {
    var code = getQueryVariable('code');
    if (!code) {
        $('#tip').html('请重新生成登录二维码！');
        $('#btns').css('display', 'none');
    } else {
        bui.ajax({
            url: "/plugin.php?id=yimen_app&s=user/scan_check",
            method: 'POST',
            data: {
                code,
                type: 'app'
            }
        }).done(function (res) {
                if (res.code == 1) {
                    $('#tip').html('是否允许当前账号登录PC设备！');
                } else {
                    $('#tip').html(res.msg);
                    $('#btns').css('display', 'none');
                }
            }
        ).fail(function (res) {
            tip('error', '网络错误');
        })
    }
    $('#login').click(function () {
        bui.ajax({
            url: "/plugin.php?id=yimen_app&s=user/scan_notify",
            method: 'POST',
            data: {
                code
            }
        }).done(function (res) {
            $('#tip').html(res.msg);
            tip('error', res.msg);
            setTimeout(function () {
                back();
            }, 1000);
        }).fail(function (res) {
            tip('error', '网络错误');
        })
    })
    $('#exit').click(function () {
        back();
    })

    function back() {
        if (/LT-APP/.test(navigator.userAgent)) {
            jsBridge.backToHome(true);
        } else {
            window.history.go(-1);
        }
    }

    function tip(type, msg) {
        bui.hint({
            content: "<i class='icon-" + type + "'></i><br />" + msg,
            position: "center",
            effect: "fadeInDown"
        });
    }

    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return (false);
    }
})