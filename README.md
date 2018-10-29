## FlappyDitch
A silly project which implements a flappy game.

### Project structure

- / — web-pages
- /assets — project assets
- /vendors — javaScript libraries
- /src — core php files
- /phaser — game source code

#### Database configuration:
Configure your database connection in file '/src/config/db_config.php'\
Use '/src/config/db_config[Template].php' as a template.
```
define('DB_SERVER', 'localhost:8889');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'flappyditch_db');
```

#### Assets and vendors
Add your assets to '/assets'\
Add your vendors to '/vendor'\
Include added files in '/src/config/app_config.php', follow the example.\
#### When adding vendors or assets, *ORDER IS IMPORTANT*

```
const APP_VENDORS = [
    //jQuery slim and popper min HAVE to be loaded before Bootstrap
    'jquery-3.3.1.slim.min.js' => TYPE_JS,
    'popper.min.js' => TYPE_JS,
    'bootstrap.min.css' => TYPE_CSS,
    'bootstrap.min.js' => TYPE_JS,
    // jquery HAS to be loaded before backgroundvideo extension
    'jquery.js' => TYPE_JS,
    'phaser.js' => TYPE_JS,

];

const APP_ASSETS = [
    'https://fonts.googleapis.com/css?family=Lobster' => TYPE_CSS,
    'main.css' => TYPE_CSS,
];
```
*Avoid editing anything else.*

