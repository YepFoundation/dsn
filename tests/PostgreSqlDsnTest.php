<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

declare(strict_types = 1);

use Yep\Dsn\EmptyArgumentException;
use Yep\Dsn\PostgreSqlDsn;
use Yep\Dsn\WrongArgumentException;

/**
 * Class PostgreSqlDsnTest
 *
 * @author Martin Zeman (Zemistr) <me@zemistr.eu>
 */
class PostgreSqlDsnTest extends \PHPUnit_Framework_TestCase {
  public function testAll() {
    $dsn = new PostgreSqlDsn('foo', 'server.local', 5432);
    $this->assertSame('pgsql:host=server.local;dbname=foo;port=5432', $dsn->toString());

    $this->assertSame('foo', $dsn->getDbName());
    $this->assertSame('server.local', $dsn->getHost());
    $this->assertSame(5432, $dsn->getPort());
    $this->assertFalse($dsn->hasUser());
    $this->assertFalse($dsn->hasPassword());

    $dsn->setDbName('bar');
    $this->assertSame('bar', $dsn->getDbName());

    $dsn->setHost('localhost');
    $this->assertSame('localhost', $dsn->getHost());

    $dsn->setPort(5433);
    $this->assertSame(5433, $dsn->getPort());

    $dsn->setUser('user');
    $this->assertTrue($dsn->hasUser());
    $this->assertSame('user', $dsn->getUser());

    $dsn->setPassword('pass');
    $this->assertTrue($dsn->hasPassword());
    $this->assertSame('pass', $dsn->getPassword());

    $this->assertSame('pgsql:host=localhost;dbname=bar;port=5433;user=user;password=pass', $dsn->toString());

    $dsn->setUser('');
    $this->assertTrue($dsn->hasUser());
    $this->assertSame('', $dsn->getUser());

    $dsn->setUser(null);
    $this->assertFalse($dsn->hasUser());
    $this->assertSame('', $dsn->getUser());

    $dsn->setPassword('');
    $this->assertTrue($dsn->hasPassword());
    $this->assertSame('', $dsn->getPassword());

    $dsn->setPassword(null);
    $this->assertFalse($dsn->hasPassword());
    $this->assertSame('', $dsn->getPassword());
  }

  public function testEmptyDbNameException() {
    $e = null;

    try {
      new PostgreSqlDsn('', 'bar', 5432);
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('dbName', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new PostgreSqlDsn('foo', 'bar', 5432);
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
      new PostgreSqlDsn('foo', '', 5432);
    }
    catch (EmptyArgumentException $e) {
    }

    $this->assertInstanceOf(EmptyArgumentException::class, $e);
    $this->assertSame('host', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new PostgreSqlDsn('foo', 'bar', 5432);
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
      new PostgreSqlDsn('foo', 'bar', 0);
    }
    catch (WrongArgumentException $e) {
    }

    $this->assertInstanceOf(WrongArgumentException::class, $e);
    $this->assertSame('port', $e->getArgument());

    //////////////

    $e = null;

    try {
      $dsn = new PostgreSqlDsn('foo', 'bar', 5432);
      $dsn->setPort(0);
    }
    catch (WrongArgumentException $e) {
    }

    $this->assertInstanceOf(WrongArgumentException::class, $e);
    $this->assertSame('port', $e->getArgument());
  }
}
