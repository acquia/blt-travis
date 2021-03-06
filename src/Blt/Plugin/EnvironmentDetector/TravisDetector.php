<?php

namespace Acquia\BltTravis\Blt\Plugin\EnvironmentDetector;

use Acquia\Blt\Robo\Common\EnvironmentDetector;

class TravisDetector extends EnvironmentDetector {
  public static function getCiEnv() {
    return isset($_ENV['TRAVIS']) ? 'travis' : null;
  }

  public static function getCiSettingsFile() {
    return sprintf('%s/vendor/acquia/blt-travis/settings/travis.settings.php', dirname(DRUPAL_ROOT));
  }
}