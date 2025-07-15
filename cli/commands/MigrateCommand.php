<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../CLIHelper.php';
require_once __DIR__ . '/../CommandInterface.php';

class MigrateCommand implements CommandInterface
{
    public function execute(array $args)
    {
        global $pdo;
        echo "PDO class: " . get_class($pdo) . PHP_EOL;

        $dir   = __DIR__ . '/../../migrations';
        $files = scandir($dir);

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                CLIHelper::log("Running $file...");
                $queries = require $dir . '/' . $file;
                foreach ($queries as $query) {
                    $pdo->exec($query);
                }
            }
        }

        CLIHelper::log("Migration completed successfully.");
    }
}
