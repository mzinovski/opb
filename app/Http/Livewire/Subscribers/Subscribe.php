<?php

namespace App\Http\Livewire\Subscribers;

use Livewire\Component;

use App\Models\Subscriber;

class Subscribe extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email|unique:subscribers'
    ];

    public function submit()
    {
        $this->validate();
 
        $subscriber = Subscriber::create([
            'email' => $this->email
        ]);

        session()->flash('message', 'Успешно се зачленивте! Ви благодариме.');
    }

    public function render()
    {
        return view('livewire.subscribers.subscribe');
    }
}
