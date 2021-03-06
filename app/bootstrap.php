<?php
  //error_reporting(1);

  /**
   * Entering PHP Command Line
   */

  if('cli' == php_sapi_name()){    
    chdir("../app/templates");
    $cmd = 'php handler.php ' . $argv[1] . ' ' . $argv[2];
    $command = escapeshellcmd($cmd);
    $output = shell_exec($command);
    print $output . "\n";
    exit();
  }

  //Load Config
  require_once 'config/config.php';

  require_once 'helpers'. DIRECTORY_SEPARATOR .'_autoload.php';
  
  //Load Libraries
  spl_autoload_register(function($className){
    require_once 'base/' . $className . '.php';
  });
  
  require_once('../vendor/autoload.php');

  //Instantiate the App
  App::instantiate();
  // App::debug(get_included_files(), true);

