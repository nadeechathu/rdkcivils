<?php

namespace Database\Seeders;

use App\Models\ProjectStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('project_statuses')->truncate();

        $projectStatuses = array('Pending','Ongoing','Completed','On Hold');
        
        foreach($projectStatuses as $projectStatus){

            ProjectStatus::create(['status_name' => $projectStatus]);

        }
    }
}
