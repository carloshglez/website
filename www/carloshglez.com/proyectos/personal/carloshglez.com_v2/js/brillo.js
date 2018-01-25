function high(which2)
{
theobject=which2;
highlighting=setInterval("highlightit(theobject)",80);
	
}
function low(which2)
{
clearInterval(highlighting);
which2.filters.alpha.opacity=100;
}
function highlightit(cur2)
{
if(cur2.filters.alpha.opacity>80)
	cur2.filters.alpha.opacity-=5;
else if(window.highlighting)
	clearInterval(highlighting);
}