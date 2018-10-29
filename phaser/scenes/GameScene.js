class User {
    constructor(id, name, bestScore, skin) {
        this.id = id;
        this.name = name;
        this.bestScore = bestScore;
        this.skin = skin;
    }
}


class GameScene extends Phaser.Scene {

    constructor() {
        super({key: 'game'});

        let userData = document.getElementById('user-data');
        this.userIsGuest = (userData.getAttribute('typeof') === 'guest');

        if (!this.userIsGuest) {
            let userId = parseInt(document.getElementById('user-id').value),
                userName = document.getElementById('user-login').value,
                userBestScore = document.getElementById('user-bs').value,
                userSkin = document.getElementById('user-skin').value;
            this.user = new User(userId, userName, userBestScore, userSkin);
        }
        this.userSkin = (!this.userIsGuest) ? this.user.skin : 'default';
    }

    preload() {
        this.load.image('sky', 'assets/media/sky.png');
        this.load.image('bird', `assets/media/characters/${this.userSkin}.png`);
        this.load.image('pipe', 'assets/media/pipe.png');
        this.load.image('pipe_top_edge', 'assets/media/pipe_top_edge.png');
        this.load.image('pipe_bottom_edge', 'assets/media/pipe_bottom_edge.png');
    }

    create() {
        this.add.image(this.game.config.width / 2, this.game.config.height / 2, 'sky');
        this.bird = this.physics.add.image(this.game.config.width / 2, this.game.config.height / 2, 'bird');
        this.bird.body.gravity.y = gameOptions.playerGravity;

        this.key_esc = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ESC);
        this.key_jump = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.SPACE);

        this.score = 0;
        this.labelScore = this.add.text(20, 20, "Score: 0",
            {font: "30px Arial", fill: "#ffffff"});

        this.labelBestScore = (!this.userIsGuest)
            ? this.add.text(20, 60, `Best: ${this.user.bestScore}`, {font: "30px Arial", fill: "#ffffff"})
            : this.add.text(20, 60, 'Scores don\'t save for guests.', {font: "30px Arial", fill: "#ffffff"});

        this.labelScore.setScrollFactor(0);

        this.pipes = this.add.group();
        this.physics.add.overlap(this.bird, this.pipes, this.gameOver, null, this);

        // Make camera track the player.
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
            if (!this.userIsGuest) this.saveBestScore();
            this.restartGame();
        }

        if (this.key_esc.isDown) {
            window.location = '../../index.php';
        }
    }

    restartGame() {
        //this.scene.start('game');

        //Instead of reloading the scene internally we reload the whole page.
        //In such way best score can update from database.
        document.location.reload(false);
    }

    addOnePipe(x, y, image_key) {
        this.pipe = this.physics.add.image(x, y, image_key);
        this.pipe.setVelocityX(-200);
        this.pipe.checkWorldBounds = true;
        this.pipe.outOfBoundsKill = true;
        this.pipe.body.allowGravity = false;
        this.pipes.add(this.pipe);
    }

    addRowOfPipes() {
        this.labelScore.text = `Score: ${this.score}`;
        let pipe_type;
        let among_of_pipes = this.game.config.height / 50;
        let hole = Math.floor(Math.random() * among_of_pipes / 2) + 1;
        for (let i = 0; i < among_of_pipes; i++) {
            if (i !== hole - 1 && i !== hole && i !== hole + 1) {
                switch (i) {
                    case hole - 2:
                        pipe_type = 'pipe_top_edge';
                        break;
                    case hole + 2:
                        pipe_type = 'pipe_bottom_edge';
                        break;
                    default:
                        pipe_type = 'pipe';
                }
                this.addOnePipe(this.game.config.width, i * 50 + 25, pipe_type);
            }
        }
        this.score += 1;
    }

    saveBestScore() {
        if (this.user.bestScore < this.score) {
            let score = this.score,
                userId = this.user.id;
            $.ajax({
                type: "POST",
                url: "src/save_score.php",
                data: {
                    userId: userId,
                    bestScore: score,
                },
                success: function () {
                    console.log(`Score: ${score}, User(id): ${userId}, Saved!`);
                }
            });
            this.user.bestScore = this.score;
        }
    }

    gameOver() {
        if (!this.userIsGuest) this.saveBestScore();
        this.restartGame();
    }

}

