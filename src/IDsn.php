<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

namespace Yep\Dsn;

/**
 * Interface IDsn
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 */
interface IDsn {
  public function toString() : string;

  public function __toString() : string;
}

/*
 * TODO: next?
 *
 * PDO_CUBRID
 * cubrid:host=localhost;port=33000;dbname=demodb
 *
 * PDO_DBLIB
 * mssql:host=localhost;dbname=testdb
 * sybase:host=localhost;dbname=testdb
 * dblib:host=localhost;dbname=testdb
 *
 * PDO_FIREBIRD
 * firebird:dbname=/path/to/DATABASE.FDB
 * firebird:dbname=hostname/port:/path/to/DATABASE.FDB
 * firebird:dbname=localhost:/var/lib/firebird/2.5/data/employee.fdb
 */
