<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreatePostsManagerTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CreatePostsManagerTables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating tables for posts manager';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sqlPath = resource_path('sql/posts_manager_migrations.sql');
        $sqlFull = file_get_contents($sqlPath);
        $sql = explode(';', $sqlFull);

        foreach ($sql as $s) {
             DB::statement($s);
        }

        echo "Tables have been created!";

        return true;
    }
}
