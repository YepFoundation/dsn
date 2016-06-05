<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

declare(strict_types = 1);
use Yep\Dsn\EmptyArgumentException;
use Yep\Dsn\MySqlUnixSocketDsn;

/**
 * Class MySqlUnixSocketDsnTest
 *
 * @author Martin Zeman (Zemistr) <me@zemistr.eu>
 */
class MySqlUnixSocketDsnTest extends \PHPUnit_Framework_TestCase {
  public function testAll() {
    $dsn = new MySqlUnixSocketDsn('socket', 'database');
    $this->assertSame('mysql:unix_socket=socket;dbname=database', $dsn->toString());
    $this->assertSame('mysql:unix_socket=socket;dbname=database', "$dsn");

    $this->assertSame('socket', $dsn->getUnixSocket());
    $this->assertSame('database', $dsn->getDbName());

    $dsn->setUnixSocket('foo');
    $this->assertSame('foo', $dsn->getUnixSocket());

    $dsn->setDbName('bar');
    $this->assertSame('bar', $dsn->getDbName());

    $this->assertSame('mysql:unix_socket=foo;dbname=bar', $dsn->toString());
  }

  public function testEmptyUnixSocketException() {
    $e = null;

    try {
      new MySqlUnixSocketDsn('', 'bar');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('unixSocket', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new MySqlUnixSocketDsn('foo', 'bar');
      $dsn->setUnixSocket('');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('unixSocket', $e->getArgument());
  }

  public function testEmptyDbNameException() {
    $e = null;

    try {
      new MySqlUnixSocketDsn('foo', '');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('dbName', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new MySqlUnixSocketDsn('foo', 'bar');
      $dsn->setDbName('');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('dbName', $e->getArgument());
  }
}
