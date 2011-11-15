/* Author: 

*/
Element.prototype.leftTopScreen = function () {
	var x = this.offsetLeft;
	var y = this.offsetTop;
	
	var element = this.offsetParent;
	
	while (element !== null) {
	    x = parseInt (x) + parseInt (element.offsetLeft);
	    y = parseInt (y) + parseInt (element.offsetTop);
	
	    element = element.offsetParent;
	}
	
	return new Array (x, y);
}
$(document).ready(function() { 
    var hover_pos = -1;
    var hover_pos_old = this.hover_pos;
    
    var canvas_animate = false;
    
    //call canvas
    var headercanvas = document.getElementById("headerCanvas");  
    var xy = headercanvas.leftTopScreen();
    var ctx = headercanvas.getContext("2d");
    
    		
    var scooba = new draw_Word("SCOOBA",.5, 34.9);
	scooba.draw();
	
	/** $(headercanvas).mousemove (function (event) {
		hover_pos_old = hover_pos;
		
	    var x = event.clientX;
	    var y = event.clientY;
	    
	    offSetX = xy[0];
	    
		//ctx.clearRect(0,0,946,200);
		
		if(x>=0+offSetX&&x<160+offSetX) {
			hover_pos = 0;
		}
		if(x>=160+offSetX&&x<315+offSetX) {
			hover_pos = 1;
		}
		if(x>=315+offSetX&&x<475+offSetX) {
			hover_pos = 2;
		}
		if(x>=475+offSetX&&x<630+offSetX) {
			hover_pos = 3;
		}
		if(x>=630+offSetX&&x<790+offSetX) {
			hover_pos = 4;
		}
		if(x>=790+offSetX&&x<943+offSetX) {
			hover_pos = 5;
		}
		
		if(hover_pos_old!=hover_pos) {
			animate_Word(scooba,hover_pos,"down");
			//animate_Word(scooba,hover_pos_old,"up");
		}
		
	});
	
	$(headercanvas).hover(function(e){
		
	}, function(e) {
		//hover_pos = -1;
		//animate_Word(scooba,hover_pos_old,"up");
	});*/
    
    $(headercanvas).click(function(e){
    	window.location = base_url;
    });
    
    function animate_Word(word, letter, dir) {
    	if(this.animateTimer!=undefined)
    		clearTimeout(this.animateTimer);
    	if(dir=="down") {
    		this.currentSize = scooba.getLetterHeight(letter);
    		this.animateTimerDown = setInterval(animate_down,50);
    	}
    	else if(dir=="up") {
    		this.currentSize = scooba.getLetterHeight(letter);
    		this.animateTimerUp = setInterval(animate_up,25);
    	}
    	
    	this.letter = letter;
    	
    	function animate_down() {
    		if(this.currentSize<=scooba.size&this.currentSize>-scooba.size) {
    			scooba.changeLetterHeight(this.letter,this.currentSize);
    			this.currentSize-=.05;
    		}
    		else {
    			clearTimeout(this.animateTimerDown);
    			//alert(scooba.getLetterHeight(this.letter));
    		}
    	}
    	
    	function animate_up() {
    		if(this.currentSize<=scooba.size) {
    			scooba.changeLetterHeight(this.letter,this.currentSize);
    			//alert(this.currentSize);
    			this.currentSize+=.05;
    		}
    		else {
    			//alert(scooba.getLetterHeight(this.letter));
    			clearTimeout(this.animateTimerUp);
    		}
    	}
    	
    	
    }
    
    function draw_Word(word, size, scale) {
		this.xWidth = scale;
		this.yWidth = scale;
		this.letterX = .03;
		this.letterY = .625;
		this.letterSpaceX = .5;
		this.letterSpaceY = .5;
		this.letterWidth = 4;
		this.letterHeight = 5;
		this.shadowDistance = 1;
		this.shadowWidth = this.shadowDistance/2;
		this.shadowHeight = this.shadowDistance/2;
		
		this.letterArray = new Array();
		this.sizeArray = new Array();
		
		this.word = word;
		this.size = size;
		this.letterWidth = this.letterWidth;
		this.letterSpaceX = this.letterSpaceX;
		
		this.wordSize = this.word.length;
		this.wordWidth = ((this.letterWidth+this.letterSpaceX)*(this.wordSize));
    	
	    this.draw = function() {
	    	ctx.clearRect(0,0,946,200);
	    	this.letterArray = new Array();
	    	this.letterX += this.wordWidth;  
		    for(var i=this.wordSize-1; i>=0; i--) {
		    	this.letter = this.word.substr(i,1);
		    	
		    	this.letterX -= this.letterWidth+this.letterSpaceX;
		    	
		    	if(this.sizeArray[i]==undefined)
		    		this.sizeArray[i] = this.size;
		    		
		    	this.letterSize = this.sizeArray[i];
		    	
		    	ctx.save();
		    	ctx.scale(this.xWidth,this.yWidth);
		    	
	    		ctx.translate((this.letterX),(this.letterY));
	    		this.letterArray[i] = new draw_Letter(this.letter, this.letterSize);
		    	
		    	
		    		    	
		    	ctx.restore();
		    }
		}
	    
	    this.changeLetterHeight = function(letter, size) {
	    	this.letter = letter;
	    	this.sizeArray[this.letter] = size;
	    	this.draw();
	    }
	    this.getLetterHeight = function(letter) {
	    	this.letter = letter;
	    	return(this.sizeArray[this.letter]);
	    }
	}
    
    
    function draw_Highlight(startX, startY, size, level) {
    	if(level==undefined)
    		this.level = shadowWidth;
    	else
    		this.level = level;
    		
    	this.startX = startX;
    	this.startY = startY;
    	this.size = size;
    	
        //highlight
        ctx.beginPath();  
        ctx.moveTo(startX,startY);  
        ctx.lineTo(-1*level + startX ,1*level + startY);  
        ctx.lineTo(-1*level + startX ,1*level + (startY+size));  
        ctx.lineTo(0*level + startX ,0*level + (startY+size));  
        ctx.lineTo(0*level + startX ,0*level + startY);  
        ctx.stroke();
        ctx.fillStyle = 'rgb(' + 179 + ',' + 
                           179 + ',179)';
        ctx.fill();
    }

    function draw_Shadow(startX, startY, size, level) {
    	if(level==undefined)
    		level = shadowWidth;

        //highlight
        ctx.beginPath();  
        ctx.moveTo(startX,startY);  
        ctx.lineTo(-1*level + startX , 1*level + startY);  
        ctx.lineTo(-1*level + (startX+size) , 1*level + startY);  
        ctx.lineTo(0*level + (startX+size) , 0*level + startY);  
        ctx.lineTo(0*level + startX , 0*level + startY);  
        
        ctx.stroke();
        ctx.fillStyle = 'rgb(' + 90 + ',' + 
                           90 + ',90)';
        ctx.fill();
    }
    
    function draw_Letter(letter, size) {
    	if(size==undefined)
    		this.size = .5;
    	else
    		this.size = size;
    		
    	ctx.translate(this.size, -this.size);
    	    	
    	this.letter = letter;
    	
		ctx.strokeStyle = 'rgb(' + 77 + ',' + 
		                       77 + ',77)';
		ctx.lineWidth = .03;
		
		
		//Letters Up
		if(this.size>=0) {
			var height = size;
			//S
			if(letter=="S") {			    
			    draw_Highlight(3, 3, 1, height);
			    draw_Highlight(3, 1, .5, height);
			
			    draw_Shadow(1, 1, 2, height);
			    draw_Shadow(3, 1.5, 1, height);
			    draw_Shadow(0, 3, 3, height);
			    draw_Shadow(0, 5, 4, height);
			    
			    draw_Highlight(0, 0, 3, height);
			    draw_Highlight(0, 3.5, 1.5, height);
			    
			    ctx.beginPath();  
			    ctx.moveTo(0,0);  
			    ctx.lineTo(4 ,0);  
			    ctx.lineTo(4 ,1.5);
			    ctx.lineTo(3 ,1.5);
			    ctx.lineTo(3 ,1);
			    ctx.lineTo(1 ,1);
			    ctx.lineTo(1 ,2);
			    ctx.lineTo(4 ,2);
			    ctx.lineTo(4 ,5);
			    ctx.lineTo(0 ,5);
			    ctx.lineTo(0 ,3.5);
			    ctx.lineTo(1 ,3.5);
			    ctx.lineTo(1 ,4);
			    ctx.lineTo(3 ,4);
			    ctx.lineTo(3 ,3);
			    ctx.lineTo(0 ,3);
			    ctx.lineTo(0 ,0);
			}
			//C
			if(letter=="C") {		        
		        draw_Highlight(3, 3.5, .5, height);
		        draw_Highlight(3, 1, .5, height);
		
		        draw_Shadow(1, 1, 2, height);
		        draw_Shadow(3, 1.5, 1, height);
		        draw_Shadow(0, 5, 4, height);
		        
		        draw_Highlight(0, 0, 5, height);
		
		        ctx.beginPath();  
		        ctx.moveTo(0,0);  
		        ctx.lineTo(4 ,0);  
		        ctx.lineTo(4 ,1.5);
		        ctx.lineTo(3 ,1.5);
		        ctx.lineTo(3 ,1);
		        ctx.lineTo(1 ,1);
		        ctx.lineTo(1 ,4);
		        ctx.lineTo(3 ,4);
		        ctx.lineTo(3 ,3.5);
		        ctx.lineTo(4 ,3.5);
		        ctx.lineTo(4 ,5);
		        ctx.lineTo(0 ,5);
		        ctx.lineTo(0 ,0);
			}
			//O
			if(letter=="O") {
		        draw_Highlight(0, 0, 5, height);
		        draw_Highlight(3, 1, 3, height);
		
		        draw_Shadow(1, 1, 2, height);
		        draw_Shadow(0, 5, 4, height);
		
		        ctx.beginPath();  
		        ctx.moveTo(0,0);  
		        ctx.lineTo(4 ,0);  
		        ctx.lineTo(4 ,2.5);
		        ctx.lineTo(3 ,2.5);
		        ctx.lineTo(3 ,1);
		        ctx.lineTo(1 ,1);
		        ctx.lineTo(1 ,4);
		        ctx.lineTo(3 ,4);
		        ctx.lineTo(3 ,2.5);
		        ctx.lineTo(4 ,2.5);
		        ctx.lineTo(4 ,5);
		        ctx.lineTo(0 ,5);
		        ctx.lineTo(0 ,0);
			}
			//B
			if(letter=="B") {
		        draw_Highlight(0, 0, 5, height);
		        draw_Highlight(2, 1, 1, height);
		        draw_Highlight(3, 3, 1, height);
		
		        draw_Shadow(1, 1, 1, height);
		        draw_Shadow(1, 3, 2, height);
		        draw_Shadow(0, 5, 4, height);
		
		        ctx.beginPath();  
		        ctx.moveTo(0,0);  
		        ctx.lineTo(3 ,0);   
		        ctx.lineTo(3 ,1.5);   
		        ctx.lineTo(2 ,1.5);   
		        ctx.lineTo(2 ,1);   
		        ctx.lineTo(1 ,1);   
		        ctx.lineTo(1 ,2);   
		        ctx.lineTo(2 ,2);   
		        ctx.lineTo(2 ,1.5);   
		        ctx.lineTo(3 ,1.5);   
		        ctx.lineTo(3 ,2);   
		        ctx.lineTo(4 ,2);   
		        ctx.lineTo(4 ,3.5);   
		        ctx.lineTo(3 ,3.5);   
		        ctx.lineTo(3 ,3);   
		        ctx.lineTo(1 ,3);   
		        ctx.lineTo(1 ,4);   
		        ctx.lineTo(3 ,4);   
		        ctx.lineTo(3 ,3.5);   
		        ctx.lineTo(4 ,3.5);   
		        ctx.lineTo(4 ,5);   
		        ctx.lineTo(0 ,5);   
		        ctx.lineTo(0 ,0); 
			}
			//A
			if(letter=="A") {
		        draw_Highlight(0, 0, 5, height);
		        draw_Highlight(3, 3, 2, height);
		        draw_Highlight(3, 1, 1, height);
		
		        draw_Shadow(1, 1, 2, height);
		        draw_Shadow(1, 3, 2, height);
		        draw_Shadow(0, 5, 1, height);
		
		        draw_Shadow(3, 5, 1, height);
		
		        ctx.beginPath();  
		        ctx.moveTo(0,0);  
		        ctx.lineTo(0 ,5);   
		        ctx.lineTo(1 ,5);   
		        ctx.lineTo(1 ,3);   
		        ctx.lineTo(2 ,3);   
		        ctx.lineTo(2 ,2);   
		        ctx.lineTo(1 ,2);   
		        ctx.lineTo(1 ,1);   
		        ctx.lineTo(3 ,1);   
		        ctx.lineTo(3 ,2);   
		        ctx.lineTo(2 ,2);   
		        ctx.lineTo(2 ,3);   
		        ctx.lineTo(3 ,3);   
		        ctx.lineTo(3 ,5);   
		        ctx.lineTo(4 ,5);   
		        ctx.lineTo(4 ,0);   
		        ctx.lineTo(0 ,0);
			}
			
			ctx.stroke();
			ctx.fillStyle = 'rgb(' + 255 + ',' + 
			                   222 + ',0)';
			ctx.fill();
		}
		//Letters Down
		if(this.size<0) {
			var depth = -this.size;
			ctx.lineWidth = .03;
			ctx.translate(depth,-depth);
			ctx.save();
			ctx.beginPath();  
			ctx.moveTo(0,0);
			ctx.fillStyle = 'rgb(' + 255 + ',' + 
			                   222 + ',0)';
			//S
			if(letter=="S") {
		    	ctx.lineTo(4 ,0);  
		    	ctx.lineTo(4 ,1.5);
		    	ctx.lineTo(3 ,1.5);
		    	ctx.lineTo(3 ,1);
		    	ctx.lineTo(1 ,1);
		    	ctx.lineTo(1 ,2);
		    	ctx.lineTo(4 ,2);
		    	ctx.lineTo(4 ,5);
		    	ctx.lineTo(0 ,5);
		    	ctx.lineTo(0 ,3.5);
		    	ctx.lineTo(1 ,3.5);
		    	ctx.lineTo(1 ,4);
		    	ctx.lineTo(3 ,4);
		    	ctx.lineTo(3 ,3);
		    	ctx.lineTo(0 ,3);
		    	ctx.lineTo(0 ,0);  
		    	ctx.clip();
		    	
		    	ctx.fillRect(0,0,4,5);
		    	
		    	draw_Highlight(4, 0, 1.5, depth);
		    	
		    	draw_Shadow(0, 0, 4, depth);   
		    	draw_Shadow(1, 2, 3, depth);
		    	
		        
		        draw_Highlight(4, 2, 3, depth);
		        draw_Highlight(1, 3.5, .5, depth);
		        draw_Highlight(1, 1, 1, depth);
		
		        draw_Shadow(0, 3.5, 1, depth);
		        draw_Shadow(1, 4, 2, depth);
		        
		        ctx.restore();
		        
		        ctx.beginPath();  
		        ctx.moveTo(0,0);  
		        ctx.lineTo(4 ,0);  
		        ctx.lineTo(4 ,1.5);
		        ctx.lineTo(3 ,1.5);
		        ctx.lineTo(3 ,1);
		        ctx.lineTo(1 ,1);
		        ctx.lineTo(1 ,2);
		        ctx.lineTo(4 ,2);
		        ctx.lineTo(4 ,5);
		        ctx.lineTo(0 ,5);
		        ctx.lineTo(0 ,3.5);
		        ctx.lineTo(1 ,3.5);
		        ctx.lineTo(1 ,4);
		        ctx.lineTo(3 ,4);
		        ctx.lineTo(3 ,3);
		        ctx.lineTo(0 ,3);
		        ctx.lineTo(0 ,0);
			}
			//C
			if(letter=="C") { 
		    	ctx.lineTo(4 ,0);  
		    	ctx.lineTo(4 ,1.5);
		    	ctx.lineTo(3 ,1.5);
		    	ctx.lineTo(3 ,1);
		    	ctx.lineTo(1 ,1);
		    	ctx.lineTo(1 ,4);
		    	ctx.lineTo(3 ,4);
		    	ctx.lineTo(3 ,3.5);
		    	ctx.lineTo(4 ,3.5);
		    	ctx.lineTo(4 ,5);
		    	ctx.lineTo(0 ,5);
		    	ctx.lineTo(0 ,0);  
		    	ctx.clip();
		    	
		    	ctx.fillRect(0,0,4,5);
		    	
		        draw_Shadow(3, 3.5, 1, depth);
		        draw_Highlight(4, 0, 1.5, depth);
		        draw_Highlight(4, 3.5, 1.5, depth);
		
		        draw_Shadow(0, 0, 4, depth);
		        draw_Shadow(1, 4, 2, depth);
		        
		        draw_Highlight(1, 1, 3, depth);
		        
		        ctx.restore();
		        
		        ctx.beginPath();  
		        ctx.moveTo(0,0);  
		        ctx.lineTo(4 ,0);  
		        ctx.lineTo(4 ,1.5);
		        ctx.lineTo(3 ,1.5);
		        ctx.lineTo(3 ,1);
		        ctx.lineTo(1 ,1);
		        ctx.lineTo(1 ,4);
		        ctx.lineTo(3 ,4);
		        ctx.lineTo(3 ,3.5);
		        ctx.lineTo(4 ,3.5);
		        ctx.lineTo(4 ,5);
		        ctx.lineTo(0 ,5);
		        ctx.lineTo(0 ,0);
			}
			//O
			if(letter=="O") {
		    	ctx.lineTo(4 ,0);  
		    	ctx.lineTo(4 ,2.5);
		    	ctx.lineTo(3 ,2.5);
		    	ctx.lineTo(3 ,1);
		    	ctx.lineTo(1 ,1);
		    	ctx.lineTo(1 ,4);
		    	ctx.lineTo(3 ,4);
		    	ctx.lineTo(3 ,2.5);
		    	ctx.lineTo(4 ,2.5);
		    	ctx.lineTo(4 ,5);
		    	ctx.lineTo(0 ,5);
		    	ctx.lineTo(0 ,0);   
		    	ctx.clip();
		    	
		    	ctx.fillRect(0,0,4,5);
		    	
		        draw_Highlight(4, 0, 5, depth);
		
		        draw_Shadow(1, 4, 2, depth);
		        draw_Shadow(0, 0, 4, depth);
		        draw_Highlight(1, 1, 3, depth);
		        
		        ctx.restore();
		        
		        ctx.beginPath();  
		        ctx.moveTo(0,0);  
		        ctx.lineTo(0 ,5);   
		        ctx.lineTo(4 ,5);   
		        ctx.lineTo(4 ,0);   
		        ctx.lineTo(0 ,0);   
		        ctx.stroke();
		        
		        ctx.beginPath();  
		        ctx.moveTo(1 ,1);
		        ctx.lineTo(3 ,1);   
		        ctx.lineTo(3 ,4);   
		        ctx.lineTo(1 ,4);   
		        ctx.lineTo(1 ,1);   
			}
			//B
			if(letter=="B") {
				ctx.lineTo(3 ,0);   
				ctx.lineTo(3 ,1.5);   
				ctx.lineTo(2 ,1.5);   
				ctx.lineTo(2 ,1);   
				ctx.lineTo(1 ,1);   
				ctx.lineTo(1 ,2);   
				ctx.lineTo(2 ,2);   
				ctx.lineTo(2 ,1.5);   
				ctx.lineTo(3 ,1.5);   
				ctx.lineTo(3 ,2);   
				ctx.lineTo(4 ,2);   
				ctx.lineTo(4 ,3.5);   
				ctx.lineTo(3 ,3.5);   
				ctx.lineTo(3 ,3);   
				ctx.lineTo(1 ,3);   
				ctx.lineTo(1 ,4);   
				ctx.lineTo(3 ,4);   
				ctx.lineTo(3 ,3.5);   
				ctx.lineTo(4 ,3.5);   
				ctx.lineTo(4 ,5);   
				ctx.lineTo(0 ,5);   
				ctx.lineTo(0 ,0);   
				ctx.clip();
				
				ctx.fillRect(0,0,4,5);
				
				draw_Shadow(0, 0, 3, depth);
				
				draw_Highlight(3, 0, 2, depth);
				draw_Highlight(4, 2, 3, depth);
				draw_Highlight(1, 1, 1, depth);
				draw_Highlight(1, 3, 1, depth);
				
				
				draw_Shadow(1, 2, 1, depth);
				draw_Shadow(3, 2, 1, depth);
				draw_Shadow(1, 4, 2, depth);
				
				ctx.restore();
				
				ctx.beginPath();  
				ctx.moveTo(0,0);  
				ctx.lineTo(3 ,0);   
				ctx.lineTo(3 ,2);   
				ctx.lineTo(4 ,2);   
				ctx.lineTo(4 ,5);   
				ctx.lineTo(0 ,5);   
				ctx.lineTo(0 ,0);
				ctx.stroke();
				
				ctx.beginPath(); 
				ctx.moveTo(2 ,1);
				ctx.lineTo(1 ,1);   
				ctx.lineTo(1 ,2);   
				ctx.lineTo(2 ,2);   
				ctx.lineTo(2 ,1);   
				ctx.stroke();
				
				ctx.beginPath(); 
				ctx.moveTo(3 ,3);
				ctx.lineTo(1 ,3);   
				ctx.lineTo(1 ,4);   
				ctx.lineTo(3 ,4);   
				ctx.lineTo(3 ,3);   
			}
			//A
			if(letter=="A") {
		    	ctx.lineTo(0 ,5);   
		    	ctx.lineTo(1 ,5);   
		    	ctx.lineTo(1 ,3);   
		    	ctx.lineTo(2 ,3);   
		    	ctx.lineTo(2 ,2);   
		    	ctx.lineTo(1 ,2);   
		    	ctx.lineTo(1 ,1);   
		    	ctx.lineTo(3 ,1);   
		    	ctx.lineTo(3 ,2);   
		    	ctx.lineTo(2 ,2);   
		    	ctx.lineTo(2 ,3);   
		    	ctx.lineTo(3 ,3);   
		    	ctx.lineTo(3 ,5);   
		    	ctx.lineTo(4 ,5);   
		    	ctx.lineTo(4 ,0);   
		    	ctx.lineTo(0 ,0);   
		    	ctx.clip();
		    	
		    	ctx.fillRect(0,0,4,5);
		    	
		    	draw_Highlight(4, 0, 5, depth);
		        draw_Shadow(0, 0, 4, depth);
		        draw_Shadow(1, 2, 2, depth);
		        
		        draw_Highlight(1, 3, 2, depth);
		        draw_Highlight(1, 1, 1, depth);
				
		        ctx.restore();
		        
		        ctx.beginPath();  
		        ctx.moveTo(0,0);  
		        ctx.lineTo(0 ,5);   
		        ctx.lineTo(1 ,5);   
		        ctx.lineTo(1 ,3);   
		        ctx.lineTo(2 ,3);   
		        ctx.lineTo(2 ,3);   
		        ctx.lineTo(3 ,3);   
		        ctx.lineTo(3 ,5);   
		        ctx.lineTo(4 ,5);   
		        ctx.lineTo(4 ,0);   
		        ctx.lineTo(0 ,0);
		        ctx.stroke();
		        
		        ctx.beginPath();  
		        ctx.moveTo(2 ,2);
		        ctx.lineTo(1 ,2);   
		        ctx.lineTo(1 ,1);   
		        ctx.lineTo(3 ,1);   
		        ctx.lineTo(3 ,2);   
		        ctx.lineTo(2 ,2);
			}
		ctx.stroke();
		}
    }
});