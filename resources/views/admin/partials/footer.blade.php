    </body>
    
    <script>
    	// MP3 player 
    	function play($this){
	    	player = document.getElementById('audio');
    		player.volume = 0.3;
            
            setTimeout(function(){ player.play(); }, 500)
    	}
    </script>
</html>