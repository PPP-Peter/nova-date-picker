# Laravel Nova Multiple Date Picker


<img src="preview.png">


## Installation

``` php
composer require pppcreative/date-picker

php artisan vendor:publish --tag=date-picker
```

## Usage

``` php
use Wame\DatePicker\DatePicker;

(new DatePicker())->width('full')

// Options:
->userDisable(true) // default false
->addParameter('address')
->getDateRange()  // define count days in config
```
## Config
You can define count days in `config/wame-datepicker.php`
``` php
    'date' => [
        "7",
        "30",
        "60",
        "90",
        "365",
    ]
```
If you define config later you must reinstall ! composer require pppcreative/date-picker

## Translates
You can edit translates in nova/sk.json
Example: 
"address": "Adresa",




