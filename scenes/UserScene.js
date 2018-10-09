var dat="dd";
class UserScene extends Phaser.Scene {
    constructor() {
        super({key: 'user'});
    }

    preload() {
    }

    create() {
        this.text = this.add.text(265, 270, "Press ENTER to start", {font: "35px Impact"});  
        this.key_start = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ENTER);
        this.key_esc = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ESC);
    }

    update() {
        if (this.key_start.isDown) {
            this.scene.start('game');
            console.log('key_start');
            this.key_start.isDown = false;
        }
        if (this.key_esc.isDown) {
            this.scene.start('menu');
            console.log('key_esc');
            this.key_esc.isDown = false;
        }
    }
}