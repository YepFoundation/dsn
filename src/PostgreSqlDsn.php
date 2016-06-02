<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

namespace Yep\Dsn;

/**
 * Class PostgreSqlDsn
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 *
 * PDO_PGSQL
 * pgsql:host=localhost;port=5432;dbname=testdb;user=bruce;password=mypass
 */
class PostgreSqlDsn extends BaseDns {
  /** @var string */
  protected $user;

  /** @var string */
  protected $password;

  public function __construct(string $dbName, string $host = 'localhost', int $port = 5432, string $user = null, string $password = null) {
    $this->setDbName($dbName);
    $this->setHost($host);
    $this->setPort($port);
    $this->setUser($user);
    $this->setPassword($password);
  }

  public function toString() : string {
    $dsn = 'pgsql:host=' . $this->getHost() . ';dbname=' . $this->getDbName() . ';port=' . $this->getPort();

    if ($this->hasUser()) {
      $dsn .= ';user=' . $this->getUser();
    }

    if ($this->hasPassword()) {
      $dsn .= ';password=' . $this->getPassword();
    }

    return $dsn;
  }

  /**
   * @param string|null $user
   * @return PostgreSqlDsn
   */
  public function setUser(string $user = null) : self {
    $this->user = $user;

    if ($user !== null) {
      $this->user = trim($user);
    }

    return $this;
  }

  /**
   * @return bool
   */
  public function hasUser() : bool {
    return $this->user !== null;
  }

  /**
   * @return string
   */
  public function getUser() : string {
    return (string)$this->user;
  }

  /**
   * @param string|null $password
   * @return PostgreSqlDsn
   */
  public function setPassword(string $password = null) : self {
    $this->password = $password;

    if ($this->password !== null) {
      $this->password = trim($password);
    }

    return $this;
  }

  /**
   * @return bool
   */
  public function hasPassword() : bool {
    return $this->password !== null;
  }

  /**
   * @return string
   */
  public function getPassword() : string {
    return (string)$this->password;
  }
}
