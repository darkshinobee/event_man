<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CloseEvent extends Command
{
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'close:event';

  /**
  * The console command description.
  *
  * @var string
  */
  protected $description = 'This will stop the sale of tickets for events on event day';

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
    DB::table('events')->where('status', 0)
    ->where('event_start_date', date('Y-m-d'))
    ->where('approval', 1)
    ->update(['status' => 1]);
}
}
