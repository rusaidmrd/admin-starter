<?php

namespace App\Actions\Fortify;

use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\AdminUser
     */
    public function create(array $input)
    {

        $admin = Role::where('slug','admin')->first();

        // validate the request
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(AdminUser::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $adminUser =  AdminUser::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $adminUser->roles()->attach($admin);

        return $adminUser;
    }
}
