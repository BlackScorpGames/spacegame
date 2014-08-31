$(function () {

    var controls, scene, camera, renderer, stats,raycaster,geometry,sphere,mouse = {x:0,y:0},projector;
    init();
    createScene();
    animate();

    function init() {
        stats = new Stats();
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        stats.domElement.style.zIndex = 2;
        document.body.appendChild(stats.domElement);

        scene = new THREE.Scene();

        camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 10000);
        camera.position.z = 1000;

        renderer = new THREE.WebGLRenderer();

        renderer.setSize(window.innerWidth, window.innerHeight);

        renderer.domElement.id = 'map';
        renderer.domElement.style.zIndex = 0;
        renderer.domElement.style.top = 0;
        renderer.domElement.style.left = 0;
        renderer.domElement.style.position = 'absolute';

        document.body.appendChild(renderer.domElement);

        controls = new THREE.TrackballControls(camera);

        controls.rotateSpeed = 1.0;
        controls.zoomSpeed = 1.2;
        controls.panSpeed = 0.8;

        controls.noZoom = false;
        controls.noPan = false;

        controls.staticMoving = true;
        controls.dynamicDampingFactor = 0.3;

        controls.keys = [ 65, 83, 68 ];

        controls.addEventListener('change', render);
        projector = new THREE.Projector();
        raycaster = new THREE.Raycaster();
    }

    function createScene() {
         geometry = new THREE.Geometry();



        var material = new THREE.PointCloudMaterial({


            size: 12,
            map: THREE.ImageUtils.loadTexture(
                "assets/img/galactictop.png"
            ),
            blending: THREE.AdditiveBlending,
            transparent: true
        });

        for (var galaxyIndex in galaxies) {
            var galaxy = galaxies[galaxyIndex];
            var vector = new THREE.Vector3();
            vector.y = galaxy.posY;
            vector.z = galaxy.posZ;
            vector.x = galaxy.posX;

            geometry.vertices.push(vector);

        }

         sphere = new THREE.PointCloud(geometry, material);
        sphere.sortParticles = true;
        scene.add(sphere);

    }

    function animate() {

        requestAnimationFrame(animate);
        controls.update();
        stats.update();

       var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );

        projector.unprojectVector( vector, camera );

        raycaster.ray.set( camera.position, vector.sub( camera.position ).normalize() );

        var intersects =  raycaster.intersectObject(sphere );
        if ( intersects.length > 0 ) {
          //  intersects[ 0 ].object.material.color.setHex( Math.random() * 0xffffff );


        }
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