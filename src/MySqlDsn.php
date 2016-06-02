<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

namespace Yep\Dsn;

/**
 * Class MySQLDsn
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 *
 * PDO_MYSQL
 * mysql:host=localhost;dbname=testdb
 * mysql:host=localhost;port=3307;dbname=testdb
 */
class MySqlDsn extends BaseDns {
  public function __construct(string $dbName, string $host = 'localhost', int $port = 3306) {
    $this->setDbName($dbName);
    $this->setHost($host);
    $this->setPort($port);
  }

  /**
   * @return string
   */
  public function toString() : string {
    return 'mysql:host=' . $this->getHost() . ';dbname=' . $this->getDbName() . ';port=' . $this->getPort();
  }
}
