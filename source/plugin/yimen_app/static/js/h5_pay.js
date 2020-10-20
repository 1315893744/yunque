var jq = jQuery.noConflict();
var goodsList = [];

function showMenu() {
    document.getElementById("yimen_x").style.display = "";
    document.getElementById("yimen_menu").style.display = "";
    jq.ajax({
        url: "./plugin.php?id=yimen_app&s=goods/lists",
        type: "GET",
        dataType: 'json',
        success: (res) => {
            if (res.code == 1) {
                goodsList = res.data
                var html = '';
                for (var i = 0; i < res.data.length; i++) {
                    html += '<label><input type="radio" name="amount" value="' + i + '"><div>' + str_decode(res.data[i]['name']) + '(' + res.data[i]['amount'] + lang('yuan') + ')</div></label>';
                }
                jq("#goods_list").html(html)
            } else {
                alert(lang('loadgoodserr'));
            }
        },
        error: (res) => {
            alert(lang('loadgoodserr'));
        }
    });
}

function closeMenu() {
    document.getElementById("yimen_x").style.display = "none";
    document.getElementById("yimen_menu").style.display = "none";
}

function pay(type) {
    //支付宝支付
    var obj = document.getElementsByName("amount");
    var id = '';
    for (var i = 0; i < obj.length; i++) {
        if (obj[i].checked) {
            id = obj[i].value
        }
    }
    if (id == '') {
        alert(lang('chosegoods'));
        return;
    }
    toPay(id, type);
}

function toPay(id, type) {
    var types = type == 0 ? (isWeiXin() ? 'wechat_mp' : 'wechat_wap') : 'alipay_wap';
    var data = {
        'goods_id': goodsList[id]['id'],
        "amount": goodsList[id]['amount'],
        "name": goodsList[id]['name'],
        "type": types
    };
    jq.ajax({
        url: "./plugin.php?id=yimen_app&s=order/create",
        type: "POST",
        data: data,
        dataType: 'json',
        success: (res) => {
            if (res.code == 1) {
                if (types == 'wechat_mp') {
                    jq.ajax({
                        url: "./plugin.php?id=yimen_app&s=login/get_oauth_url&type=wechat_pay&order_id=" + res.order_id,
                        type: "POST",
                        dataType: 'json',
                        success: (ress) => {
                            window.location.href = ress.url
                        },
                        error: (ress) => {
                            alert(JSON.stringify(ress));
                        }
                    });
                } else {
                    window.location.href = './plugin.php?id=yimen_app&s=pay/' + data.type + '&order_id=' + res.order_id
                }
                closeMenu();
            } else {
                alert(res.msg);
            }
        },
        error: (res) => {
            alert(lang('creatordererr'));
        }
    });
}

function isWeiXin() {
    var ua = window.navigator.userAgent.toLowerCase();
    if (ua.match(/MicroMessenger/i) == 'micromessenger') {
        return true;
    } else {
        return false;
    }
}