<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

declare(strict_types = 1);

use Yep\Dsn\EmptyArgumentException;
use Yep\Dsn\MySqlDsn;
use Yep\Dsn\WrongArgumentException;

/**
 * Class MySqlDsnTest
 *
 * @author Martin Zeman (Zemistr) <me@zemistr.eu>
 */
class MySqlDsnTest extends \PHPUnit_Framework_TestCase {
  public function testAll() {
    $dsn = new MySqlDsn('foo', 'server.local', 3307);
    $this->assertSame('mysql:host=server.local;dbname=foo;port=3307', $dsn->toString());

    $this->assertSame('foo', $dsn->getDbName());
    $this->assertSame('server.local', $dsn->getHost());
    $this->assertSame(3307, $dsn->getPort());

    $dsn->setDbName('bar');
    $this->assertSame('bar', $dsn->getDbName());

    $dsn->setHost('localhost');
    $this->assertSame('localhost', $dsn->getHost());

    $dsn->setPort(3306);
    $this->assertSame(3306, $dsn->getPort());

    $this->assertSame('mysql:host=localhost;dbname=bar;port=3306', $dsn->toString());
  }

  public function testEmptyDbNameException() {
    $e = null;

    try {
      new MySqlDsn('', 'bar', 3307);
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('dbName', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new MySqlDsn('foo', 'bar', 3307);
      $dsn->setDbName('');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('dbName', $e->getArgument());
  }

  public function testEmptyHostException() {
    $e = null;

    try {
      new MySqlDsn('foo', '', 3307);
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('host', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new MySqlDsn('foo', 'bar', 3307);
      $dsn->setHost('');
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('host', $e->getArgument());
  }

  public function testWrongPortException() {
    $e = null;

    try {
      new MySqlDsn('foo', 'bar', 0);
    }
    catch (WrongArgumentException $e) {
    }

    $this->assertInstanceOf(WrongArgumentException::class, $e);
    $this->assertSame('port', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new MySqlDsn('foo', 'bar', 3307);
      $dsn->setPort(0);
    }
    catch (WrongArgumentException $e) {
    }

    $this->assertInstanceOf(WrongArgumentException::class, $e);
    $this->assertSame('port', $e->getArgument());
  }
}
