$(function () {

    var controls, scene, camera, renderer, stats,raycaster,geometry,sphere,mouse = {x:0,y:0},projector,galaxy,theta = 0,radius = 5000;
    init();
    createScene();
    animate();

    function init() {
        var sceneDiv = $('#scene');

        stats = new Stats();
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        stats.domElement.style.zIndex = 2;
        sceneDiv.append(stats.domElement);


        scene = new THREE.Scene();

        camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 10000);


        camera.position.x = -343;
        camera.position.y = -1800;
        camera.position.z = -560;


        renderer = new THREE.WebGLRenderer();

        renderer.setSize(window.innerWidth, window.innerHeight);


        renderer.domElement.style.position = 'absolute';
        sceneDiv.append(renderer.domElement);

        controls = new THREE.TrackballControls(camera,renderer.domElement);

        controls.rotateSpeed = 1.0;
        controls.zoomSpeed = 1.2;
        controls.panSpeed = 0.8;

        controls.noZoom = false;
        controls.noPan = false;

        controls.staticMoving = true;
        controls.dynamicDampingFactor = 0.3;




        controls.addEventListener('change', render);

        projector = new THREE.Projector();
        raycaster = new THREE.Raycaster();
    }

    function createScene() {
        var galaxyGeometry = new THREE.BoxGeometry( 10000,10000,1 );
         var galaxyBackground = THREE.ImageUtils.loadTexture("assets/img/galactictop.png");
        var galaxyMaterial = new THREE.MeshBasicMaterial({
            map:galaxyBackground,
            blending: THREE.AdditiveBlending,
            transparent: true
        });

        galaxy = new THREE.Mesh(galaxyGeometry,galaxyMaterial);



        scene.add(galaxy);

    }

    function animate() {

        requestAnimationFrame(animate);
        controls.update();
        stats.update();


        theta +=0.1;
        galaxy.rotation.z =  THREE.Math.degToRad(theta );//Math.cos( THREE.Math.degToRad( Math.PI+theta ) ) ;

      // camera.lookAt( scene.position );
       //var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );

        //projector.unprojectVector( vector, camera );

        //raycaster.ray.set( camera.position, vector.sub( camera.position ).normalize() );


        render();
    }

    function render() {
        renderer.render(scene, camera);

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