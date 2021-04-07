<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     * @throws ValidationException
     */
    public function create(array $input): User {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['string', 'max:255', 'unique:users'],
            'city' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'musical_instrument_id' => ['required', 'integer'],
            'teacher' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'nickname' => $input['nickname'],
            'city' => $input['city'],
            'birthday' => $input['birthday'],
            'teacher' => $input['teacher'],
            'musical_instrument_id' => $input['musical_instrument_id'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
