[![Build Status](https://img.shields.io/travis/andrej-griniuk/laravel-refresh-and-seed-database/master.svg?style=flat-square)](https://travis-ci.org/andrej-griniuk/laravel-refresh-and-seed-database)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)

# RefreshAndSeedDatabase trait for Laravel

This trait extends Laravel's [RefreshDatabase trait](https://laravel.com/docs/5.7/database-testing#resetting-the-database-after-each-test) functionality to seed the database after running migrations.

## Requirements

- Laravel 5.6+

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
