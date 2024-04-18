<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Roles;
use App\Models\Habeas;
use App\Models\Settings;
use App\Models\Procedures;
use App\Models\TipoAntecedente;

class TipoAntecedentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$data_test = TRUE;
        //ADMINISTRADOR

        $tipant = TipoAntecedente::create(
            [
                "name"=>"Antecedentes médicos",
            ]
            );
        $tipant = TipoAntecedente::create(
            [
                "name"=>"Antecedentes quirúrgicos",
            ]
            );
        $tipant = TipoAntecedente::create(
            [
                "name"=>"Antecedentes alérgicos",
            ]
            );
        $tipant = TipoAntecedente::create(
            [
                "name"=>"Antecedentes farmacológicos",
            ]
            );
        $tipant = TipoAntecedente::create(
            [
                "name"=>"Antecedentes familiares",
            ]
            );
        $tipant = TipoAntecedente::create(
            [
                "name"=>"Otros antecedentes",
            ]
            );
//		$role = Roles::create(['name' => 'Super Administrador']);//1
//        //$role->permissions()->createMany($permissions);//roles_permissions
//        $user = User::create(['name' => 'Super','lastname' => 'Admin','email' => 'info@example.com','email_verified_at' => now(),'password' => Hash::make('admin'),'remember_token' => Str::random(10),'role' => $role->id]);
//        $role = Roles::create(['name' => 'Administrador']);//2
//        $role = Roles::create(['name' => 'Medico']);//3
//        $role = Roles::create(['name' => 'Administrativo']);//4
//        $role = Roles::create(['name' => 'Paciente']);//5
//        $conf = Settings::create(['hours_quotes' => 1]);
//        $habeas = Habeas::create(['description' => 'Ejemplo']);
//        $p1 = Procedures::create(['name' => '001','description' => 'Biopsia']);
//        $p2 = Procedures::create(['name' => '002','description' => 'Otro']);
    }
}
