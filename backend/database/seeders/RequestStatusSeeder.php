<?php

namespace Database\Seeders;

use App\Models\RequestStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Новая', 'В работе', 'Завершена', 'Отменена'];
        foreach ($statuses as $status){
            RequestStatus::query()->insert([
                'name' => $status,
            ]);
        }
    }
}
