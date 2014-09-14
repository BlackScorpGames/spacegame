THREE.ShipControl = function ( object, domElement ) {
    this.object = object;

    this.domElement = ( domElement !== undefined ) ? domElement : document;
    if ( domElement ) this.domElement.setAttribute( 'tabindex', -1 );

    this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    this.keyboard = new Keyboard();


    this.relativeCameraOffset = new THREE.Vector3(0,200,200);
    this.rotationSpeed = 0;
    this.cameraOffset = this.relativeCameraOffset.applyMatrix4( this.object.matrixWorld );
    this.xAxis = 0;
    this.camera.position.x = this.cameraOffset.x;
    this.camera.position.y = this.cameraOffset.y;
    this.camera.position.z = this.cameraOffset.z;
    this.camera.lookAt( this.object.position );
    function bind( scope, fn ) {

        return function () {

            fn.apply( scope, arguments );

        };

    };
    window.addEventListener( 'keydown', bind( this, this.keydown ), false );
    window.addEventListener( 'keyup',   bind( this, this.keyup ), false );

}

THREE.ShipControl.prototype.update = function(delta){
    this.handleKeys(delta);
}
THREE.ShipControl.prototype.handleKeys = function(delta){

    var moveDistance = 200 * delta; // 200 pixels per second
    var rotateAngle = Math.PI / 2 * delta;   // pi/2 radians (90 degrees) per second

    if(this.keyboard.isDown('W')){

        this.object.translateZ( -moveDistance );
    }
    if(this.keyboard.isDown('S')){
        this.object.translateZ( moveDistance );
    }

    if(this.keyboard.isDown('Q')){
        this.object.translateX( -moveDistance );

    }
    if(this.keyboard.isDown('E')){
        this.object.translateX( moveDistance );
    }

    if(this.keyboard.isDown('A')){
        this.object.rotateOnAxis( new THREE.Vector3(0,1,0), rotateAngle);
        //this.object.rotateOnAxis( new THREE.Vector3(0,0,1), 0.1);
    }
    if(this.keyboard.isDown('D')){
        this.object.rotateOnAxis( new THREE.Vector3(0,1,0), -rotateAngle);
       //this.object.rotateOnAxis( new THREE.Vector3(0,0,1), -0.1);
    }

    var relativeCameraOffset = new THREE.Vector3(0,20,20);

    var cameraOffset = relativeCameraOffset.applyMatrix4( this.object.matrixWorld );

    if(this.camera.position.x <= cameraOffset.x){
        this.camera.position.x += 2;
    }
    if(this.camera.position.x >= cameraOffset.x){
        this.camera.position.x -= 2;
    }

  //  this.camera.position.x = cameraOffset.x;
    this.camera.position.y = cameraOffset.y;
    this.camera.position.z = cameraOffset.z;
    this.camera.lookAt( this.object.position );

}
THREE.ShipControl.prototype.getCamera = function(){
    return this.camera;
}

THREE.ShipControl.prototype.keyup = function(event){
 this.keyboard.dispatch(event);

}

THREE.ShipControl.prototype.keydown = function(event){
    this.keyboard.dispatch(event);

}