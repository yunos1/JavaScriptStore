function getStyle(obj,name){
	if(window.getComputedStyle){
		return getComputedStyle(obj,null)[name];
	}else{
		return obj.currentStyle[name];
	}
	
}

function move(obj,atr,target,speed,callback){
	var current = parseInt(getStyle(obj,atr))
	if(current > target){
		speed = -speed;
	}
	clearInterval(obj.timer)
	
	obj.timer = setInterval(function(){
		var oldValues = parseInt(getStyle(obj,atr))
		var newValues = oldValues + speed
		if(speed > 0 && newValues > target || speed < 0 && newValues < target){
			newValues = target
		}
		obj.style[atr] = newValues + "px"
		if(newValues == target){
			clearInterval(obj.timer)
			callback&&callback()
		}
	},20)
	
}