<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();

        $user1 = \App\Models\User::create([
            'name' => 'Sedrac Lucas Calupeteca',
            'email' => 'slc@hotmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '987654321',
            'gender' => 'MALE',
            'birthday' => '1998-01-31',
            'naturalness' => 'Luanda',
            'nationality' => 'Angolano'
        ]);

        $user2 = \App\Models\User::create([
            'name' => 'Ana Marta',
            'email' => 'ana@hotmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '937684351',
            'gender' => 'FEMALE',
            'birthday' => '1999-05-20',
            'naturalness' => 'Luanda',
            'nationality' => 'Angolana'
        ]);

        $user3 = \App\Models\User::create([
            'name' => 'Paulo Jacinto',
            'email' => 'paulo@hotmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '998232932',
            'gender' => 'MALE',
            'birthday' => '1990-11-24',
            'naturalness' => 'Huambo',
            'nationality' => 'Angolano'
        ]);

        $user4 = \App\Models\User::create([
            'name' => 'Bela Joana',
            'email' => 'bela@hotmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '912684553',
            'gender' => 'FEMALE',
            'birthday' => '2000-04-11',
            'naturalness' => 'Benguela',
            'nationality' => 'Angolana'
        ]);

        $user5 = \App\Models\User::create([
            'name' => 'José Marcos',
            'email' => 'jose@hotmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '937554371',
            'gender' => 'MALE',
            'birthday' => '1999-07-9',
            'naturalness' => 'Zaire',
            'nationality' => 'Angolano'
        ]);

        $occupation1 = \App\Models\Occupation::create([
            'position' => 'Director de operações',
            'description' => 'Controla as realização das operações',
            'created_by' => $user1->id,
            'updated_by' => $user1->id
        ]);

        $occupation2 = \App\Models\Occupation::create([
            'position' => 'Gerente de anabolizante',
            'description' => 'Cuida da distribuição de anabolizante',
            'created_by' => $user2->id,
            'updated_by' => $user1->id
        ]);

        $occupation3 = \App\Models\Occupation::create([
            'position' => 'Director de Limpeza',
            'description' => 'Cuida da limpeza corporal dos pacientes',
            'created_by' => $user2->id,
            'updated_by' => $user1->id
        ]);

        $employee1 = \App\Models\Employee::create([
            'user_id' => $user1->id,
            'occupation_id' => $occupation1->id,
            'created_by' => $user1->id,
            'updated_by' => $user1->id
        ]);

        $employee2 =  \App\Models\Employee::create([
            'user_id' => $user2->id,
            'occupation_id' => $occupation2->id,
            'created_by' => $user1->id,
            'updated_by' => $user1->id
        ]);

        $employee3 = \App\Models\Employee::create([
            'user_id' => $user5->id,
            'occupation_id' => $occupation3->id,
            'created_by' => $user1->id,
            'updated_by' => $user1->id
        ]);

        $patient1 = \App\Models\Patient::create([
            'user_id' => $user3->id,
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        $patient2 = \App\Models\Patient::create([
            'user_id' => $user4->id,
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        $patient3 = \App\Models\Patient::create([
            'user_id' => $user5->id,
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        $consultationType1 = \App\Models\ConsultationType::create([
            'name' => 'Amostra',
            'price' => 5000,
            'description' => 'Retirar o sangue e analisar no laboratório',
            'created_by' => $user2->id,
            'updated_by' => $user1->id
        ]);

        $consultationType2 = \App\Models\ConsultationType::create([
            'name' => 'Operação',
            'price' => 15000,
            'description' => 'Operação de exploração',
            'created_by' => $user2->id,
            'updated_by' => $user1->id
        ]);

        $consultationType3 = \App\Models\ConsultationType::create([
            'name' => 'Cirurgia',
            'price' => 145000,
            'description' => 'Extração de tumor',
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        \App\Models\Consultation::create([
            'patient_id' => $patient1->id,
            'employee_id' => $employee1->id,
            'consultation_type_id' => $consultationType1->id,
            'price' => 4000,
            'marking_at' => Carbon::now(),
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        \App\Models\Consultation::create([
            'patient_id' => $patient1->id,
            'employee_id' => $employee2->id,
            'consultation_type_id' => $consultationType2->id,
            'price' => 4000,
            'marking_at' => Carbon::now(),
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        \App\Models\Consultation::create([
            'patient_id' => $patient2->id,
            'employee_id' => $employee3->id,
            'consultation_type_id' => $consultationType3->id,
            'price' => 160000,
            'marking_at' => Carbon::now(),
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        \App\Models\Consultation::create([
            'patient_id' => $patient3->id,
            'employee_id' => $employee1->id,
            'consultation_type_id' => $consultationType1->id,
            'price' => 20000,
            'marking_at' => Carbon::now(),
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        \App\Models\Consultation::create([
            'patient_id' => $patient2->id,
            'employee_id' => $employee1->id,
            'consultation_type_id' => $consultationType1->id,
            'price' => 20000,
            'marking_at' => Carbon::now(),
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        $specialty1 = \App\Models\Specialty::create([
            'name' => 'Cirurgião',
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        $specialty2 = \App\Models\Specialty::create([
            'name' => 'Genecologsta',
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        $specialty3 = \App\Models\Specialty::create([
            'name' => 'Detista',
            'created_by' => $user1->id,
            'updated_by' => $user2->id
        ]);

        $employee1->specialties()->sync([$specialty1->id,$specialty2->id,$specialty3->id]);
        $employee2->specialties()->sync([$specialty2->id]);
        $employee3->specialties()->sync([$specialty3->id]);

    }




}
