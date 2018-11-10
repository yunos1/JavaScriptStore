

window.onload = function(){
	var nav = document.getElementById("nav");
	var imgList = document.getElementById("imgList");
	var navNav = document.getElementById("navNav");
	var imgArr = document.getElementsByClassName("nav_pic");
	var allA = document.getElementsByClassName("nav_a");
	
	
	imgList.style.width = 1350 * imgArr.length + "px";
	navNav.style.left = (nav.offsetWidth - navNav.offsetWidth)/2 + "px";
	
	var index = 0;
	allA[index].style.backgroundColor = "black";
	for(var i = 0;i < allA.length ; i++){
		allA[i].num = i;
		allA[i].onclick = function(){
			clearInterval(timer);
			index = this.num;
			
			move(imgList,"left",-1350*index,20,function(){
				 autoChange(); 
			});
			setA();
			
		};
	}
	
	
	 autoChange(); 
	
	var timer;
	function autoChange(){
		
		timer = setInterval(function(){
			
			index ++;
			index %= imgArr.length;
			move(imgList,"left",-1350 * index,20,function(){
				setA();
			});
		},3500);
	};
	
	function setA(){
		if(index >= imgArr.length-1){
			index = 0;
			imgList.style.left = 0;
		}
		for(var i = 0;i < allA.length;i++){
			allA[i].style.backgroundColor = "";
		}
		allA[index].style.backgroundColor = "black";
	}
	
};

function move(obj,attr,target,speed,callback){
	var current = parseInt(getStyle(obj,attr));
	if(current > target){
		speed = -speed;
	}
	clearInterval(obj.timer);
	obj.timer = setInterval(function(){
		
		var oldValue = parseInt(getStyle(obj,attr));
		var newValue = oldValue + speed;
		
		if(newValue > target && speed > 0 || newValue < target && speed <0){
			newValue = target;
		}
		obj.style[attr] = newValue + "px";
		if(newValue == target){
			clearInterval(obj.timer);
			callback && callback();
		}
	},20);
}

function getStyle(obj,name){
	if(window.getComputedStyle){
		return getComputedStyle(obj,null)[name];
	}else{
		return obj.currentStyle[name];
	}
}
