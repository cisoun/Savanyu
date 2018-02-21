# Savanyu

Don't mind this repository (private project).

## Dependancies
 
- `PHP >= 5.2`
- `Composer`
- `Free time`

## Building from git

```bash
$ git clone https://github.com/cisoun/Savanyu.git
$ cd Savanyu
$ mkdir vendor
$ chmod 777 -R vendor
$ chmod 777 -R storage
$ composer update
```

## Configuration

Create a password for the administration panel :
```bash
$ echo -n "password" | sha256sum
```

Then, put it into `.env` after `PASSWORD=`.

## Run

### Method 1 : built-in PHP development server

```bash
$ php -S localhost:8000 -t .
```

### Method 2 : Apache

1. Enable `mod_rewrite` in your Apache configuration.
2. Set `AllowOverride` to `All` to the server's root folder configuration.
3. Copy `public/.htaccess` to the project's root.
4. Make sure Apache is running and open `http://localhost/path/to/savanyu`.
