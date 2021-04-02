<?php

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('user:create', function () {
    $name = $this->ask('Name?');
    $email = $this->ask('Email?');
    $pwd = $this->secret('Password?');

    User::query()
        ->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pwd),
        ]);

    $this->info('Account created for ' . $name);
});

Artisan::command('user:delete {id}', function (int $id) {
    $user = User::find($id);

    if ($user === null) {
        $this->error('There is no User with ID ' . $id);
        return;
    }

    if ($this->confirm('Are you sure you want to delete User ' . $user->name . '?')) {
        $deleter = new DeleteUser();
        $deleter->delete($user);

        $this->info('Account deleted for ID ' . $id);
    }

});
