$(function(){
    var stats = new Stats();
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    stats.domElement.style.zIndex = 2;
    document.body.appendChild( stats.domElement );

    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    renderer.domElement.id = 'map';
    renderer.domElement.style.zIndex = 0;
    renderer.domElement.style.top = 0;
    renderer.domElement.style.left = 0;
    renderer.domElement.style.position = 'absolute';
    document.body.appendChild( renderer.domElement );


    var geometry = new THREE.Geometry();


    var material = new THREE.PointCloudMaterial( {
        size: 80,
        map: THREE.ImageUtils.loadTexture(
            "assets/img/galactictop.png"
        ),
        blending: THREE.AdditiveBlending,
        transparent: true
    });

    for(var galaxyIndex in galaxies){
        var galaxy = galaxies[galaxyIndex];
        var vector = new THREE.Vector3();
        vector.y = galaxy.posY;
        vector.z = galaxy.posZ;
        vector.x = galaxy.posX;

        geometry.vertices.push(vector);

    }

    var sphere = new THREE.PointCloud( geometry, material );
    sphere.sortParticles = true;
    scene.add( sphere );

    camera.position.z = 1000;
    $('#map').on('mousewheel DOMMouseScroll',function(e){
        var delta = e.originalEvent.detail || e.originalEvent.wheelDelta;
        if(delta < 0){
            camera.position.z -= 20;
        }else{
            camera.position.z += 20;
        }
    });


    function render() {
        stats.begin();
        requestAnimationFrame(render);
        renderer.render(scene, camera);
        stats.end();
    }
    render();


});