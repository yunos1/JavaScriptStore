
//全局定义组件，其他都能看到

/* Vue.component('alert',{
	template:"<button v-on:click='on_click'>弹弹弹</button>",
	methods:{
		on_click:function(){
			alert('呵呵呵');
		}
	}
});

new Vue({
	el:'#app'
}) */


//局部定义

var alert_component = {
	template:"<button @click='Click'>按钮</button>",
	methods:{
		Click:function(){
			alert('haha')
		}
	}
};

new Vue({
	el:'#app',
	components:{
		alert:alert_component
	}
})