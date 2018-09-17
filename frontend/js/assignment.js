/* change the content of the col4-box avery 30 seconds */
var count=0;
setInterval(function(){
	if(count===3){count=0;}
	switch(count){
		case 0:
			count++;
			document.getElementById("box001_1").classList.add('display-none');
			document.getElementById("box001_2").classList.remove('display-none');
			document.getElementById("box001_3").classList.add('display-none');
			break;
		case 1:
			count++;
			document.getElementById("box001_3").classList.remove('display-none');
			document.getElementById("box001_1").classList.add('display-none');
			document.getElementById("box001_2").classList.add('display-none');
			break;
		case 2:
			count++;
			document.getElementById("box001_1").classList.remove('display-none');
			document.getElementById("box001_2").classList.add('display-none');
			document.getElementById("box001_3").classList.add('display-none');
			break;
	}
}, 30000);

/* hide more info */
function hide(e){
	var temp = e.innerHTML;

	e.innerHTML = e.parentNode.nextSibling.nextSibling.innerHTML;
	e.parentNode.nextSibling.nextSibling.innerHTML = temp;
	e.classList.remove('moreInfo');
	e.previousSibling.previousSibling.classList.remove('display-none');
}

/* show more info */
function show(e){
	var temp = e.innerHTML;
	e.innerHTML = e.parentNode.nextSibling.nextSibling.innerHTML;
	e.parentNode.nextSibling.nextSibling.innerHTML = temp;	
	e.classList.add('moreInfo');
	e.previousSibling.previousSibling.classList.add('display-none');
}
