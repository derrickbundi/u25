<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class messageseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'code' => 'INVITE',
                'body' => 'You are invited%break%Email:- %email%%break%Password:- %password%%break%Login via %link%%break%Regards, CrownStars Magazine.'
            ],
            [
                'code' => 'NOTIFICATION',
                'body' => 'Greetings,%break%The event you are registered in %company% is scheduled to start on %date% at %time%.%break%Follow the link for more info %link%%break%Regards, CrownStars Magazine.'
            ]
        ];
        foreach ($messages as $message) {
            Message::create($message);
        }
    }
}
