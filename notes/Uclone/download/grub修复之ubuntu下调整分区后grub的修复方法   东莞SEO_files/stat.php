function gv_cnzz(of){
	var es = document.cookie.indexOf(";",of);
	if(es==-1) es=document.cookie.length;
	return unescape(document.cookie.substring(of,es));
}
function gc_cnzz(n){
	var arg=n+"=";
	var alen=arg.length;
	var clen=document.cookie.length;
	var i=0;
	while(i<clen){
	var j=i+alen;
	if(document.cookie.substring(i,j)==arg) return gv_cnzz(j);
	i=document.cookie.indexOf(" ",i)+1;
	if(i==0)	break;
	}
	return -1;
}
var cnzz_ed=new Date();
var cnzz_now=parseInt(cnzz_ed.getTime());
var cnzz_ref=document.referrer;
var cnzz_data='&r='+escape(cnzz_ref.substr(0,512))+'&lg='+escape(navigator.systemLanguage)+'&ntime=0.23593000 1290061280';
var cnzz_a=gc_cnzz("cnzz_a1445167");
if(cnzz_a!=-1) cnzz_a=parseInt(cnzz_a)+1;
else cnzz_a=0;
var rt=parseInt(gc_cnzz("rtime"));
var lt=parseInt(gc_cnzz("ltime"));
var cnzz_st = parseInt((cnzz_now-lt)/1000);
var cnzz_sin = gc_cnzz("sin1445167");
if(cnzz_sin==-1) cnzz_sin='none';
if( cnzz_ref.split('/')[2]!=document.domain ) cnzz_sin=cnzz_ref;
var cnzz_eid=gc_cnzz("cnzz_eid");
if(cnzz_eid==-1) cnzz_eid=Math.floor(Math.random()*100000000)+"-"+1290061280+"-"+cnzz_ref.substr(0,64);
if(lt<1000000){rt=0;lt=0;}
if(rt<1) rt=0;
if(((cnzz_now-lt)>500*86400)&&(lt>0)) rt++;
cnzz_data=cnzz_data+'&repeatip='+cnzz_a+'&rtime='+rt+'&cnzz_eid='+escape(cnzz_eid)+'&showp='+escape(screen.width+'x'+screen.height)+'&st='+cnzz_st+'&sin='+escape(cnzz_sin.substr(0,512))+'&res=0';
document.write('<a href="http://www.cnzz.com/stat/website.php?web_id=1445167" target=_blank title="&#31449;&#38271;&#32479;&#35745;">&#31449;&#38271;&#32479;&#35745;</a>');
document.write('<img src="http://zs5.cnzz.com/stat.htm?id=1445167'+cnzz_data+'" border=0 width=0 height=0 />');

var cnzz_et=(86400-cnzz_ed.getHours()*3600-cnzz_ed.getMinutes()*60-cnzz_ed.getSeconds());
cnzz_ed.setTime(cnzz_now+1000*(cnzz_et-cnzz_ed.getTimezoneOffset()*60));
document.cookie="cnzz_a1445167="+cnzz_a+";expires="+cnzz_ed.toGMTString()+ "; path=/";
document.cookie="sin1445167="+escape(cnzz_sin)+ ";expires="+cnzz_ed.toGMTString()+";path=/";
cnzz_ed.setTime(cnzz_now+1000*86400*182);
document.cookie="rtime="+rt+";expires="+cnzz_ed.toGMTString()+ ";path=/";
document.cookie="ltime="+cnzz_now+";expires=" + cnzz_ed.toGMTString()+ ";path=/";
document.cookie="cnzz_eid="+escape(cnzz_eid)+ ";expires="+cnzz_ed.toGMTString()+";path=/";
