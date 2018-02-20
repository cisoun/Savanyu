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

```bash
$ php -S localhost:8000 -t public
```
