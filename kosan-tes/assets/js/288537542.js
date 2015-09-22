/* Vermont 12.4.0-1132 (2011-03-01 13:30:46 UTC) */
rsinetsegs=['H05525_10002','H05525_10558','H05525_10833','H05525_10902','H05525_11483'];
var rsiExp=new Date((new Date()).getTime()+2419200000);
var rsiDom='';
var rsiSegs="";
var rsiPat=/.*_5.*/;
var i=0;
for(x=0;x<rsinetsegs.length&&i<20;++x){if(!rsiPat.test(rsinetsegs[x])){rsiSegs+='|'+rsinetsegs[x];++i;}}
document.cookie="jag_rsi_segs="+(rsiSegs.length>0?rsiSegs.substr(1):"")+";expires="+rsiExp.toGMTString()+";path=/;domain="+rsiDom;
if(typeof(DM_onSegsAvailable)=="function"){DM_onSegsAvailable(['H05525_10002','H05525_10558','H05525_10833','H05525_10902','H05525_11483'],'h05525');}