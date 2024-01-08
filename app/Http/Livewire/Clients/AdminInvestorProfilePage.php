<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;

class AdminInvestorProfilePage extends Component
{
	public $user;

    public function render()
    {
        return view('livewire.clients.admin-investor-profile-page', ['user' => $this->user]);
    }
}
