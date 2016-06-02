<?php
/**
 * This file is part of the Yep package.
 * Copyright (c) 2016 Martin Zeman (Zemistr) (http://www.zemistr.eu)
 */

namespace Yep\Dsn;

/**
 * Class Exception
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 */
class Exception extends \Exception {
}

/**
 * Class EmptyArgumentException
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 */
class EmptyArgumentException extends Exception {
  /** @var string */
  protected $argument;

  public function __construct(string $argument) {
    $this->argument = $argument;

    parent::__construct(sprintf('Argument "%s" can\'t be empty!', $argument));
  }

  /**
   * @return string
   */
  public function getArgument() : string {
    return $this->argument;
  }
}

/**
 * Class WrongArgumentException
 *
 * @package Yep\Dsn
 * @author  Martin Zeman (Zemistr) <me@zemistr.eu>
 */
class WrongArgumentException extends Exception {
  /** @var string */
  protected $argument;

  public function __construct(string $argument, string $expected) {
    $this->argument = $argument;

    parent::__construct(sprintf('Argument "%s" has wrong value! %s', $argument, $expected));
  }

  /**
   * @return string
   */
  public function getArgument() : string {
    return $this->argument;
  }
}
