//ABRE POPUPS NO CENTRO DA TELA
function popupWindow(mypage, myname, w, h, scroll) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable=no'
	win = window.open(mypage, myname, winprops)
	if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}

function poorman_toggle(id)
{
	var tr = document.getElementById(id);
	if (tr==null) { return; }
	var bExpand = tr.style.display == '';
	tr.style.display = (bExpand ? 'none' : '');
}

function poorman_changeimage(id, sMinus, sPlus) {
	var img = document.getElementById(id);
	if (img!=null) {
		var bExpand = img.src.indexOf(sPlus) >= 0;
		if (!bExpand) { img.src = sPlus; }
		else { img.src = sMinus; }
	}
}

function Toggle_trGrpHeader(id) {
	poorman_changeimage('trGrpHeader'+id+'_Img', 'media/images/minimizar.png', 'media/images/maximizar.png');
	poorman_toggle('trRow'+id);
}