# Modpack-Webservice based on Apigility
Generel informations about Apigility based API: [APIGILITY-README.md](https://github.com/combak/Modpack-Webservice/blob/master/APIGILITY-README.md)

## Installation

```
git clone https://github.com/combak/Modpack-Webservice /path/to/install
cd /path/to/install
curl -s https://getcomposer.org/installer | php -- --filename=composer
php composer install
```

## Konfiguration

```
cp config/autoload/local.php.dist config/autoload/local.php
```

Edit config/autoload/local.php to your needs
```php
return [
    "github" => [
        "apiUrl" => "https://api.github.com",
        "auth" => [
            "user" => "Test",
            "token" => "Test-Token"
        ],
        "repositories" => [
            "mws" => [
                "token" => "mws",
                "name"  => "Modpack-Webservice",
                "owner" => "combak"
            ]
        ],
        "issue" => [
            "name_prefix" => "Issue posted by ",
            "name_suffix" => ": "
            
        ]
    ]
];
```
