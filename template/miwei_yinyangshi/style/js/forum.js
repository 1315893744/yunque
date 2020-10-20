// slide show
function Focus(option) {
	function byid(id) {
		return document.getElementById(id);
	}
	function bytag(tag, obj) {
		return (typeof obj == 'object' ? obj: byid(obj)).getElementsByTagName(tag);
	}
	// 添加option参数，可以同时运行多个实例
	var option = option ? option : {};
	opt = {
		oFocus : option.oFocus ? option.oFocus : 'tFocus',
		oPic : option.oPic ? option.oPic : 'tFocus-pic',
		oBtn : option.oBtn ? option.oBtn : 'tFocus-btn',
		tLeft : option.tLeft ? option.tLeft : 'tFocus-leftbtn',
		tRight : option.tRight ? option.tRight : 'tFocus-rightbtn',
		prev : option.prev ? option.prev : 'prev',
		next : option.next ? option.next : 'next'
	}
	var timer = null;
	var oFocus = byid(opt.oFocus);
	var oPic = byid(opt.oPic);
	var oPicLis = bytag('li', oPic);
	var oBtn = byid(opt.oBtn);
	var oBtnLis = bytag('li', oBtn);
	var iActive = 0;
	function inlize() {
		oPicLis[0].style.filter = 'alpha(opacity:100)';
		oPicLis[0].style.opacity = 100;
		oPicLis[0].style.zIndex = 5;
	}; 
	for (var i = 0; i < oPicLis.length; i++) {
		oBtnLis[i].sIndex = i;
		oBtnLis[i].onclick = function() {
			if (this.sIndex == iActive) return;
			iActive = this.sIndex;
			changePic();
		}
	};
	byid(opt.tLeft).onclick = byid(opt.prev).onclick = function() {
		iActive--;
		if (iActive == -1) {
			iActive = oPicLis.length - 1;
		}
		changePic();
	};
	byid(opt.tRight).onclick = byid(opt.next).onclick = function() {
		iActive++;
		if (iActive == oPicLis.length) {
			iActive = 0;
		}
		changePic();
	};
	
	function changePic() {
		for (var i = 0; i < oPicLis.length; i++) {
			doMove(oPicLis[i], 'opacity', 0);
			oPicLis[i].style.zIndex = 0;
			oBtnLis[i].className = '';
		};
		doMove(oPicLis[iActive], 'opacity', 100);
		oPicLis[iActive].style.zIndex = 5;
		oBtnLis[iActive].className = 'active';
		if (iActive == 0) {
			doMove(bytag('ul', oBtn)[0], 'left', 0);
		} else if (iActive >= oPicLis.length - 2) {
			doMove(bytag('ul', oBtn)[0], 'left', -(oPicLis.length - 3) * (oBtnLis[0].offsetWidth + 4));
		} else {
			doMove(bytag('ul', oBtn)[0], 'left', -(iActive - 1) * (oBtnLis[0].offsetWidth + 4));
		}
	};
	function autoplay() {
		if (iActive >= oPicLis.length - 1) {
			iActive = 0;
		} else {
			iActive++;
		}
		changePic();
	};
	aTimer = setInterval(autoplay, 3000);
	inlize();
	function getStyle(obj, attr) {
		if (obj.currentStyle) {
			return obj.currentStyle[attr];
		} else {
			return getComputedStyle(obj, false)[attr];
		}
	};
	function doMove(obj, attr, iTarget) {
		clearInterval(obj.timer);
		obj.timer = setInterval(function() {
			var iCur = 0;
			if (attr == 'opacity') {
				iCur = parseInt(parseFloat(getStyle(obj, attr)) * 100);
			} else {
				iCur = parseInt(getStyle(obj, attr));
			}
			var iSpeed = (iTarget - iCur) / 6;
			iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);
			if (iCur == iTarget) {
				clearInterval(obj.timer);
			} else {
				if (attr == 'opacity') {
					obj.style.opacity = (iCur + iSpeed) / 100;
				} else {
					obj.style.filter = 'alpha(opacity:' + (iCur + iSpeed) + ')';
				}
			}
		},
		30)
	};
	byid(opt.oFocus).onmouseover = function() {
		clearInterval(aTimer);
	}
	byid(opt.oFocus).onmouseout = function() {
		aTimer = setInterval(autoplay, 3000);
	}
}