THREE.ShipControl = function ( object, domElement ) {
    this.object = object;

    this.domElement = ( domElement !== undefined ) ? domElement : document;
    if ( domElement ) this.domElement.setAttribute( 'tabindex', -1 );

    this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    this.keyboard = new Keyboard();


    this.relativeCameraOffset = new THREE.Vector3(0,200,200);

    this.cameraOffset = this.relativeCameraOffset.applyMatrix4( this.object.matrixWorld );

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
        this.camera.position.x -= 10;
    }
    if(this.keyboard.isDown('D')){
        this.object.position.x += 10;
        this.camera.position.x += 10;
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