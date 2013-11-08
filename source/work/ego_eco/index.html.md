---
title: "Ego & Eco"

order: 2

meta_description: "Ego & Eco is an design boutique specializing in Polish Design."

gallery_images:
  -
    url: 'ego_eco_1.png' 
    caption: 'egoeco.eu'
  -
    url: 'ego_eco_2.png' 
    caption: 'this is an image caption'
  -
    url: 'ego_eco_3.png' 
    caption: 'this is an image caption'
  -
    url: 'ego_eco_4.png' 
    caption: 'this is an image caption'
  -
    url: 'ego_eco_5.png' 
    caption: 'this is an image caption'
---

<div class="centered_measure">
<strong>Polish Design Boutique in Warsaw.</strong> 
<hr/>  
  <dl>
    <dt>WHAT IT IS</dt>
    <dd>
      Ego &amp; Eco is a design boutique in Warsaw. They promote local designers and sell a variety of jewelery, accessories, clothing and linens. 
    </dd>
  </dl>

  <dl>
    <dt>WHAT I DID</dt>
    <dd>
      I developed the e-commerce site, egoeco.eu. The site was developed using openCart. It featured a blog, a special section for featured designers, product zooming and a smooth two step checkout process. 
    </dd>
  </dl>

  <dl>
    <dt>HOW I DID IT</dt>
    <dd>
      HTML/CSS/JS on OpenCart. Standard Apache/PHP/MySQL stack.  
    </dd>
  </dl>  
</div> 

<figure class="gifcast">
  <img id="gifcast" src="ego_eco/egoeco_gifcast/egoecogifcast.jpg" width="700" height="525"/>
</figure> 


<script>

  var player_skedxgifcast = null;
  var player_skedxgifcast_path = "ego_eco/egoeco_gifcast/"; // path to Phosphor files on your server
  var skedxgifcast_framecount = 0;


   $(document).ready(function(){
    player_skedxgifcast = new PhosphorPlayer('gifcast');
    phosphorCallback_egoecogifcast = function(data) {

       skedxgifcast_framecount = data.frames.length;
       player_skedxgifcast.load_animation({
        imageArray:["egoecogifcast_atlas000.jpg","egoecogifcast_atlas001.jpg","egoecogifcast_atlas002.jpg","egoecogifcast_atlas003.jpg","egoecogifcast_atlas004.jpg","egoecogifcast_atlas005.jpg","egoecogifcast_atlas006.jpg","egoecogifcast_atlas007.jpg","egoecogifcast_atlas008.jpg","egoecogifcast_atlas009.jpg","egoecogifcast_atlas010.jpg","egoecogifcast_atlas011.jpg","egoecogifcast_atlas012.jpg","egoecogifcast_atlas013.jpg","egoecogifcast_atlas014.jpg","egoecogifcast_atlas015.jpg","egoecogifcast_atlas016.jpg","egoecogifcast_atlas017.jpg","egoecogifcast_atlas018.jpg","egoecogifcast_atlas019.jpg","egoecogifcast_atlas020.jpg","egoecogifcast_atlas021.jpg","egoecogifcast_atlas022.jpg","egoecogifcast_atlas023.jpg","egoecogifcast_atlas024.jpg","egoecogifcast_atlas025.jpg","egoecogifcast_atlas026.jpg","egoecogifcast_atlas027.jpg","egoecogifcast_atlas028.jpg","egoecogifcast_atlas029.jpg","egoecogifcast_atlas030.jpg"],
        imagePath: player_skedxgifcast_path,
        animationData: data,
        loop: true,
        onLoad: function() {
          player_skedxgifcast.play();

          var trappedMouse = false;
          var trappedXPos;

          var enableInteractivity = false;
        }
      });
     }
     var jsonpScript = document.createElement("script");
     jsonpScript.type = "text/javascript";
     jsonpScript.id = "jsonPinclude_egoecogifcast";
     jsonpScript.src = player_skedxgifcast_path + "egoecogifcast_animationData.jsonp";
     document.getElementsByTagName("head")[0].appendChild(jsonpScript);

});
</script>