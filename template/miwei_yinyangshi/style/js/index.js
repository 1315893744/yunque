jQuery("#banner .banner_wrap").html(i);
						for (var t = 0; t < jQuery("#banner .banner_wrap a").length; t++) jQuery("#banner .banner_nav").append("<a></a>");
						jQuery("#banner").slide({
							mainCell: ".banner_wrap",
							titCell: ".banner_nav a",
							effect: "left",
							autoPlay: !0,
							interTime: 5e3
					});
					
					jQuery(".shishen_tabs a").click(function() {
						var e = jQuery(this),
						s = e.data("tab");
						e.addClass("cur").siblings().removeClass("cur"),
						l({
							level: s
						})
					});
					
					jQuery(".role-swiper .slide").eq(0).addClass("active"),
					jQuery(".role-swiper .next").addClass("active");
					var e = jQuery(".role-swiper"),
					s = 0,
					n = e.find(".slide").length;
					jQuery(".role-swiper").on("click", ".next",
					function() {
						s++,
						s = s >= n ? 0 : s,
						jQuery(".role-swiper .slide").removeClass("active"),
						setTimeout(function() {
							jQuery(".role-swiper .slide").eq(s).css("display", "block").siblings().css("display", "none"),
							setTimeout(function() {
								jQuery(".role-swiper .slide").eq(s).addClass("active")
							},
							30)
						},
						900)
					});
								
					jQuery(".close_donwloadbar").click(function() {
						n.addClass("fold"),
						setTimeout(function() {
							e.show(),
							s.hide()
						},
						150)
					}),
					jQuery(".fold_wrap").click(function() {
						n.removeClass("fold"),
						e.hide(),
						s.show()
					}),
					jQuery(".tab_btn_wrap > a").click(function() {
						jQuery(this).closest(".index_side_bar").fadeOut(340).removeClass("Priority-Low"),
						jQuery(this).closest(".index_side_bar").siblings(".index_side_bar").addClass("Priority-Low").show()
					}),
					jQuery(".back_top").click(function() {
						jQuery(document.body).animate({
							scrollTop: 0
						},
						300),
						jQuery(document.documentElement).animate({
							scrollTop: 0
						},
						500)
					}),
					jQuery(".news_wrap").slide({
						mainCell: ".news_list",
						titCell: ".news_tabs .news_tab",
						effect: "left",
						startFun: function(e) {
							jQuery(".news_tabs .news_tab").eq(e).addClass("active").siblings().removeClass("active")
						}
					}),
					jQuery(".tongren_section").slide({
						mainCell: ".tongren_pics_wrap",
						titCell: ".tongren_tabs a",
						effect: "left",
						startFun: function() {}
					}),
					jQuery(".shishen_section .com_tabs a").hover(function() {
						var e = jQuery(this),
						s = e.data("tab");
						e.addClass("active").siblings("a").removeClass("active"),
						jQuery('.pingan_container section[data-tab="' + s + '"]').addClass("show").siblings("section").removeClass("show")
					}),
					jQuery(".zhujue_tabs .zhujue_tab").hover(function() {
						var e = jQuery(this),
						s = e.data("tab");
						e.addClass("cur").siblings("a").removeClass("cur"),
						jQuery('.zhujue_wrap[data-tab="' + s + '"]').addClass("show").siblings(".zhujue_wrap").removeClass("show")
					}),
					jQuery(".strategy_banner").slide({
						mainCell: ".strategy_banner_wrap",
						titCell: ".strategy_banner_nav",
						autoPage: "<a></a>",
						effect: "left",
						autoPlay: !0,
						interTime: 5e3
					}),
					jQuery(".right_strategy_part").slide({
						mainCell: ".strategy_list",
						titCell: ".com_tabs .tab_item",
						titOnClassName: "active",
						effect: "left"
					}),
					jQuery(window).scroll(function() {
						jQuery(document).height() <= jQuery(window).height() + jQuery(window).scrollTop() + 200 && jQuery(".page_footer").addClass("animate")
					})