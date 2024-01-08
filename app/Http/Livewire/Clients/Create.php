<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
	use WithFileUploads;

    public $name;
    public $surname;
    public $email;
    public $dob;
    public $id_card_number;
    public $embg;
    public $address;
    public $id_card_picture_front;
    public $id_card_picture_back;
    public $bank_account;
    public $slug;
    public $password;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'id_card_number' => ['required', 'string', 'max:255'],
            'embg' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'bank_account' => ['required', 'string', 'max:255'],
            'id_card_picture_front' => ['required', 'image', 'max:5000'],
            'id_card_picture_back' => ['required', 'image', 'max:5000'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $client = User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'id_card_number' => $this->id_card_number,
            'embg' => $this->embg,
            'address' => $this->address,
            'bank_account' => $this->bank_account,
            'id_card_picture_front' => $this->id_card_picture_front,
            'id_card_picture_back' => $this->id_card_picture_back,
        ]);

        session()->flash('flash.banner', 'Client successfully created');
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('clients');

    }

    public function render()
    {
        return view('livewire.clients.create');
    }
}
