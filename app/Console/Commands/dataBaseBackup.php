<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class dataBaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DataBase Backup SISREUNI';

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
        //
        try {
            //code...
            if(!is_dir(storage_path('backups'))) mkdir(storage_path('backups'));

            $toDay = Carbon::now()->format('Y-m-d_His');
            $filename = 'sisreunibackup-'.$toDay.'.sql';
            $command ='mysqldump --user=' .env('DB_USERNAME') . ' --host='.env('DB_HOST'). ' '. env('DB_DATABASE').' > ' .storage_path('backups/'). $filename;
    
            $returnVar = NULL;
            $output = 'Backup Exitoso';
    
            exec($command,$output,$returnVar);

        } catch (\Throwable $th) {
            //throw $th;
            Log::error('Backup - Failed', $th->getMessage());
            
        }
       
        
    }
}
