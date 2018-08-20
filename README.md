PHP port of [mm_phonenumber](https://github.com/Melomap/mm_phonenumber) to check valid myanmar mobile numbers, get mobile operator's name, sanitize mobile numbers and get mobile network types.

Credit: [Original script (Python)](https://github.com/Melomap/mm_phonenumber)
[Original script (JS)](https://github.com/kaungmyatlwin/myanmar-phonenumber-js)

### Installation

```
TODO
```

### Usage
```php
<?php
	require __DIR__ . "/vendor/autoload.php";

    use CyberWings\MyanmarPhoneNumber;

    $phone_number = new MyanmarPhoneNumber();

    $phone_number->is_telecom('Telenor', "09794303891");
    $phone_number->is_telecom('mpt', "09794303891");
    $phone_number->is_telecom('ooredoo', "09794303891");
    $phone_number->is_telecom('mytel', "09694303891");
    $phone_number->is_telecom('mec', "09334303891");

    $phone_number->is_valid('09794303891');
    $phone_number->telecom_name('09794303891');
    $phone_number->add_prefix("0979403891");
?>
```

### TODO
- Features: Check Network Types
- Installation Instruction
- Packagist *
- Laravel Validation Rule
- Laravel Package