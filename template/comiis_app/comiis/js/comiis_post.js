function comiis_picnum() {
	var a = $('#imglist li').length - 1;
	if(a){
		$('.comiis_pictitle>span').show().text(a);
	}else{
		$('.comiis_pictitle>span').hide().text(0);
	}
}
function comiis_relatekw() {
	var subject = comiis_replace($('#needsubject').val()),
	message = comiis_replace($('#needmessage').val());
	message = message.replace(/&/ig, '', message).substr(0, 500);
	var url = 'misc.php?op=comiis_relatekw&mod=faq&inajax=yes&subjectenc=' + subject + '&messageenc=' + message;
	$.ajax({
		type:'GET',
		url:url,
		dataType:'xml',
	}).success(function(s) {
		try {
			if(s.lastChild.firstChild.nodeValue.length){
				var a = s.lastChild.firstChild.nodeValue,
				tagsplit = $('#tags').val().split(','),
				returnsplit = a.split(','),
				result = '';
				for(i in tagsplit) {
					for(j in returnsplit) {
						if(tagsplit[i] == returnsplit[j]) {
							tagsplit[i] = '';break;
						}
					}
				}
				for(i in tagsplit) {
					if(tagsplit[i] != '') {
						result += tagsplit[i] + ',';
					}
				}
				$('#tags').val(result + a);
			}
			comiis_tagvalue();
		}catch(e){}
	});
}
function comiis_replace(a) {
	a = a.replace(/<\/?[^>]+>|\[\/?.+?\]|"/ig, "");
	a = a.replace(/\s{2,}/ig, ' ');
	return a;
}
function comiis_tagvalue() {
	if($('#tags').val().length){
		$('.comiis_tagtitle').addClass('comiis_tag');
	}else{
		$('.comiis_tagtitle').removeClass('comiis_tag');
	}
}
function comiis_smilies_tab(a){
	if(typeof smilies_array[a] == 'object') {
		var comiis_smilies_list = '<div class="swiper-slide"><ul class="swiper-slide">';
		var o = 0, comiis_smilies_text = '';
		
		for(ii in smilies_array[a]) {
			for(i in smilies_array[a][ii]) {
				o++;
				if(o > 24){
					o = 1;
					comiis_smilies_list += '</ul></div><div class="swiper-slide"><ul class="swiper-slide">';
				}
				comiis_smilies_text = smilies_array[a][ii][i][1].replace(/\'/, '\\\'');
				comiis_smilies_list += '<li><a href="javascript:;" onclick="comiis_addsmilies(\'' + comiis_smilies_text + '\');"><img src="' + STATICURL + 'image/smiley/' + smilies_type['_' + a][1] + '/' + smilies_array[a][ii][i][2] + '" class="vm"></a></li>';
			}
		}
		comiis_smilies_list += '</ul></div>';
		$('.bqbox_c').html(comiis_smilies_list);
		mySwiper.update();
		mySwiper.slideTo(0, 0, false);
		$('#comiis_smilies_key>li>a').removeClass('bg_f b_l b_r');
		$('#comiis_smilies_tab' + a).addClass("bg_f b_l b_r");
	}else{
		popup.open('This smilies is closed or does not exist !', 'alert');
	}
}
function comiis_addsmilies(a){
	$('#needmessage').comiis_insert(a);}
var mySwiper, comiis_smilies_array = [];
$(document).ready(function() {
	$('#needmessage').on('keydown', function(event){
		if(event.keyCode == "8") {
			return $('#needmessage').comiis_delete();
		}
	});
	mySwiper = new Swiper('.comiis_smiley_box',{
		pagination: '.bqbox_b',
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
	var comiis_tab_index = 99;
	var smilies_show_id = 0;
	
	$(document).on('click', '.comiis_post_ico>a', function(e) {
		if(comiis_tab_index != $(this).index()){
			$('.comiis_post_ico a i').removeClass('f_0');
			$(this).find('i').addClass("f_0");
			comiis_tab_index = $(this).index();
			$("#comiis_post_tab>div").hide().eq(comiis_tab_index).fadeIn();
			if(smilies_show_id == 0 && comiis_tab_index == 0){
				var smilies_type_box = '';
				if(typeof smilies_type == 'object') {
					for(i in smilies_type) {
						key = i.substring(1);
						smilies_type_box += '<li><a href="javascript:;" onclick="comiis_smilies_tab(\''+ key+ '\')" id="comiis_smilies_tab'+ key+ '"' + (smilies_show_id == 0 ? ' class="bg_f"' : '') + '><img src="' + STATICURL + 'image/smiley/' + smilies_type['_' + key][1] + '/' + smilies_array[key][1][0][2] + '" class="vm"></a></li>';
						if(smilies_show_id == 0){
							smilies_show_id = key;
						}
					}
					$('#comiis_smilies_key').html(smilies_type_box);
					comiis_smilies_tab(smilies_show_id)
				}
			}
		}else{
			if($(this).find('i').hasClass("f_0")){
				$('.comiis_post_ico a i').removeClass('f_0');
				$("#comiis_post_tab>div").eq(comiis_tab_index).hide();
			}else{
				$(this).find('i').addClass("f_0");
				$("#comiis_post_tab>div").eq(comiis_tab_index).fadeIn();
			}
		}
	});
	if(action != 'reply'){
		$('.comiis_get_tag').on('click', function() {
			comiis_relatekw();
		});
		$('#needsubject').blur(function(){
			comiis_relatekw();
		});
		$('#tags').blur(function(){
			comiis_tagvalue();
		});
	}
	for(i in smilies_array) {
		for(o in smilies_array[i][1]) {
			if (typeof comiis_smilies_array[smilies_array[i][1][o][1].length] != 'object') {
				comiis_smilies_array[smilies_array[i][1][o][1].length] = new Array();
			}
			comiis_smilies_array[smilies_array[i][1][o][1].length].push(smilies_array[i][1][o][1]);
		}
	}
	comiis_smilies_array.reverse();
	comiis_picnum();
});