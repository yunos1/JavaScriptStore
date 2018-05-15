



	var view = {
		//弹出需要显示的信息
		displayMessage:function(msg){
			var Message = document.getElementById("showMessage");
			Message.innerHTML = msg;
		},

		//给单元格添加属性 hit
		displayHit:function(location){
			var cell = document.getElementById(location);
			cell.setAttribute('class','hit');
		},
		//给单元格添加属性miss
		displayMiss:function(location){
			var cell = document.getElementById(location);
			cell.setAttribute('class','miss');
		}
	};

	var model = {
		//游戏板网格的大小
		boardSize : 7,
		//游戏包含的战舰数
		numShips : 3,
		//每艘战舰占用的单元格
		shipLength : 3,
		//被击沉的战舰数
		shipSunk:0,
		//战舰所处的位置
		ships:[{locations:['06','16','26'],hits:['','','']},
			   {locations:['24','34','44'],hits:['','','']},
			   {locations:['10','11','12'],hits:['','','']}],
		//判断是否击中战舰
		fire:function(guess){
			//遍历三艘战舰
			for(var i = 0;i<this.numShips;i++){

				var ship = this.ships[i];

				//返回的是locations中的索引
				var index = ship.locations.indexOf(guess);

				//如果索引值大于等于0 则表示locations中有guess值
				//如果index = -1  则表示locations中没有guess值

				if(index >= 0){
					
					//视图更新
					view.displayMessage('Hit');
					view.displayHit(guess);
					ship.hits[index] = 'hit';

					//如果战舰被击沉则使shipSunk加一
					if(this.isSunk(ship)){
						//更新视图信息
						view.displayMessage('you sunk my battleship');

						this.shipSunk++;
					}
					return true;
				}
			}
			//更新视图
			view.displayMiss(guess);
			view.displayMessage('you miss');
			//如果出现其他情况
			return false;
		},
		//判断战舰是否被击沉
		isSunk:function(ship){
			for(var i = 0;i<this.shipLength;i++){
				//如果战舰的hits数组中有一个不为hit。则表示还有部分未被击中，返回false，否则则返回true
				if(ship.hits[i] !== 'hit'){
					return false;
				}
			}
			return true;
		}
	};

	//控制器对象
	var controller = {
		guesses:0,
		processGuess:function(guess){
			//通过转换取得location
			var location = paresGuess(guess);
			if(location){
				this.guesses++;
				//执行fire函数,并将结果赋值给hit
				var hit = model.fire(location);
				//判断击中并且击沉的数目===战舰的数目，则游戏结束，并弹出回馈信息
				if(hit && model.shipSunk === model.numShips){
					view.displayMessage("你一共猜了"+this.guesses+"次，继续加油");
				}
				
			}

		}
	
	};
	//对输入的值进行转换
		function paresGuess(guess){

			//定义一个数组，用来比较并返回其所在的索引
			var alphabet = ['A','B','C','D','E','F','G'];
			//alert(guess);

			//先判断guess是否为null且用户输入的值是否为两位
			if(guess === null || guess.length !== 2){
				alert("条件不符，请重新输入！");
			}else{
				var firstChar = guess.charAt(0);
				var row = alphabet.indexOf(firstChar);
				var column = guess.charAt(1);

				if( isNaN(row) || isNaN(column)){
					alert('条件不符，请重新输入12！');
				}else if(row >= model.boardSize || row < 0 || column >= model.boardSize || column < 0){

					alert('条件不符，请重新输入13！');

				}else{
					return row + column;
				}
			}
			return null;
		}

	function init(){
		var bt = document.getElementById("bt_fire");
		bt.onclick = dianji;
	}

	function dianji(){

		var inputValue = document.getElementById("textValue");
		var guess = inputValue.value;
		
		controller.processGuess(guess);

		inputValue.value = '';
	}

window.onload = init;