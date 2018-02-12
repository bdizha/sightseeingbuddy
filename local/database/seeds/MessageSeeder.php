<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
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
                'sender_id' => 1,
                'recipient_id' => 2,
                'content' => "Hi, where can I meet you?",
                'is_read' => true
            ],
            [
                'recipient_id' => 1,
                'sender_id' => 2,
                'content' => "Alright! I will be right there.",
                'is_read' => true
            ],
            [
                'sender_id' => 1,
                'recipient_id' => 2,
                'content' => "Ok! How many minutes do you think you will need to get here?",
                'is_read' => true
            ],
            [
                'recipient_id' => 1,
                'sender_id' => 2,
                'content' => "Please only give us 15 minutes. And there's too much traffic that's why we've been delayed. And would you please let me know how many are you for this experience?",
                'is_read' => false
            ],
            [
                'sender_id' => 1,
                'recipient_id' => 2,
                'content' => "There's only 3 of us as we indicated on the booking form. We're all from Germany and would love to see as many places as possible. Do you think you will also be able to take us to the famous Cape Point?",
                'is_read' => false
            ]
        ];

        foreach ($messages as $message) {
            Message::create(
                $message
            );
        }
    }
}
