THREE.ShipControl = function ( object, domElement ) {
    this.object = object;

    this.domElement = ( domElement !== undefined ) ? domElement : document;
    if ( domElement ) this.domElement.setAttribute( 'tabindex', -1 );

    this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    this.keyboard = new Keyboard();


    this.relativeCameraOffset = new THREE.Vector3(0,200,200);

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
    this.handleKeys();


}
THREE.ShipControl.prototype.handleKeys = function(){
    if(!this.keyboard.isDown()){
        rotate = false;
        rotationSpeed = 0;
        return false;
    }

    if(this.keyboard.isDown('W')){
        this.object.position.z -= 10;
        this.camera.position.z -= 10;

    }
    if(this.keyboard.isDown('S')){
        this.object.position.z += 10;
        this.camera.position.z += 10;

    }
    if(this.keyboard.isDown('A')){
        this.object.position.x -= 10;

        rotationSpeed += 0.01;
        if(rotationSpeed > 1){
            rotationSpeed = 1;
        }
        this.object.rotation.z =rotationSpeed;


        this.camera.position.x -= 10;
    }
    if(this.keyboard.isDown('D')){
        this.object.position.x += 10;
        this.camera.position.x += 10;
        rotationSpeed -= 0.01;
        if(rotationSpeed < -1){
            rotationSpeed = -1;
        }
        this.object.rotation.z = rotationSpeed;

    }
    if(this.keyboard.isDown('W') && this.keyboard.isDown('A')){
        this.object.rotation.y  = this.object.rotation.z;
    }
    if(this.keyboard.isDown('W') && this.keyboard.isDown('D')){
        this.object.rotation.y  = this.object.rotation.z;
    }
    if(this.keyboard.isDown('LEFT_ARROW')){
        this.object.rotation.y += 0.1;
    }
    if(this.keyboard.isDown('RIGHT_ARROW')){
        this.object.rotation.y -= 0.1;
    }
    return ;
    rotate = false;
    if(this.keyboard.isDown('LEFT_ARROW')){
        this.xAxis +=1;
        rotate = true;
    }
    if(this.keyboard.isDown('RIGHT_ARROW')){
        this.xAxis -=1;
        rotate = true;
    }
    if(rotate){
        radius = 10;
        var rotationX = radius * Math.sin(THREE.Math.degToRad(this.xAxis));
        var rotationY = radius * Math.cos(THREE.Math.degToRad(this.xAxis));
        this.camera.position.x = rotationX;
        this.camera.position.z = rotationY;

        this.camera.lookAt( this.object.position );
    }

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