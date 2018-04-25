
// MP3 player 
function play($this){
	player = document.getElementById('audio');
	player.volume = 0.3;
    rand = Math.floor(Math.random() * (10 - 0 + 1)) + 0;;
    
    if (rand > 8) {
    	setTimeout(function(){ player.play(); }, 500)
    }
}
