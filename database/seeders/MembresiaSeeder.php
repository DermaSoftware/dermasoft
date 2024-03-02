<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Roles;
use App\Models\Habeas;
use App\Models\Settings;
use App\Models\Procedures;

class MembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query=DB::statement("INSERT INTO `plans` (`id`, `uuid`, `name`, `subtitle`, `price`, `month`, `photo`, `description`, `days`, `allowed_patients`, `storage_capacity`, `users_admin`, `voice_transcription`, `allowed_logo`, `venues`, `users_medical`, `allowed_medical_prescription`, `allow_generate_consent`, `allow_whatsapp`, `allow_mini_text`, `allow_whatsapp_reminder`, `mini_text`, `allow_special_messages`, `allow_special_whatsapp`, `allow_patient_quotes`, `allowed_medical_whatsapp`, `allowed_scheduling_web`, `allowed_email_quotes`, `allowed_emailing`, `allowed_inventories_billing`, `allowed_payments`, `allow_hours`, `price_storage_capacity`, `price_users_admin`, `price_hours`, `price_venues`, `price_medical`, `price_mini_text`, `amount_mini_text`, `state`, `status`, `created_at`, `updated_at`) VALUES (4, '25b55ca0-d835-11ee-9298-6f6d7d95dab7', 'Membresia de Prueba', 'Membresia de prueba valida por 30 dias', 0.00, 1, NULL, 'Membresia de prueba valida por un mes', 30, 1000, 25, 100, 'no', 'si', 10, 10, 'si', 'si', 'si', 'si', 'si', 1000, 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 10000, 5000.00, 1000.00, 2000.00, 5000.00, 2000.00, 1.00, 1, 'active', 'active', '2024-03-02 01:35:27', '2024-03-02 01:35:27')");
        if($query){
            $this->command->getOutput()->success("Membresia de prueba creada correctamente");
        }
        else{
            $this->command->getOutput()->error("Ocurrio un error");
        }
    }
}
