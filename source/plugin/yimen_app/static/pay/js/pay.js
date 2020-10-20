bui.ready(function () {
    var goodList = [];
    var payType = [0, 0];
    var chooseGoods = -1;
    var userAmount = 0;
    var color = '';

    //初始化
    function init() {
        bui.ajax({
            url: "/plugin.php?id=yimen_app&s=order/info",
            method: 'POST',
        }).done(function (res) {
            userAmount = parseInt(res.data.money);
            payType = res.data.payType;
            loadPayType();
            changeUserAmount();
            $('#money-name').html(res.data.moneyName + "余额");
            color = res.data.color;
            initColor()
        }).fail(function (res) {
            tip('error', '网络错误');
        })
        bui.ajax({
            url: "/plugin.php?id=yimen_app&s=goods/lists",
            method: 'POST',
        }).done(function (res) {
            if (res.code == 1) {
                res.data.forEach((item) => {
                    goodList.push({
                        id: item.id,
                        amount: item.amount,
                        name: str_decode(item.name)
                    })
                    loadGoods();
                })
            } else {
                tip('error', res.msg);
                setTimeout(function () {
                    if (/LT-APP/.test(navigator.userAgent)) {
                        jsBridge.backToHome(true);
                    } else {
                        window.history.go(-1);
                    }
                }, 1000);
                return;
            }
        }).fail(function (res) {
            tip('error', '网络错误');
        })
        $('#back').click(() => {
            if (/LT-APP/.test(navigator.userAgent)) {
                jsBridge.backToHome(true);
            } else {
                window.history.go(-1);
            }
        });
    }

    init();
    $('#to-pay').click(() => {
        if (chooseGoods == -1) {
            tip('error', '请选择支付金额');
            return false;
        }
        var pay = $("input[name='pay']:checked").val();
        if (pay == undefined) {
            tip('error', '请选择支付方式');
        } else if (pay == 'wechat' && payType[0] == 0) {
            tip('error', '微信支付不可用');
        } else if (pay == 'alipay' && payType[1] == 0) {
            tip('error', '支付宝支付不可用');
        } else {
            //todo:: pay
            toPay(pay)
        }
    });

    function initColor() {
        $('head').append(`<style>
            .info-box{ background:url(./img/bg.png),linear-gradient(to bottom, ${color}, ${color});}
            .pay-bar{background:${color} !important;}
			.check-goods{border:0.01rem solid ${color};}
			.goods-amount{color:${color};}
			.bui-radio:checked:before{color:${color};}
			.pay-btn{background:${color};}
		</style>`);
    }

    function tip(type, msg) {
        bui.hint({
            content: "<i class='icon-" + type + "'></i><br />" + msg,
            position: "center",
            effect: "fadeInDown"
        });
    }

    function changeUserAmount() {
        up({
            el: $("#user-amount"),
            max: userAmount,
            start: 0//增加开始的初始值
        });
    }

    //加载商品
    function loadGoods() {
        var html = ''
        goodList.forEach(function (item, index) {
            html += `<div class="goods-info" id="goods-${index}">
						<div class="goods-amount"><span>￥</span>${item.amount}</div>
						<div class="goods-name">${item.name}</div>
					</div>`;
        });
        $('#goods-list').html(html);
        loadGoodsClick();
    }

//选择商品
    function loadGoodsClick() {
        goodList.forEach(function (item, index) {
            $("#goods-" + index).click(() => {
                if (chooseGoods != index) {
                    chooseGoods = index;
                    changeAmount();
                    changeGoodsClick();

                }
            });
        })
    }

//改变金额
    function changeAmount() {
        $("#amount").html(goodList[chooseGoods].amount);
    }

//改变商品按钮的状态
    function changeGoodsClick() {
        goodList.forEach(function (item, index) {
            if (chooseGoods == index) {
                $("#goods-" + index).addClass('check-goods');
            } else {
                $("#goods-" + index).removeClass('check-goods');
            }
        })
    }

//加载支付方式
    function loadPayType() {
        var i = 0;
        var html = '';
        payType.forEach((item, index) => {
            if (item == 1) {
                var title = index == 0 ? '微信支付' : '支付宝支付';
                var name = index == 0 ? 'wechat' : 'alipay';
                var font = index == 0 ? '&#xe62e;' : '&#xe636;';
                var color = index == 0 ? '#8CB922' : '#3CA0EC';
                html += `<li class="bui-btn bui-box pay-item">
				<div class="span1">
					<label for="interest21"><i class="iconfont" style="color:${color};">${font}</i> ${title}</label>
				</div>
				<input type="radio" class="bui-radio" name="pay" value="${name}">
			</li>`;
                i++;
            }
        });
        if (i == 0) {

        } else {
            $('#pay-type').html(html);
        }
    }

    function up(obj) {
        var item = obj.el;
        var num = obj.max;
        var start = obj.start;
        var time2 = setInterval(function () {
            start += Math.ceil(num / 1000);
            if (start > num) {
                start = num;
                clearInterval(time2);
            }
            item.text(start)
        }, 1)
    }

    //支付方式
    function toPay(type) {
        var types;
        var inApp = /LT-APP/.test(navigator.userAgent);
        if (inApp) {
            types = type + '_app';
        } else if (/MicroMessenger/.test(navigator.userAgent)) {
            if (type != 'wechat') {
                tip('error', '不支持支付宝支付');
                return false;
            }
            types = "wechat_mp";
        } else {
            types = type + '_wap';
        }
        var data = {
            'goods_id': goodList[chooseGoods]['id'],
            "amount": goodList[chooseGoods]['amount'],
            "name": str_encode(goodList[chooseGoods]['name']),
            "type": types
        };

        bui.ajax({
            url: "/plugin.php?id=yimen_app&s=order/create",
            method: "POST",
            data: data,
        }).done(function (res) {
            if (res.code == 1) {
                if (inApp) {
                    jsBridge.pay({
                        channel: type == 'wechat' ? 0 : 1, //0为微信支付, 1为支付宝, 2为银联
                        orderid: res.order_id,
                        title: goodList[chooseGoods]['name'],
                        amount: data.amount,
                        attach: "yimen"  //附加字段，通知时原样返回
                    }, function (succ, text) {
                        if (succ) {
                            alert('支付成功');
                        } else {
                            alert('支付失败');
                        }
                    });
                } else if (/MicroMessenger/.test(navigator.userAgent)) {
                    bui.ajax({
                        url: "/plugin.php?id=yimen_app&s=login/get_oauth_url&type=wechat_pay&order_id=" + res.order_id,
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
                } else {
                    window.location.href = '/plugin.php?id=yimen_app&s=pay/' + data.type + '&order_id=' + res.order_id
                }
            } else {
                alert(res.msg);
            }
        }).fail(function (res) {
            tip('error', '网络错误');
        });
    }
})
;