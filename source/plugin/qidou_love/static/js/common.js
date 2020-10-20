function goLogin(){
    if( is_appbyme ){
        connectSQJavascriptBridge(function(){});
        sq.login(function(userInfo){});
    }else{
        document.location = siteurl+"/member.php?mod=logging&action=login"
    }
}
function appbymeCallBack(result){
    if(result.errmsg == "OK"){
        window.location.reload();
        return false;
    }
}
function open_page( main,type ){
    $(document).on('click',main,function (){
        if( is_appbyme && type ){
            sq.topicDetail($(this).attr('tid'),0,1);
        }else{
            var open_url = $(this).attr('href');
            open_page_url( open_url );		
        }
        return false;
    });
}
function open_page_url( open_url ){
    if( is_appbyme ){
        sq.urlRequest( open_url );
    }else{
        window.location.href = open_url;
    }
}
function imagePreview( imageArray,index ){
    sq.imagePreview(imageArray,index);
}
function load_images( main ){
    var images = $(main).find('img[is_load=false]');
    var len = images.length;
    for( var i=0; i<len; i++ ){
        images.eq(i).attr({'src':images.eq(i).attr('_src')});
    }
    images.removeAttr('_src is_load');
}
function down_loading( data,data_url,main,calc_main ){
    var onOff = true;
    var vHeight = $(window).height();
    var dHeight = $(document).height();
    var lHeight = $('.loading').height();
    var data_url = data_url;

    $(document).bind('touchstart',start);
    $(document).bind('touchmove',scroll_loading);

    function start(){
        dHeight = $(document).height();
    }
    
    function scroll_loading(){
        var scrollTop = $(document).scrollTop(); 
        
        if( onOff && scrollTop + vHeight > dHeight - (lHeight+lHeight/2) ){
            if( $(main).children().length < 10 ){
                $(document).unbind('touchstart',start);
                $(document).unbind('touchmove',scroll_loading);
                return;
            }
            onOff = false;
            $('.loading').css({display:'-webkit-box'});
            $('.loading_main').css({WebkitAnimation:'loading 1s infinite linear'});
            data.start++;
            ajax_get_data( data );
        }
    }

    function ajax_get_data( data ){
        $.ajax({
            type:'post',
            url:data_url,
            data:data,
            success:function ( data ){
                if( $.trim(data) ){
                    onOff = true;
                    $('.loading').hide();                
                    $(main).html($(main).html()+data);
                    calc_main && calc_distance(calc_main);
                    $('.loading_main').css({animationPlayState:'loading 1s infinite linear paused'});
                }else{
                    $(document).unbind('touchstart',start);
                    $(document).unbind('touchmove',scroll_loading);
                    $('.loading').html("\u6ca1\u6709\u66f4\u591a\u5185\u5bb9\u4e86\uff01");
                }
            },
            error:function (){
                console.log("\u52a0\u8f7d\u5931\u8d25\uff0c\u8bf7\u91cd\u8bd5\uff01");
            }
        });
    }
}
function repeat_loading(){
    var vHeight = $(window).height();
    var dHeight = $('.page_main').height();
    var lHeight = $('.loading').height();
    
    $(document).bind('touchstart',start);
    $(document).bind('touchmove',scroll_loading);

    function start(){
        dHeight = $(document).height();
        if( loading_data.data.onOff ){
            $('.loading').html('<div class="loading_main"></div>');
        }else{
            $('.loading').hide();
        }
    }
    
    function scroll_loading(){
        var scrollTop = $('.page_main').scrollTop(); 
        
        if( loading_data.data.onOff && scrollTop + vHeight > dHeight - (lHeight+lHeight/2) ){
            loading_data.data.onOff = false;
            $('.loading').css({display:'-webkit-box'});
            $('.loading_main').css({WebkitAnimation:'loading 1s infinite linear'});
            loading_data.data.start++;
            ajax_get_data( loading_data.data );
        }
    }

    function ajax_get_data( data ){
        $.ajax({
            type:'post',
            url:loading_data.url,
            data:data,
            success:function ( data ){
                if( $.trim(data) ){
                    loading_data.data.onOff = true;
                    $('.loading').hide();                
                    $(loading_data.main).html($(loading_data.main).html()+data);
                    $('.content_wrap').css({height:$(loading_data.main).height()+100});
                    $('.loading_main').css({animationPlayState:'loading 1s infinite linear paused'});
                    load_images( loading_data.main );
                }else{
                    $('.loading').html("\u6ca1\u6709\u66f4\u591a\u5185\u5bb9\u4e86\uff01");
                    setTimeout(function (){
                        $('.loading').hide();
                    },1000);
                }
            },
            error:function (){
                console.log("\u52a0\u8f7d\u5931\u8d25\uff0c\u8bf7\u91cd\u8bd5\uff01");
            }
        });
    }
}
function get_position( main ){
    if( !is_appbyme ){
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function (p){
                position_data.lat = decimal_cut(p.coords.latitude);
                position_data.lng = decimal_cut(p.coords.longitude);
                if( main ){
                    global_map = new AMap.LngLat(position_data.lng,position_data.lat);
                    calc_distance(main);
                }
            });
        }
    }else if( is_appbyme ){
        connectSQJavascriptBridge(function(bridge){
            sq.getLocation(function(data){
                position_data.lat = decimal_cut(data.lat);
                position_data.lng = decimal_cut(data.lng);
                if( main ){
                    global_map = new AMap.LngLat(position_data.lng,position_data.lat);
                    calc_distance(main);
                }
            });
        });
    }
}
function calc_distance(main){
    if( !position_data.lng || !position_data.lat )return;
    var calc_arr = $(main+'[is_calc=false]');
    var len = calc_arr.length;

    for( var i=0; i<len;i++ ){
        var calc_dom = calc_arr.eq(i);
        var lat = calc_dom.attr('lat');
        var lng = calc_dom.attr('lng');
        var before = calc_dom.attr('before') || '';
        lat = lat?decimal_cut(lat):0;
        lng = lng?decimal_cut(lng):0;
        calc_dom.attr({is_calc:'true'});
        lat&&lng&&calc_dom.html(before+decimal_cut(global_map.distance([lng,lat])/1000,2)+'km');
    }
}
function decimal_cut( number,length ){
    var number = number+'';
    var length = length?length:6;
    return number.substr(0,number.indexOf('.')+(length+1));
}
function set_time( obj,end_time ){
    var aDate = getTimes( end_time );
    var sDate = aDate.Day + ':' +aDate.Hours +':' +aDate.Minutes + ':' + aDate.Senconds;
    var arrDate = sDate.split(':');
    var aDateLen = arrDate.length;
    var time = '';
    var newDate = [];
    var onOff = false;


    if( aDate.status == 2 ){
        for(var i=0; i<aDateLen; i++){
            if( arrDate[i] >0 || onOff ){
                onOff = true;
                newDate.push(arrDate[i]);
            }
        }
        time = newDate.join(':');
        $(obj).html(time);
    }else if( aDate.status == 3 ){
        clearInterval(timer);
    }
    return aDate.status;
}
function getTimes( end_time ){
    var oTime = Math.round(new Date().getTime()/1000);
    if( oTime == end_time){
        return {status:3};
    }
    var jDate = {};
    if( oTime < end_time ){
        jDate.status = 2;
        jDate.Day = cover(Math.floor((end_time - oTime)/86400));
        jDate.Hours = cover(Math.floor((end_time - oTime)/3600)%24);
        jDate.Minutes = cover(Math.floor((end_time - oTime)/60)%60);
        jDate.Senconds = cover((end_time - oTime)%60);
    }else{
        jDate.status = 3;
    }
    return jDate;
}
function cover(Numbers){
    return Numbers < 10 ? '0'+Numbers : Numbers;
}