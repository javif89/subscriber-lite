<?php

use App\Subscriber;
use App\SubscriberField;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a test user
        $user = User::firstOrCreate(['email' => 'user@user.com'],[
            'name' => 'User McUser',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        // Create test subscribers for our user
        $subscribers = factory(Subscriber::class, 5)->make();
        
        $user->subscribers()->createMany($subscribers->toArray());

        // Create fields for our subscribers
        foreach ($user->subscribers as $s) {
            $fields = factory(SubscriberField::class, 2)->make();
            $s->fields()->createMany($fields->toArray());
        }
    }
}
