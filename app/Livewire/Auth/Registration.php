<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Registration extends Component
{
    public $currentStep = 1;

    public $first_name;

    public $middle_name;

    public $last_name;

    public $role;

    public $username;

    public $email;

    public $password;

    public $password_confirmation;

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.auth.registration');
    }

    public function nextStep()
    {

        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        // Increment the step
        if ($this->currentStep < 2) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function completeRegistration()
    {
        $this->validate([
            'role' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20|confirmed'
        ]);

        User::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'role' => $this->role,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();

        $this->dispatch('notify', title: 'success', message: 'Account created successfully.');
    }
}
