var jq = jQuery.noConflict();
var goodsList;
var indexs;

jq(function () {
    console.log((new Date()).valueOf());
    try {
        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
        if (index) {
            parent.location.reload();
            parent.layer.close(index);
        }
    } catch (err) {

    }
    jq('#yimen_app_pay').on('click', function () {
        var html = '';
        if (wechat_ok == 1) {
            html += '<div style="width: 85px;color: #ffffff;margin-right: 10px;background: #00CC00;cursor: pointer;"onclick="toPay(\'wechat_scan\')">' + lang('wxpay') + '</div>';
        }
        if (alipay_ok == 1) {
            html += '<div style="width: 85px;color: #ffffff;background: #00a5e0;cursor: pointer;" onclick="toPay(\'alipay_web\')">' + lang('alipay') + '</div>';
        }
        if (html == '') {
            html = lang('nopay')
        }
        indexs = layer.open({
            type: 1,
            title: lang('paycenter'),
            area: ['600px', '360px'],
            shadeClose: true, //点击遮罩关闭
            content: `
                <div style="display: flex;height: 100%">
                    <div style="width: 400px;border-right: 1px solid #F6F6F6">
                        <div style="height: 40px;line-height: 40px;margin: 0 10px;color: #3CA0EC">` + lang('goodslist') + `</div>
                        <div class="label_box" id="goods_list"></div>
                    </div>
                    <div style="width: 200px;">
                        <div style="height: 40px;line-height: 40px;margin: 0 10px;color: #3CA0EC">` + lang('paytype') + `</div>
                        <div style="display: flex;margin: 10px;height: 30px;line-height: 30px;text-align: center;" id="pay-btns">
                           ` + html + `  
                        </div>
                        <div style="text-align: center;display: none" id="qrcode-text">` + lang('wechatscan') + `</div>
                        <div style="height: 180px;margin:10px 20px;display: none" id="qrcode"></div>
                    </div>
                </div>
            `
        });
        setTimeout(() => {
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

        }, 500);
    });
});

function toPay(type) {
    var obj = document.getElementsByName("amount");
    var id = '';
    for (var i = 0; i < obj.length; i++) {
        if (obj[i].checked) {
            id = obj[i].value
        }
    }
    if (id == '') {
        layer.msg(lang('chosegoods'));
        return;
    }

    var data = {
        'goods_id': goodsList[id]['id'],
        "amount": goodsList[id]['amount'],
        "name": goodsList[id]['name'],
        "type": type
    };
    jq.ajax({
        url: "./plugin.php?id=yimen_app&s=order/create",
        type: "POST",
        data: data,
        dataType: 'json',
        success: (res) => {
            if (res.code == 1) {
                if (type == 'wechat_scan') {
                    var order_id = res.order_id
                    jq.ajax({
                        url: "./plugin.php?id=yimen_app&s=pay/" + type + "&order_id=" + res.order_id,
                        type: "POST",
                        data: data,
                        dataType: 'json',
                        success: (ress) => {
                            layer.msg(ress.msg);
                            if (ress.code == 1) {
                                jq("#pay-btns").css('display', 'none')
                                jq("#qrcode-text").css('display', '')
                                jq("#qrcode").css('display', '')
                                jq('#qrcode').qrcode({
                                    text: ress.qrcode,
                                    height: 160,
                                    width: 160,
                                    logo: './source/plugin/yimen_app/static/img/wx.jpg'//这里配置Logo的地址即可。
                                });
                                find_order(order_id)
                            } else {
                                alert(res.msg);
                            }
                        },
                        error: (res) => {
                            layer.msg(lang('creatordererr'));
                        }
                    });
                } else {
                    window.location.href = "./plugin.php?id=yimen_app&s=pay/" + type + "&order_id=" + res.order_id
                }

            } else {
                alert(res.msg);
            }
        },
        error: (res) => {
            layer.msg(lang('intererr'));
        }
    });
}

function find_order(order_id) {
    jq.ajax({
        url: "./plugin.php?id=yimen_app&s=pay/wx_find&order_id=" + order_id,
        type: "GET",
        dataType: 'json',
        success: (res) => {
            if (res.code == 1) {
                layer.msg(lang('orderok'));
                setTimeout(() => {
                    layer.close(indexs)
                }, 1000)
            } else {
                setTimeout(() => {
                    find_order(order_id)
                }, 3000);
            }
        },
        error: (res) => {
            alert(lang('loadgoodserr'));
        }
    });
}