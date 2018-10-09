var res = 0;
var link = null;
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
        link=this;
        this.add.image(400, 300, 'sky');
        this.bird = this.physics.add.image(game.config.width / 2, game.config.height / 2, 'bird');
        this.bird.body.gravity.y = gameOptions.playerGravity;

        this.key_esc = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ESC);
        this.key_jump = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.SPACE);

        this.score = 0;
        this.labelScore = this.add.text(20, 20, "score: 0",
          { font: "30px Arial", fill: "#ffffff" });

        if(if_user)this.labelBestScore = this.add.text(20, 60, "0",
          { font: "30px Arial", fill: "#ffffff" });

        this.labelScore.setScrollFactor(0);

        this.pipes = this.add.group();
        this.physics.add.overlap(this.bird, this.pipes, this.save_scores, null, this);

        // this.cameras.main.startFollow(this.bird);
        this.time.addEvent({
            delay: 2000,
            callback: this.addRowOfPipes,
            callbackScope: this,
            loop: true
        });
    }

    update() {
        if(if_user) this.best_score();
        if (this.key_jump.isDown) {
            this.bird.setVelocityY(-gameOptions.playerJump);
        }

        if (this.bird.y < 0 || this.bird.y > 600) {
         this.save_scores();
     //       this.restartGame();
        }

        if (this.key_esc.isDown) {
            if(if_user){
                destroy();
            $(document).ready(function(){
            $.ajax({
                url:"php/destroy.php",
                success: function(output){
                    }
                });
            });}
            this.scene.start('menu');
            console.log('key_esc');
            this.key_esc.isDown = false;
        }
    }

    restartGame(){
        res=0;
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
        res = this.score;
        this.labelScore.text = "score: "+this.score;
        var hole = Math.floor(Math.random() * 5) + 1;
        for (var i = 0; i < 9; i++) {
            if (i !== hole && i !== hole + 1) {
                this.addOnePipe(800, i * 60 + 50);
            }
        }
        this.score += 1;
    }

    save_scores()
    {
        if(if_user){
        $(document).ready(function(){
            var _score = res;
            var _usid = user_id();
            var _data = '_score='+_score+'&_usid='+_usid;
          //  console.log(_data);
            $.ajax({
                type: "POST",
                url:"php/save_score.php",
                data: _data,
                success: function(output){
                    }
                });
            });
        }
        this.restartGame();
    }
    best_score()
    {
        if(if_user){
        $(document).ready(function(){
            var _usid = user_id();
            var _data = '_usid='+_usid;
            //console.log(_data);
            $.ajax({
                type: "POST",
                url:"php/best_score.php",
                data: _data,
                success: function(output){
                link.labelBestScore.text = "best: "+output;
                    }
                });
            });
        }
    }
}

