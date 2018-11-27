[![Build Status](https://travis-ci.org/andrej-griniuk/laravel-refresh-and-seed-database.svg?branch=master)](https://travis-ci.org/andrej-griniuk/laravel-refresh-and-seed-database)
[![License](https://poser.pugx.org/andrej-griniuk/laravel-refresh-and-seed-database/license)](https://packagist.org/packages/andrej-griniuk/laravel-refresh-and-seed-database)

# RefreshAndSeedDatabase trait for Laravel

This trait extends Laravel's [RefreshDatabase trait](https://laravel.com/docs/5.7/database-testing#resetting-the-database-after-each-test) functionality to seed the database after running migrations.

## Requirements

- Laravel 5.7+

## Installation

```bash
composer require andrej-griniuk/laravel-refresh-and-seed-database
```

## Usage

Add this trait to your Test

```php
abstract class TestCase extends BaseTestCase
{
    use RefreshAndSeedDatabase;
    
    ...
}
```

## License

Copyright (c) 2016, [Andrej Griniuk][andrej-griniuk] and licensed under [The MIT License][mit].

[mit]:http://www.opensource.org/licenses/mit-license.php
[andrej-griniuk]:https://github.com/andrej-griniuk 
