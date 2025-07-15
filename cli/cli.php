<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$command = isset($argv[1]) ? $argv[1] : null;

if (!$command) {
    echo "No command given. Give a command to migrate\n";
    exit(1);
}

$commandClass = ucfirst($command) . 'Command';
$commandFile  = __DIR__ . '/commands/' . $commandClass . '.php';


require_once __DIR__ . '/CommandInterface.php';

if (!file_exists($commandFile)) {
    echo "Command file not found: $commandFile\n";
    exit(1);
}

require_once $commandFile;

if (!class_exists($commandClass)) {
    echo "Command class $commandClass not found inside $commandFile\n";
    exit(1);
}

$instance = new $commandClass();
$instance->execute(array_slice($argv, 2));
