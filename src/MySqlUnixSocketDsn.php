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
 * mysql:unix_socket=/tmp/mysql.sock;dbname=testdb
 */
class MySqlUnixSocketDsn implements IDsn {
  /** @var string */
  private $unixSocket;

  /** @var string */
  private $dbName;

  public function __construct(string $unixSocket, string $dbName) {
    $this->setUnixSocket($unixSocket);
    $this->setDbName($dbName);
  }

  /**
   * @param string $unixSocket
   * @return MySqlUnixSocketDsn
   * @throws EmptyArgumentException
   */
  public function setUnixSocket(string $unixSocket) : self {
    $this->unixSocket = trim($unixSocket);

    if ($this->unixSocket == '') {
      throw new EmptyArgumentException('unixSocket');
    }

    return $this;
  }

  /**
   * @return string
   */
  public function getUnixSocket() : string {
    return $this->unixSocket;
  }

  /**
   * @param string $dbName
   * @return MySqlUnixSocketDsn
   * @throws EmptyArgumentException
   */
  public function setDbName(string $dbName) : self {
    $this->dbName = trim($dbName);

    if ($this->dbName == '') {
      throw new EmptyArgumentException('dbName');
    }

    return $this;
  }

  /**
   * @return string
   */
  public function getDbName() : string {
    return $this->dbName;
  }

  public function toString() : string {
    return 'mysql:unix_socket=' . $this->getUnixSocket() . ';dbname=' . $this->getDbName();
  }
}
