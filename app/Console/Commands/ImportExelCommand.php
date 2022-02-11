<?php

namespace App\Console\Commands;

use App\Imports\PostsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExelCommand extends Command
{

    protected $signature = 'import:excel';

    protected $description = 'Get data from exel';

    public function handle()
    {
        Excel::import(new PostsImport(), public_path('excel/firstx.xlsx'));
        dd('finish');
    }
}
