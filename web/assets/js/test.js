$(function(){

    var renderer,stats,controls,camera,projector,raycaster,mouse = {x:0,y:0}, sceneDiv = $('#scene'),radius = 10,clock,myShip;
    initStats();
    init();
    createStars();
    render();
    load();
    animate();
    function initStats(){
        stats = new Stats();
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        stats.domElement.style.zIndex = 2;
        sceneDiv.append(stats.domElement);
    }
    function init() {
        scene = new THREE.Scene();

        scene.add( new THREE.AmbientLight( 0xcccccc ) );

         clock = new THREE.Clock();
        /*
        camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 10000);
        camera.position.x = 100;

        */
        var axisHelper = new THREE.AxisHelper( 100 );
        scene.add( axisHelper );
        renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.domElement.style.left = '0';
        renderer.domElement.style.top = '0';
        renderer.domElement.style.position = 'absolute';
        sceneDiv.append(renderer.domElement);





        /*
         controls = new THREE.TrackballControls(camera,renderer.domElement);

        controls.rotateSpeed = 1.0;
        controls.zoomSpeed = 1.2;
        controls.panSpeed = 0.8;

        controls.noZoom = false;
        controls.noPan = false;

        controls.staticMoving = true;
        controls.dynamicDampingFactor = 0.3;


       // controls.addEventListener('change', render);
    */


        projector = new THREE.Projector();
        raycaster = new THREE.Raycaster();
    }
    function render(){
        renderer.render(scene, camera);
    }
    function animate() {

        requestAnimationFrame(animate);

        stats.update();
        if(controls != undefined){
            var delta = clock.getDelta();
            /*
            var relativeCameraOffset = new THREE.Vector3(0,10,10);

            var cameraOffset = relativeCameraOffset.applyMatrix4( myShip.matrixWorld );

            camera.position.x = cameraOffset.x;
            camera.position.y = cameraOffset.y;
            camera.position.z = cameraOffset.z;
            camera.lookAt( myShip.position );
        */
            controls.update( delta );
        }


      //  theta +=0.1;
       // galaxy.rotation.z =  THREE.Math.degToRad(theta );//Math.cos( THREE.Math.degToRad( Math.PI+theta ) ) ;

        // camera.lookAt( scene.position );
        //var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );

        //projector.unprojectVector( vector, camera );

        //raycaster.ray.set( camera.position, vector.sub( camera.position ).normalize() );


        render();
    }
    function createStars(){
        var i, r = radius, starsGeometry = [ new THREE.Geometry(), new THREE.Geometry() ];

        for ( i = 0; i < 250; i ++ ) {

            var vertex = new THREE.Vector3();
            vertex.x = Math.random() * 2 - 1;
            vertex.y = Math.random() * 2 - 1;
            vertex.z = Math.random() * 2 - 1;
            vertex.multiplyScalar( r );

            starsGeometry[ 0 ].vertices.push( vertex );

        }

        for ( i = 0; i < 1500; i ++ ) {

            var vertex = new THREE.Vector3();
            vertex.x = Math.random() * 2 - 1;
            vertex.y = Math.random() * 2 - 1;
            vertex.z = Math.random() * 2 - 1;
            vertex.multiplyScalar( r );

            starsGeometry[ 1 ].vertices.push( vertex );

        }

        var stars;
        var starsMaterials = [
            new THREE.PointCloudMaterial( { color: 0x555555, size: 2, sizeAttenuation: false } ),
            new THREE.PointCloudMaterial( { color: 0x555555, size: 1, sizeAttenuation: false } ),
            new THREE.PointCloudMaterial( { color: 0x333333, size: 2, sizeAttenuation: false } ),
            new THREE.PointCloudMaterial( { color: 0x3a3a3a, size: 1, sizeAttenuation: false } ),
            new THREE.PointCloudMaterial( { color: 0x1a1a1a, size: 2, sizeAttenuation: false } ),
            new THREE.PointCloudMaterial( { color: 0x1a1a1a, size: 1, sizeAttenuation: false } )
        ];

        for ( i = 10; i < 30; i ++ ) {

            stars = new THREE.PointCloud( starsGeometry[ i % 2 ], starsMaterials[ i % 6 ] );

            stars.rotation.x = Math.random() * 6;
            stars.rotation.y = Math.random() * 6;
            stars.rotation.z = Math.random() * 6;

            s = i * 10;
            stars.scale.set( s, s, s );

            stars.matrixAutoUpdate = false;
            stars.updateMatrix();

            scene.add( stars );

        }
    }
    function load(){

        var loader = new THREE.JSONLoader();

        loader.load( "assets/objects/spaceship.json", function(geometry, materials){

            myShip = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
            myShip.scale.set( 10, 10, 10 );

            scene.add(myShip);
            controls = new THREE.ShipControl(myShip);
            camera = controls.getCamera();

            /*
            controls = new THREE.FlyControls( myShip);
            controls.movementSpeed = 1000;
            controls.domElement = renderer.domElement;
            controls.rollSpeed = Math.PI / 24;
            controls.autoForward = false;
            controls.dragToLook = false;*/
        } );
    }
    $(window).on('resize', function (e) {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

        renderer.setSize(window.innerWidth, window.innerHeight);

        controls.handleResize();

        render();
    }).on('mousemove',function(e){
        e.preventDefault();

        mouse.x = ( e.clientX / window.innerWidth ) * 2 - 1;
        mouse.y = - ( e.clientY / window.innerHeight ) * 2 + 1;
    });
});