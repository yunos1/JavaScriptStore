
function my$(id){
	return document.getElementById(id);
}

function addEventListener(element,type,fn){
	if(element.addEventListener){
		element.addEventListener(type,fn,false);
	}else if(element.attachEvent){
		element.attachEvent("on"+type,fn);
	}else{
		element["on"+type] = fn;
	}
}