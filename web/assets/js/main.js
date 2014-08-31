$(function () {

    var controls, scene, camera, renderer, stats;
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

        camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
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

    }

    function createScene() {
        var geometry = new THREE.Geometry();


        var material = new THREE.PointCloudMaterial({
            size: 100,
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

        var sphere = new THREE.PointCloud(geometry, material);
        sphere.sortParticles = true;
        scene.add(sphere);

    }

    function animate() {

        requestAnimationFrame(animate);
        controls.update();
        stats.update();
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
    });




});