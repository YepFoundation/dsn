<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

namespace Yep\Dsn;

/**
 * Class SQLiteDsn
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 *
 * PDO_SQLITE
 * sqlite::memory:
 * sqlite:/opt/databases/mydb.sq3
 */
class SqliteDsn implements IDsn {
  /** @var string */
  protected $path;

  public function __construct(string $path = ':memory:') {
    $this->setPath($path);
  }

  /**
   * @param string $path
   * @return SqliteDsn
   * @throws EmptyArgumentException
   */
  public function setPath(string $path) : self {
    $this->path = trim($path);

    if ($this->path === '') {
      throw new EmptyArgumentException('path');
    }

    return $this;
  }

  /**
   * @return string
   */
  public function getPath() : string {
    return $this->path;
  }

  /**
   * @return string
   */
  public function toString() : string {
    return 'sqlite:' . $this->getPath();
  }

  /**
   * @return string
   */
  public function __toString() : string {
    return $this->toString();
  }
}
