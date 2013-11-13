$(document).ready(function(){

//###############
//  face canvas
//###############

var canvas = document.getElementById('my_face');
var canvas_width = $(canvas).width(); 
var canvas_height= $(canvas).height(); 

canvas.width = canvas_width; 
canvas.height = canvas_height; 
var next_gen = [];
var changed = [];
var pixel_matrix = [];

var new_pixel_matrix = [];  
var c;
var pixel_size = 1
var timer; 
var is_active = false; 
var white = 'rgba(0,0,0,0)'

if (canvas && canvas.getContext){
  runCanvas(canvas); 
}

function runCanvas(canvas){
  c = canvas.getContext('2d');
  var image = document.getElementById('my_face_avatar');
  c.drawImage(image, 0,0, canvas_width, canvas_height)
  pixelate_image(c);     
}//runCanvas()

canvas.addEventListener('mouseover',function(){
  if(!is_active){
    game_of_life(pixel_matrix);
  }
});

canvas.addEventListener('mouseout', function(){
  
  if (is_active=true){
    is_active=false  
  }
  
  window.setTimeout(function(){
    is_active=false      
    window.clearTimeout(timer) 
  }, 2000)

})

function pixelate_image(c){
  var imageData = c.getImageData(0, 0, canvas_width, canvas_height);
  var data = imageData.data
  var contrast_level = 0;

  for(y=0; y<canvas_height; y++){   
    var pixel_row = [];
    for(x=0; x<canvas_width; x++){
      var rand=Math.floor(Math.random()*255)
      var index = (y * canvas_width + x) * 4;
      var r = data[index];
      var g = data[index+1];
      var b = data[index+2];
      var fill_style = white
      var rand_color = 'rgb('+Math.floor(Math.random()*100).toString()+','+Math.floor(Math.random()*100).toString()+','+Math.floor(Math.random()*100).toString()+')';
      
      if(r>0 && g>0 && b>0){fill_style = rand_color};
      //var mid = 180
      //var low = 0
      
      //if(r>low && r<mid && g>low && g<mid && b>low && b<mid ){fill_style = rand_color};
      
      //var mid = 180
      //var low = 140
      if(r==0 && g==0 && b==0 ){fill_style=white};
      
      var is_active = true 
      if(fill_style==white){is_active = false;}
      
      pixel_row.push([[x],is_active]);
      
      c.fillStyle =fill_style 
      if (is_active){c.fillRect( x, y, pixel_size, pixel_size )} 
      else{c.clearRect( x, y, pixel_size, pixel_size )};
      x=x+(pixel_size-1)
    }
    pixel_matrix.push(pixel_row)
    y=y+(pixel_size-1)    
  }
}

function game_of_life(pixel_matrix){ 
  var old_matrix = pixel_matrix;
  var new_matrix = pixel_matrix; 
  var min = 2;
  var max = 3;
  is_active = true; 
  stepThrough()
  function stepThrough(){
    timer = window.setTimeout(function(){
        for(y=0; y<old_matrix.length; y++){
          for(x=0; x<old_matrix[0].length; x++){
            var old_state = old_matrix[y][x][1];
            
            var rand_color = 'rgb('+Math.floor(Math.random()*100).toString()+','+Math.floor(Math.random()*100).toString()+','+Math.floor(Math.random()*100).toString()+')';
            
            var n = 0;
            if (old_matrix[y-1] && old_matrix[y-1][x-1] && old_matrix[y-1][x-1][1])	n++;
            if (old_matrix[y-1] && old_matrix[y-1][x  ] && old_matrix[y-1][x  ][1])	n++;
            if (old_matrix[y-1] && old_matrix[y-1][x+1] && old_matrix[y-1][x+1][1])	n++;
            if (old_matrix[y  ] && old_matrix[y  ][x-1] && old_matrix[y  ][x-1][1])	n++;
            if (old_matrix[y  ] && old_matrix[y  ][x+1] && old_matrix[y  ][x+1][1])	n++;
            if (old_matrix[y+1] && old_matrix[y+1][x-1] && old_matrix[y+1][x-1][1])	n++;
            if (old_matrix[y+1] && old_matrix[y+1][x  ] && old_matrix[y+1][x  ][1])	n++;
            if (old_matrix[y+1] && old_matrix[y+1][x+1] && old_matrix[y+1][x+1][1])	n++;
            
            var live_neighbors = n; 
  
            new_matrix[y][x][1]=false;  
            
            if(old_state==true){
              if (live_neighbors === min || live_neighbors === max){
                new_matrix[y][x][1]=true;  
              }
            } else if(live_neighbors === max){
                new_matrix[y][x][1]=true;                 
            } 

            if(new_matrix[y][x][1] == true){
              c.fillStyle = rand_color
              c.fillRect(x*pixel_size, y*pixel_size, pixel_size, pixel_size)                    
            } else {
              c.clearRect(x*pixel_size, y*pixel_size, pixel_size, pixel_size) 
            }
          }
        }
        old_matrix = new_matrix      
        stepThrough(); 

    }, 100); //setTimeout
  }
}

/*
function desaturate(r, g, b) {
  var intensity = 0.3 * r + 0.59 * g + 0.11 * b;
  var k = 1;
  r = Math.floor(intensity * k + r * (1 - k));
  g = Math.floor(intensity * k + g * (1 - k));
  b = Math.floor(intensity * k + b * (1 - k));
  return [r, g, b];
}
*/
//##########################
// project thumbnail canvas
//##########################

/*
var thumbnails = $('.project_thumbnail_image');
var thumb_canvases = $('.project_thumbnail_canvas');


// here: remove the for loop. add an i argument to the function, draw the images on load, then iterate i+1 inside the onload event and recursively call the function again until i = length
var run_thumbs = function(){
 for(i=0; i<thumb_canvases.length; i++){
    thumb_canvases[i].width = 75; 
    thumb_canvases[i].height = 75; 
    
    thumb_canvases[i]
    .getContext('2d')
    .drawImage(thumbnails[i], 0,0, thumbnails[i].width, thumbnails[i].height);
    
    bw_pixelate_image(thumb_canvases[i].getContext('2d'));
  }
}

run_thumbs(); 

function bw_pixelate_image(c){
  var pixel_size =5; 
  var imageData = c.getImageData(0, 0, 75,75);
  var data = imageData.data
  
  for(y=0; y<75; y++){   
    for(x=0; x<75; x++){
      var index = (y * 75 + x) * 4;
      var r = Math.floor(data[index]);
      var g = Math.floor(data[index+1]);
      var b = Math.floor(data[index+2]);
      var rgb = desaturate(r,g,b)

      c.fillStyle = "rgb("+rgb[0]+","+rgb[1]+","+rgb[2]+")";
      c.fillRect( x, y, pixel_size, pixel_size);

      x=x+(pixel_size-1)
    }
    y=y+(pixel_size-1)    
  }
  
}
*/
});

