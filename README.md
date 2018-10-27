## FlappyDitch
A silly project which implements a flappy game.

### Project structure

- /assets — basic game assets for Phaser
- /php — assisting php scripts
- /scenes — Phaser game scenes
- /scripts — javaScript files
- /vendors — javaScript libraries

#### Database configuration:
Configure your database connection in file /php/db_config.php\
Use /php/db_config[Template].php as a template.
```
define('DB_SERVER', 'localhost:8889');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'flappyditch_db');
```
