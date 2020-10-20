var jq = jQuery.noConflict();

function loadAsyncScript(src, callback) {
    var head = document.getElementsByTagName("head")[0];
    var script = document.createElement("script");
    script.setAttribute("type", "text/javascript");
    script.setAttribute("src", src);
    script.setAttribute("async", true);
    script.setAttribute("defer", true);
    head.appendChild(script);
    if (script.readyState) {
        script.onreadystatechange = function () {
            var state = this.readyState;
            if (state === 'loaded' || state === 'complete') {
                callback();
            }
        }
    } else {
        script.onload = function () {
            callback();
        }
    }
}

function isWeiXin() {
    var ua = window.navigator.userAgent.toLowerCase();
    if (ua.match(/MicroMessenger/i) == 'micromessenger') {
        return true;
    } else {
        return false;
    }
}

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
    toLogin('qq')
}

function wxLogin() {
    //微信登录
    if (isWeiXin()) {
        toLogin('wechat')
    }
}

function sinaLogin() {
    toLogin('sina')
}

function toLogin(type) {
    jq.ajax({
        url: "./plugin.php?id=yimen_app&s=login/get_oauth_url&type=" + type,
        type: "POST",
        dataType: 'json',
        success: (res) => {
            console.log(res);
            if (res.code == 1) {
                window.location.href = res.url
            }
        },
        error: (res) => {
            alert(JSON.stringify(res));
        }
    });
}