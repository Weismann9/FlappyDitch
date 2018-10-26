class MenuScene extends Phaser.Scene {
    constructor() {
        super({key: 'menu'});
    }

    preload() {
    }

    create() {
        this.text = this.add.text(350, 150, "Menu", {font: "60px Impact"});
        this.text = this.add.text(265, 270, "Press ENTER to start", {font: "35px Impact"});
        // Refactored, not used anymore
        // this.text= this.add.text(210, 370, "Press SPACE to login and start", {font: "35px Impact"});
        
        this.key_start = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ENTER);

        // this.key_login_start = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.SPACE);
    }

    update() {
        if (this.key_start.isDown) {
            this.scene.start('game');
            console.log('key_start');
            this.key_start.isDown = false;
        }
        // if (this.key_login_start.isDown) {
        //     this.scene.start('authorization');
        //     console.log('key_login_start');
        //     this.key_login_start.isDown = false;
        // }
    }
}