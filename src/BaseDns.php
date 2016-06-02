<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

namespace Yep\Dsn;

/**
 * Class BaseDns
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 */
abstract class BaseDns {
  /** @var string */
  protected $dbName;

  /** @var string */
  protected $host;

  /** @var int */
  protected $port;

  /**
   * @param string $dbName
   * @return BaseDns|static
   * @throws EmptyArgumentException
   */
  public function setDbName(string $dbName) : self {
    $this->dbName = trim($dbName);

    if ($this->dbName === '') {
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

  /**
   * @param string $host
   * @return BaseDns|static
   * @throws EmptyArgumentException
   */
  public function setHost(string $host) : self {
    $this->host = trim($host);

    if ($this->host === '') {
      throw new EmptyArgumentException('host');
    }

    return $this;
  }

  /**
   * @return string
   */
  public function getHost() : string {
    return $this->host;
  }

  /**
   * @param int $port
   * @return BaseDns|static
   * @throws WrongArgumentException
   */
  public function setPort(int $port) : self {
    $this->port = $port;

    if ($this->port <= 0) {
      throw new WrongArgumentException('port', 'Port must be greater than 0!');
    }

    return $this;
  }

  /**
   * @return int
   */
  public function getPort() : int {
    return $this->port;
  }
}
