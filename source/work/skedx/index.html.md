---
title: "Skedx"

order: 2

meta_description: "The Skedx Web Application Interface Design"

gallery_images:
  -
    url: 'skedx_1.png' 
    caption: 'The Skedx schedule creation tool is fully drag & drop, features weekly and daily views, and dynamically calculates labour costs, breaks and overtime.'

---

<div class="centered_measure">
<strong>Employee scheduling made easy.</strong> 
<p>
Remember your first job? At that clothing shop or restaurant? 
</p>
<p>
Remember how <em>'the schedule'</em> always felt like the center of your existance? 
Remember how people would constantly be posting changes, trading shifts, or calling in to ask when they're working? 
</p> 
<p>
	Skedx make all that chaos go away. It's an online system that integrates vacation management, scheduling, time-clocking, alerts... and it was my job to make all of that <em>easy</em>. 
</p>
<hr/>

<dl>
	<dt>WHAT IT IS</dt>
	<dd>	
 		Skedx is an web-based staff scheduling tool for retail/hospitality. It lets managers manage all aspects of staff scheduling, including: 
		<ul>		
			<li>employee vacations </li>
			<li>time + attendance</li>
			<li>daily employee availability</li>
			<li>budgeting</li> 
			<li>reporting </li>
		</ul>
		For employees on the other hand, skedx provides alerts for schedule updates, vacation requests, shift-swapping etc. all from the comfort of a web-browser.   
	</dd>
</dl>

<dl>
	<dt>WHAT I DID</dt>
	<dd>
		I designed all aspects of the interface, then I made it real, using <dfn title="With my bare hands!">CSS/HTML/JS</dfn>. Skedx is built using <dfn title="I had a deep dive in that too">Ruby on Rails</dfn>.I was also responsible for the marketing website: <a href="http://skedx.com">skedx.com</a>. 
	</dd>
</dl>
</div> 

<figure class="gifcast">
	<img id="anim_target_skedxgifcast" src="skedx/skedx_gifcast/skedxgifcast.jpg" width="700" height="525"/>
</figure> 


<script>

  var player_skedxgifcast = null;
  var player_skedxgifcast_path = "skedx/skedx_gifcast/"; // path to Phosphor files on your server
  var skedxgifcast_framecount = 0;


  /**
   * After the page has loaded, we register a callback which will be triggered by the jsonp file.
   * Once the callback is registered, we inject the jsonp script file into the page's HEAD block.
   * An alternative method is to use AJAX (getJSON, etc) to load the corresponding json file.  After loading the
   * data, instantiate the player in the same way.
   */

   $(document).ready(function(){
    player_skedxgifcast = new PhosphorPlayer('anim_target_skedxgifcast');
    phosphorCallback_skedxgifcast = function(data) {

      /**
       * Instantiate the player.  The player supports a variate of callbacks for deeper integration into your site.
       */

       skedxgifcast_framecount = data.frames.length;
       player_skedxgifcast.load_animation({
        imageArray:["skedxgifcast_atlas000.jpg","skedxgifcast_atlas001.jpg","skedxgifcast_atlas002.jpg","skedxgifcast_atlas003.jpg","skedxgifcast_atlas004.jpg","skedxgifcast_atlas005.jpg","skedxgifcast_atlas006.jpg","skedxgifcast_atlas007.jpg","skedxgifcast_atlas008.jpg"],
        imagePath: player_skedxgifcast_path,
        animationData: data,
        loop: true,
        onLoad: function() {
          player_skedxgifcast.play();

          /**
           * If your Phosphor composition was created with the "interactive" mode set, the code below enables that
           * interation.  Handlers are registered for both mouse drag and touch events.
           */

           var trappedMouse = false;
           var trappedXPos;

           var enableInteractivity = false;

           if(enableInteractivity) {
            $("#anim_target_skedxgifcast").mousedown(function(e){
              e.preventDefault();
              player_skedxgifcast.stop();
              trappedMouse = true;
              trappedXPos = e.pageX;
              $(document).bind('mousemove',function(event) {
                if(trappedMouse){
                  var pos =  (event.pageX - trappedXPos) / 5;
                  var seekTime = (skedxgifcast_framecount + player_skedxgifcast.currentFrameNumber() + parseInt(pos)) % skedxgifcast_framecount;
                  player_skedxgifcast.setCurrentFrameNumber(seekTime);
                  trappedXPos = event.pageX;
                }

              });

            });

            $(document).mouseup(function(e){
              trappedMouse = false;
              $(document).unbind('mousemove');
            });

          

            $("#anim_target_skedxgifcast").bind("touchstart",function(event){
             var e = event.originalEvent;
             e.preventDefault();
             player_skedxgifcast.stop();
             trappedMouse = true;
             trappedXPos = e.pageX;
             $(document).bind('touchmove', function(e) {
              if(trappedMouse){
                var e = e.originalEvent;
                e.preventDefault();
                var pos =  (e.pageX - trappedXPos) / 5;
                var seekTime = (skedxgifcast_framecount + player_skedxgifcast.currentFrameNumber() + parseInt(pos)) % skedxgifcast_framecount;
                player_skedxgifcast.setCurrentFrameNumber(seekTime);
                trappedXPos = e.pageX;
              }
             });
           });

            $("#anim_target_skedxgifcast").bind("touchend",function(event){
             var e = event.originalEvent;
             e.preventDefault();
             trappedMouse = false;
             player_skedxgifcast.play(true);
             $(document).unbind('touchmove');
           });

          }

        }
      });
     }
     var jsonpScript = document.createElement("script");
     jsonpScript.type = "text/javascript";
     jsonpScript.id = "jsonPinclude_skedxgifcast";
     jsonpScript.src = player_skedxgifcast_path + "skedxgifcast_animationData.jsonp";
     document.getElementsByTagName("head")[0].appendChild(jsonpScript);


});

  /**
   * These functions demonstrate some of the ways you can control the Phosphor player.
   * If you simply wish to play a Phosphor composition on your page, none of these need to be
   * defined.
   */

   function toggleDebug(){
    player_skedxgifcast.debug(document.getElementById("debugCheckbox").checked);
  };

  function playPhosphor(){
    player_skedxgifcast.play(true);
  };

  function pausePhosphor(){
    player_skedxgifcast.stop();
  };

  function jumpForwardPhosphor(){
    player_skedxgifcast.stop();

    var seekTime = (player_skedxgifcast.currentFrameNumber() + 1) % skedxgifcast_framecount;
    player_skedxgifcast.setCurrentFrameNumber(seekTime);
  };

  function jumpBackwardPhosphor(){
    player_skedxgifcast.stop();

    var seekTime = (skedxgifcast_framecount + player_skedxgifcast.currentFrameNumber() - 1) % skedxgifcast_framecount;
    player_skedxgifcast.setCurrentFrameNumber(seekTime);
  };

</script>