$(function(){
    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    renderer.domElement.id = 'map';
    renderer.domElement.style.top = 0;
    renderer.domElement.style.left = 0;
    renderer.domElement.style.position = 'absolute';
    document.body.appendChild( renderer.domElement );



    var geometry = new THREE.SphereGeometry( 1, 32, 32 );
    var material = new THREE.MeshBasicMaterial( {color: 0xffffff} );

    for(var galaxyIndex in galaxies){
        var galaxy = galaxies[galaxyIndex];
        var sphere = new THREE.Mesh( geometry, material );
        sphere.position.y = galaxy.posY;
        sphere.position.z = galaxy.posZ;
        sphere.position.x = galaxy.posX;
        scene.add( sphere );
    }



    camera.position.z = 10;
    function render() {

        requestAnimationFrame(render);
        renderer.render(scene, camera);
    }
    render();
});