# Issue-Webservice
Post issues via webservice

## Installation
```
git clone https://github.com/combak/Issue-Webservice <path>
php <path>/app/composer.phar install
```

## Configuration
```
cp <path>/app/example.config.php <path>/app/config.php
```

Edit config.php and add auth user and token
```php
return array(
    "github" => array(
        "apiUrl" => "https://api.github.com",
        "auth" => array(
            "user" => "<accountname>",
            "token" => "<Personal access token>"
        ),
    ...
    )
);      
```
