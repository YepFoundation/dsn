[![Build Status](https://travis-ci.org/YepFoundation/dsn.svg?branch=master)](https://travis-ci.org/YepFoundation/dsn)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/YepFoundation/dsn/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/YepFoundation/dsn/?branch=master)
[![Scrutinizer Code Coverage](https://scrutinizer-ci.com/g/YepFoundation/dsn/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/YepFoundation/dsn/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/yep/dsn/v/stable)](https://packagist.org/packages/yep/dsn)
[![Total Downloads](https://poser.pugx.org/yep/dsn/downloads)](https://packagist.org/packages/yep/dsn)
[![License](https://poser.pugx.org/yep/dsn/license)](https://github.com/YepFoundation/dsn/blob/master/LICENSE.md)

# Dsn ([docs](http://yepfoundation.github.io/dsn))

## Packagist
Dsn is available on [Packagist.org](https://packagist.org/packages/yep/dsn),
just add the dependency to your composer.json.

```json
{
  "require" : {
    "yep/dsn": "dev-master"
  }
}
```

## Usage
You can use `MySqlDsn`, `MySqlUnixSocketDsn`, `PostgreSqlDsn`, `Sqlite2Dsn` or `SqliteDsn`.

```php
<?php
$dsn = new Yep\Dsn\MySqlDsn($dbName = 'database', $host = 'localhost', $port = 3306);

echo $dsn->toString(); // mysql:host=localhost;dbname=database;port=3306
```
