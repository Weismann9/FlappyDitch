class GameScene extends Phaser.Scene {
    constructor() {
        super({key: 'game'});
    }

    preload() {
        this.load.image('sky', 'assets/sky.png');
        this.load.image('bird', 'assets/bird.png');
        this.load.image('pipe', 'assets/pipe.png');
    }

    create() {
        this.add.image(400, 300, 'sky');
        this.bird = this.physics.add.image(game.config.width / 2, game.config.height / 2, 'bird');
        this.bird.body.gravity.y = gameOptions.playerGravity;

        this.key_esc = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ESC);
        this.key_jump = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.SPACE);

        this.score = 0;
        this.labelScore = this.add.text(20, 20, "0",
            { font: "30px Arial", fill: "#ffffff" });

        this.labelScore.setScrollFactor(0);

        this.pipes = this.add.group();
        this.physics.add.overlap(this.bird, this.pipes, this.restartGame, null, this);

        // this.cameras.main.startFollow(this.bird);
        this.time.addEvent({
            delay: 2000,
            callback: this.addRowOfPipes,
            callbackScope: this,
            loop: true
        });
    }

    update() {
        if (this.key_jump.isDown) {
            this.bird.setVelocityY(-gameOptions.playerJump);
        }

        if (this.bird.y < 0 || this.bird.y > 600) {
            this.restartGame();
        }

        if (this.key_esc.isDown) {
            this.scene.start('menu');
            console.log('key_esc');
            this.key_esc.isDown = false;
        }
    }

    restartGame(){
        this.scene.start('game');
    }

    addOnePipe(x,y){
        this.pipe = this.physics.add.image(x, y, 'pipe');
        this.pipe.setVelocityX(-200);
        this.pipe.checkWorldBounds = true;
        this.pipe.outOfBoundsKill = true;
        this.pipe.body.allowGravity = false;
        this.pipes.add(this.pipe);
    }

    addRowOfPipes() {
        this.labelScore.text = this.score;
        var hole = Math.floor(Math.random() * 5) + 1;
        for (var i = 0; i < 9; i++) {
            if (i !== hole && i !== hole + 1) {
                this.addOnePipe(800, i * 60 + 50);
            }
        }
        this.score += 1;
    }
}

