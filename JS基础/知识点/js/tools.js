
/*
	创建一个执行简单动画的函数

	参数
		obj 要执行动画的对象
		attr 要执行动画的样式 ，比如(left top width height)
		target 执行动画的目标位置
		speed 移动的速度
		callback 回调函数，将会在动画执行完毕以后执行
*/


function move(obj,attr,target,speed,callback){
	
	//获取当前obj的位置信息
	var current = parseInt(getStyle(obj,attr));

	//判断速度的正负值
	if(current > target){
		speed = -speed;
	}
	//关闭obj的上一个定时器
	clearInterval(obj.timer);

	//开启obj的定时器
	obj.timer = setInterval(function(){
		//获取当前obj的attr值
		var oldValue = parseInt(getStyle(obj,attr));
		//获取当前obj的新的attr值
		var newValue = oldValue + speed;

		//判断newValue 和 target值的大小，以及速度speed
		//向左移时，speed < 0 同时要判断newValue要小于target
		//向右移时，speed > 0 同时要判断newValue要大于target
		if(newValue > target && speed > 0 || newValue < target && speed < 0 ){
			newValue = target;
		}
		//给obj 的attr 赋值
		obj.style[attr] = newValue +"px";
		//当元素移动到target时，使其停止执行动画(关闭定时器)
		if(newValue == target){
			//达到目标，关闭定时器
			clearInterval(obj.timer);
			// 动画执行完毕，执行回调函数
			callback && callback();
		}
	},20);
};


/*
	定义一个函数，用来获取指定元素的当前样式
	参数：
		obj 要获取样式的元素
		name 要获取的样式名
*/
function getStyle(obj, name){
	if (window.getComputedStyle) {
		//正常浏览器的方式，具有getComputedStyle()方法
		return getComputedStyle(obj,null)[name];
	}else {
		//IE8的方式，没有getComputedSttyle()方法
		return obj.currentStyle[name];
	}

}