class MenuScene extends Phaser.Scene {
    constructor() {
        super({key: 'menu'});
    }

    preload() {
    }

    create() {
        this.text = this.add.text(350, 250, "Menu", {font: "40px Impact"});
        this.text = this.add.text(265, 350, "Press ENTER to start", {font: "35px Impact"});
        this.key_start = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ENTER);
    }

    update() {
        if (this.key_start.isDown) {
            this.scene.start('game');
            console.log('key_start');
            this.key_start.isDown = false;
        }
    }
}