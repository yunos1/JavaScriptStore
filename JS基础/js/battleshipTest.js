var view = {
	showMessage:function(msg){
		var showMess = document.getElementById("showMessage");
		showMessage.innerHTML = msg;
	},
	changeHit:function(location){
		var current = document.getElementById(location);
		current.setAttribute('class','hit');
	},
	changeMiss:function(location){
		var current = document.getElementById(location);
		current.setAttribute('class','miss');
	}
};
var model = {
	boardSize:7,
	numShips:3,
	shipSunk:0,
	shipLength:3,
	ships:[    {locations:['06','16','26'],hits:['','','']},
			   {locations:['24','34','44'],hits:['','','']},
			   {locations:['10','11','12'],hits:['','','']}],
	fire:function(guess){
		for(var i = 0;i<this.numShips;i++){
			var ship = this.ships[i];
			var index = ship.locations.indexOf(guess);

			if(index >= 0 ){
				view.showMessage('hit');
				view.changeHit(guess);
				ship.hits[index] = 'hit';
				if(this.isSunk(ship)){
					view.showMessage('you sunk a battleship');
					this.shipSunk++;
				}
				return true;
			} 
		}
		view.showMessage('miss');
		view.changeMiss(guess);
		return false;
	},
	isSunk :function(ship){
		for(var i = 0;i<this.shipLength;i++){
			if(ship.hits[i] !== 'hit'){
				return false;
			}
			
		}
		return true;
	}
};

var controller = {
	guesses:0,
	processGuess:function(guess){
		var location = paresGuess(guess);
		if(location){
			this.guesses++;
			var res = model.fire(location);
			if(res && model.shipSunk === model.numShips){
				alert("wwww"+guesses);
			}
			
		}
	}
};

function paresGuess(guess){

	var alphabet = ['A','B','C','D','E','F','G'];

	if(guess ===null || guess.length !== 2){
		alert('重新输入');
	}else{
		var firstChar = guess.charAt(0);
		var column = alphabet.indexOf(firstChar);
		var second = guess.charAt(1);
		if(isNaN(column) || isNaN(second)){
			alert('');
		}else{
			return column + second;
		}

	}
}

window.onload = init;

function init(){
	
	var bt = document.getElementById("bt_fire");

	bt.onclick = function(){
		var textValue = document.getElementById("textValue");
		var guess = textValue.value;
		controller.processGuess(guess);

		textValue.value = '';
	}
}