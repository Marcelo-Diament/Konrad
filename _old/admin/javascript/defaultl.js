function mOvr(src,clrOver) {
	src.style.cursor = 'pointer';
	src.style.backgroundColor = clrOver;
}
function mOut(src,clrIn) {
	src.style.cursor = 'pointer';
	src.style.backgroundColor = clrIn;
}

//ABRE POPUPS NO CENTRO DA TELA
function popupWindow(mypage, myname, w, h, scroll) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable=no'
	win = window.open(mypage, myname, winprops)
	if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}

function redirect(url) { location = url; }