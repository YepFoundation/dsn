<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

namespace Yep\Dsn;

/**
 * Class SQLite2Dsn
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 *
 * PDO_SQLITE
 * sqlite2::memory:
 * sqlite2:/opt/databases/mydb.sq2
 */
class Sqlite2Dsn extends SqliteDsn {
  public function toString() : string {
    return 'sqlite2:' . $this->getPath();
  }
}
