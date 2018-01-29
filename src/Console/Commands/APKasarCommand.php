<?php namespace Bantenprov\APMurni\Console\Commands;

use Illuminate\Console\Command;

/**
 * The APMurniCommand class.
 *
 * @package Bantenprov\APMurni
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class APMurniCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:ap-murni';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\APMurni package';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\APMurni package');
    }
}
