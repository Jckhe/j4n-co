/* Author: Poops Drewniak
    
*/



var camera, 
    scene, 
    renderer,
    projector;

    scene = new THREE.Scene();

var mouse = { x: 0, y: 0 };

    var VIEW_ANGLE = 45, ASPECT = $(window).width() / $(window).height(), NEAR = 0.1, FAR = 20000;
    camera = new THREE.PerspectiveCamera( VIEW_ANGLE, ASPECT, NEAR, FAR);
    scene.add(camera);
    camera.position.set(0,100,800);
    camera.lookAt(scene.position);  

    
    camera.lookAt(scene.position);  

    var size = 500, step = 50;
    var geometry = new THREE.Geometry();
    
    for ( var i = - size; i <= size; i += step ) {
        geometry.vertices.push( new THREE.Vector3( - size, 0, i ) );
        geometry.vertices.push( new THREE.Vector3(   size, 0, i ) );
        geometry.vertices.push( new THREE.Vector3( i, 0, - size ) );
        geometry.vertices.push( new THREE.Vector3( i, 0,   size ) );
    }

    var material = new THREE.LineBasicMaterial( { color: 0x000000, opacity: 0.2 } );
    var line = new THREE.Line( geometry, material );
    line.type = THREE.LinePieces;
    scene.add( line );

    var axes = buildAxes( 1000 );
    scene.add( axes );
    
    var ballTexture = THREE.ImageUtils.loadTexture( 'icons/apple-touch-icon-144x144-precomposed.png' );
    
    ballSprite = new THREE.Sprite( { map: ballTexture, useScreenCoordinates: true, alignment: THREE.SpriteAlignment.center } );
    ballSprite.position.set( 50, 50, 0 );
    
    scene.add( ballSprite );

    projector = new THREE.Projector();
    
    document.addEventListener('mousemove', onDocumentMouseMove, false);

    renderer = new THREE.CanvasRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    

    function onDocumentMouseMove(event){
        ballSprite.position.set( event.clientX, event.clientY, 0 );
        mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
        mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
        update()

    }



        var range = 50;    
        geom = new THREE.CubeGeometry( 50, 50, 50 );

        var grayness = Math.random() * 0.5 + 0.25
        mat = new THREE.MeshBasicMaterial();
    cube = new THREE.Mesh( new THREE.CubeGeometry( 50, 50, 50 ), new THREE.MeshNormalMaterial() );
        mat.color.setRGB( grayness, grayness, grayness );
        cube.position.set( 0, 0, 0 );
        cube.rotation.set( Math.random(), Math.random(), Math.random() ).multiplyScalar( 2 * Math.PI );
        cube.grayness = grayness; // *** NOTE THIS
    //    scene.add( cube );






    //container.appendChild( renderer.domElement );
    $('body').append(renderer.domElement)
    //

    $(document).keydown(function(e) {
        console.log('x:'+camera.position.x+" y:"+camera.position.y+" z:"+camera.position.z)

        switch ( e.keyCode ){ 
        case 38:
            console.log(camera.position.x)
            camera.position.y += 10;
            break;

        case 40:
            camera.position.y -= 10;
            break;
        case 37:
            camera.position.x -= 10;
            break;
        case 39: 
            camera.position.x += 10;        
        }
            renderer.render( scene, camera);
 
    });

    $('body').css('overflow', 'hidden');

    camera.lookAt( scene.position );
    renderer.render( scene, camera);

    function buildAxes( length ) {
        var axes = new THREE.Object3D();

        axes.add( buildAxis( new THREE.Vector3( 0, 0, 0 ), new THREE.Vector3( length, 0, 0 ), 0xFF0000, false ) ); // +X
        axes.add( buildAxis( new THREE.Vector3( 0, 0, 0 ), new THREE.Vector3( -length, 0, 0 ), 0xFF0000, true) ); // -X
        axes.add( buildAxis( new THREE.Vector3( 0, 0, 0 ), new THREE.Vector3( 0, length, 0 ), 0x00FF00, false ) ); // +Y
        axes.add( buildAxis( new THREE.Vector3( 0, 0, 0 ), new THREE.Vector3( 0, -length, 0 ), 0x00FF00, true ) ); // -Y
        axes.add( buildAxis( new THREE.Vector3( 0, 0, 0 ), new THREE.Vector3( 0, 0, length ), 0x0000FF, false ) ); // +Z
        axes.add( buildAxis( new THREE.Vector3( 0, 0, 0 ), new THREE.Vector3( 0, 0, -length ), 0x0000FF, true ) ); // -Z

        return axes;

    }

    function buildAxis( src, dst, colorHex, dashed ) {
        var geom = new THREE.Geometry(),
            mat; 

        if(dashed) {
            mat = new THREE.LineDashedMaterial({ linewidth: 3, color: colorHex, dashSize: 3, gapSize: 3 });
        } else {
            mat = new THREE.LineBasicMaterial({ linewidth: 3, color: colorHex });
        }

        geom.vertices.push( src.clone() );
        geom.vertices.push( dst.clone() );
        geom.computeLineDistances(); // This one is SUPER important, otherwise dashed lines will appear as simple plain lines

        var axis = new THREE.Line( geom, mat, THREE.LinePieces );

        return axis;

    }

    function animate() {

        // note: three.js includes requestAnimationFrame shim
        requestAnimationFrame( animate );
        renderer.render( scene, camera ); 
    }

    animate()
    
    function addCube(){
        var go = new THREE.CubeGeometry( 50, 50, 50 );
        var ma = new THREE.MeshBasicMaterial();
        var cub = new THREE.Mesh( go, ma );
        cub.position.set( see.x, see.y, 0 );
        scene.add( cub );
        console.log('addCube')
    }
    var see = {}
    see.x = mouse.x
    see.y = mouse.y

    function update(){
        var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );
        projector.unprojectVector( vector, camera );
        //console.log(vector)
        var ray = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );
        console.log('cube.y'+cube.position.y )
        console.log('ray.y'+ray.ray.direction.y)
        see.x = ray.ray.direction.x*1000
        see.y = ray.ray.direction.y*1000
        //cube.position.z = 0
        addCube();
    }
;
