<?php

namespace Acquia\BltTravis\Blt\Plugin\Commands;

use Acquia\Blt\Robo\BltTasks;
use Acquia\Blt\Robo\Exceptions\BltException;
use Robo\Contract\VerbosityThresholdInterface;

/**
 * Defines commands related to Travis CI.
 */
class TravisCommands extends BltTasks {

  /**
   * Initializes default Travis CI configuration for this project.
   *
   * @command recipes:ci:travis:init
   *
   * @aliases rcti ci:travis:init
   */
  public function travisInit() {
    $result = $this->taskFilesystemStack()
      ->copy($this->getConfigValue('repo.root') . '/vendor/acquia/blt-travis/scripts/.travis.yml', $this->getConfigValue('repo.root') . '/.travis.yml', TRUE)
      ->stopOnFail()
      ->setVerbosityThreshold(VerbosityThresholdInterface::VERBOSITY_VERBOSE)
      ->run();

    if (!$result->wasSuccessful()) {
      throw new BltException("Could not initialize Travis CI configuration.");
    }

    $this->say("<info>A pre-configured .travis.yml file was copied to your repository root.</info>");
  }

}
