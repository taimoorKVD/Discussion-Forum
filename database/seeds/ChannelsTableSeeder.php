<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->truncate();
        $channels = [
            [
                'name' => 'Laravel 7.0',
                'slug' => Str::slug('Laravel 7.0'),
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Laravel Vue JS',
                'slug' => Str::slug('Laravel Vue JS'),
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'CodeIgniter 4.0',
                'slug' => Str::slug('CodeIgniter 4.0'),
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'WordPress 4.0',
                'slug' => Str::slug('WordPress 4.0'),
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Node JS',
                'slug' => Str::slug('Node JS'),
                'created_at' => \Carbon\Carbon::now()
            ]
        ];
        Channel::insert($channels);
    }
}
