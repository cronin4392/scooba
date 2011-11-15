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
    
    //size variables
    var xWidth, yWidth, x_pos, y_pos, letterSpaceX, letterSpaceY, letterWidth, letterHeight, shadowDistance, shadowAngle, shadowWidth, shadowHeight;
    
    xWidth = 34.9;
    yWidth = 34.9;
    letterX = .03;
    letterY = .53;
    letterSpaceX = .5;
    letterSpaceY = .5;
    letterWidth = 4;
    letterHeight = 5;
    shadowDistance = 1;
    shadowAngle = 45;
    shadowAngle = shadowAngle * (Math.PI / 180);
    shadowWidth = shadowDistance/2;
    shadowHeight = shadowDistance/2;
    
    var canvas_animate = false;
    
    //call canvas
    var headercanvas = document.getElementById("headerCanvas");  
    var xy = headercanvas.leftTopScreen();
    var ctx = headercanvas.getContext("2d");
        
    var word = "SCOOBA";
    var size = .5;
		
    draw_Word(word, size);
    
    
    $(headercanvas).mousemove (function (event) {
    	var hover_pos_old = hover_pos;
    	
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
    		animateLetter(word,size,hover_pos,"down");
    	}
    	
    });
    
    $("#myCanvas").hover(function(e){
    	//ctx.clearRect(0,0,946,200);
    	//draw_Text_Sunk();
    }, function(e) {
    	//ctx.clearRect(0,0,946,200);
    	//draw_Word(word, .5);
    });
    
    $(headercanvas).click(function(e){
    	window.location = base_url;
    });
    
    
    function animateLetter(word,size,letter,dir) {
    	if(!canvas_animate) {
    		canvas_animate = true;
	    	var animateTimer = setInterval(animate,10);
	    	if(dir=="up") {
	    		var animate_size = size;
	    	}
	    	else if(dir=="down") {
	    		var animate_size = -size;
	    	}
		}
		
		function animate() {	    		
			if((dir=="up")&(animate_size<=size&animate_size>=-size)) {
				ctx.clearRect(0,0,946,200);
				draw_Word(word, size, letter, animate_size);
				animate_size -= .1;
			}
			else if((dir=="down")&(animate_size<=size&animate_size>=-size)) {
				ctx.clearRect(0,0,946,200);
				draw_Word(word, size, letter, animate_size);
				animate_size += .05;
			}
			else {
				clearTimeout(animateTimer);
				canvas_animate = false;
			}
		}
    }
    
    function draw_Word(word, size, sunk, sunk_size) {
    	if(sunk_size==undefined)
    		sunk_size = size;
	    var wordSize = word.length;
	    var wordWidth = ((letterWidth+letterSpaceX)*(wordSize-1));
	    letterX = wordWidth+.03;
	    for(var i=wordSize-1; i>=0; i--) {
	    	var letter = word.substr(i,1);
	    	
	    	ctx.save();
	    	ctx.scale(xWidth,yWidth);
	    	if(i==sunk&sunk_size>=0) {
	    		ctx.translate((letterX+sunk_size),(letterY-sunk_size));
	    		draw_Letter(letter, true, sunk_size);
	    	}
	    	else if(i==sunk&sunk_size<0) {
	    		ctx.translate((letterX-sunk_size),(letterY+sunk_size));
	    		draw_Letter(letter, false, -sunk_size);
	    	}
	    	else {
	    		ctx.translate((letterX+size),(letterY-size));
	    		draw_Letter(letter, false, size);
	    	}
	    	
	    	letterX -= letterWidth+letterSpaceX;
	    	
	    	ctx.restore();
	    }
	}
    
    
    function draw_Highlight(startX, startY, size, level) {
    	if(level==undefined)
    		level = shadowWidth;
    	
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
    
    function draw_Letter(letter, sunk, size) {
    	if(sunk==undefined)
    		sunk = false;
    	if(size==undefined)
    		size = .5;
    	
		ctx.strokeStyle = 'rgb(' + 77 + ',' + 
		                       77 + ',77)';
		ctx.lineWidth = .04;
		//Letters Up
		if(!sunk) {
			height = size;
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
		if(sunk) {
			depth = size;
			ctx.lineWidth = .03;
			ctx.translate(-depth,depth);
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