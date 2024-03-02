<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Roles;
use App\Models\Habeas;
use App\Models\Settings;
use App\Models\Procedures;

class TestPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company=Companies::query()->find(3);
        $company->plan_id=4;
        $company->save();
    }
}
