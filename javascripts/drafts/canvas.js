
var camera, 
    scene, 
    renderer;

    camera = new THREE.OrthographicCamera( 
                    window.innerWidth / - 2, 
                    window.innerWidth / 2,
                    window.innerHeight / 2, 
                    window.innerHeight / - 2, - 500, 1000 );
    
    camera.position.x = 10;
    camera.position.y = 10;
    camera.position.z = 10;
    
    scene = new THREE.Scene();

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

    renderer = new THREE.CanvasRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    






var range = 500;    
geom = new THREE.CubeGeometry( 50, 50, 50 );

cubes = new THREE.Object3D();
scene.add( cubes );

for(var i = 0; i < 100; i++ ) {
        var grayness = Math.random() * 0.5 + 0.25,
                mat = new THREE.MeshBasicMaterial(),
                cube = new THREE.Mesh( geom, mat );
        mat.color.setRGB( grayness, grayness, grayness );
        cube.position.set( range * (0.5 - Math.random()), range * (0.5 - Math.random()), range * (0.5 - Math.random()) );
        cube.rotation.set( Math.random(), Math.random(), Math.random() ).multiplyScalar( 2 * Math.PI );
        cube.grayness = grayness; // *** NOTE THIS
        cubes.add( cube );
}

cubes.children.forEach(function( cube ) {
    cube.material.color.setRGB( cube.grayness, cube.grayness, cube.grayness );
});







    //container.appendChild( renderer.domElement );
    $('#bg').append(renderer.domElement)
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

    function animate(){
        getAnimationFrame(){
            camera.postion.y += 0.1;
            renderer.render()
        }
    }
;
