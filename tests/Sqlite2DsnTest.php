<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

declare(strict_types = 1);

use Yep\Dsn\EmptyArgumentException;
use Yep\Dsn\Sqlite2Dsn;

/**
 * Class Sqlite2DsnTest
 *
 * @author Martin Zeman (Zemistr) <me@zemistr.eu>
 */
class Sqlite2DsnTest extends \PHPUnit_Framework_TestCase {
  public function testAll() {
    $dsn = new Sqlite2Dsn();
    $this->assertSame('sqlite2::memory:', $dsn->toString());
    $this->assertSame('sqlite2::memory:', "$dsn");

    $this->assertSame(':memory:', $dsn->getPath());

    $dsn->setPath('foo');
    $this->assertSame('foo', $dsn->getPath());
    $this->assertSame('sqlite2:foo', $dsn->toString());
  }

  public function testEmptyPathException() {
    $e = null;

    try {
      new Sqlite2Dsn('');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('path', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new Sqlite2Dsn('foo');
      $dsn->setPath('');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('path', $e->getArgument());
  }
}
