<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\StorageLinkCommand;

class CustomStorageLinkCommand extends StorageLinkCommand
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from "public/a" to "storage/app/public"';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (file_exists(public_path('image'))) {
            return $this->error('The "public/image" directory already exists.');
        }
        $this->laravel->make('files')->link(
            storage_path('app/public'), public_path('image')
        );
        $this->info('The [public/image] directory has been linked.');
    }
}