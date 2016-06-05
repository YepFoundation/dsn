<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

declare(strict_types = 1);

use Yep\Dsn\EmptyArgumentException;
use Yep\Dsn\SqliteDsn;

/**
 * Class SqliteDsnTest
 *
 * @author Martin Zeman (Zemistr) <me@zemistr.eu>
 */
class SqliteDsnTest extends \PHPUnit_Framework_TestCase {
  public function testAll() {
    $dsn = new SqliteDsn();
    $this->assertSame('sqlite::memory:', $dsn->toString());
    $this->assertSame('sqlite::memory:', "$dsn");

    $this->assertSame(':memory:', $dsn->getPath());

    $dsn->setPath('foo');
    $this->assertSame('foo', $dsn->getPath());
    $this->assertSame('sqlite:foo', $dsn->toString());
  }

  public function testEmptyPathException() {
    $e = null;

    try {
      new SqliteDsn('');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('path', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new SqliteDsn('foo');
      $dsn->setPath('');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('path', $e->getArgument());
  }
}
