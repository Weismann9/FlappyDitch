var gameOptions = {
    playerGravity: 200,
    playerJump: 200,
};

var config = {
    type: Phaser.AUTO,
    width: 800,
    height: 600,
    physics: {
        default: 'arcade',
        arcade: {
            gravity: {y: 300},
            debug: false
        }
    },
    scene: [MenuScene, GameScene]
};

var game = new Phaser.Game(config);