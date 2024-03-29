<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * This class has the actions for create a database for the project.
 */

class DBcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = '';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MySQL DB based on the DB config file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->signature = "db:create {".env('DB_DATABASE', false)."?}";
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $schemaName = $this->argument(env('DB_DATABASE')) ? : config(
            "database.connections.mysql.database"
        );
        $charset = config("database.connections.mysql.charset", 'utf8mb4');
        $collation = config( 
            "database.connections.mysql.collation", 
            'utf8mb4_unicode_ci' 
        );
        config([ "database.connections.mysql.database" => null ]);
        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER 
                    SET $charset COLLATE $collation;";
        DB::statement($query);
        config(["database.connections.mysql.database" => $schemaName]);
    }
}
