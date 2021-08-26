<?php


namespace Exzachlyvv\LaravelLearn\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class LearnCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'learn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prints an interesting fact about Laravel or PHP to help you learn.';

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
        $fact = Http::get("https://learnlaravelphp.com/api/learning")->throw()->json('data.text');

        foreach ($fact as $rowToOutput) {
            $this->output->writeln($rowToOutput);
        }

        return 0;
    }
}
