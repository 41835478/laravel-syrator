<?php namespace Modules\Cms\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use App\Loggers\SystemLogger;

class CmsTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cms-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
        
	    $log = [
	        'user_id' => 0,
	        'type'    => 'schedule',
	        'content' => 'cms-test',
	    ];
	    SystemLogger::write($log);
    }
}