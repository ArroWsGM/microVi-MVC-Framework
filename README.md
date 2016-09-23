## microVi MVC Framework

The microVi it's a tiny MVC Framework with Eloquent ORM inspired by Laravel.

### Requirements

	* PHP >= 5.6.4
	* OpenSSL PHP Extension
	* PDO PHP Extension
	* Mbstring PHP Extension

And, of course, you need Composer to install all dependencies.

### Installation

Just clone or download and unpack archive, then execute

> composer install

to install all dependencies. Copy `.env.example` to `.env` and change default settings if you need. **microVi** ships with a basic `CRUD` example:

    -app
        -controllers
            HomeController.php
        -models
            Home.php
        -views
            -default
                index.php
            -partials
                footer.php
                header.php
                navbar.php
    -database
        microvi.db

You free to explore and change all this stuff.

### Using microVi

**Document root**

Set your server document root directory to public/, otherwise all request will be redirected to public directory by .htaccess.

**Main directory**

The main directory is app/, is autoloaded by Composer.

**Naming conventions**

Framework use automatic routing.
```
http://example.com/controllername/actionname[/data[/..]]
```
This url instantiate the `ControllernameController` class from `ControllernameController.php` file, 
located in `app/controllers` folder, and execute `actionname` method. All controller class names must be capitalized and you need to add the `Controller` suffix. If the URL does not contain any parameters, default controller/action will be fired. Any additional `data` will be passed as an array.

```php
namespace App\Controllers;
class ControllernameController extends Controller
{
    ...
    public function actionname(array $data){
```

**Models and Database**

**microVi** use `Eloquent ORM`. To give your model all it's advantages, just extend your model with base `Model` class. `Eloquent ORM` also have a nice [documentation].

**Helpers**

You can create your own helper functions. Just crate a `.php` file in `app/helpers` directory or it's subdirectories and it will be loaded during bootstrap process.

**Default helper functions**

    -default
        -env.php
            database_path([path]) - Gets the database path
            env('ENV_VAR', [default]) - Gets the value of an environment variable. If `ENV_VAR` not exists, return `default` value, if it passed to function
            public_path([path]) - Gets the public folder path.
        -session.php
            flash_get(name) - Retrieve flash message from session. Return array.
            flash_get_all() - Get all flash messages from session.
            flash_set(name, [message], [status], [redirect]) - Add a flash message to the session data. If redirect URL passed to function, it will be immediately executed.
        -strings.php
            endsWith(haystack, needles) - Determine if a given string ends with a given substring.
            startsWith(haystack, needles) - Determine if a given string starts with a given substring.
            str_random([length]) - Generate a "random" alpha-numeric string.
            str_slug(title, [separator]) - Generate a slug.
            url([url]) - Generate full URL based on .env APP_URL variable.


[documentation]: <https://laravel.com/docs/5.3/eloquent>