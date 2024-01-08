<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Ban;

class Baned extends Component
{
	use WithPagination;

    public $per_page = [10, 25, 50];
    public $per_page_selected = 10;
    public $search = '';
    public $order_by = 'id';
    public $order_type = 'asc';

    protected $listeners = [
        '$refresh'
    ];

    public function order_by($order_by)
    {
        if ($order_by == $this->order_by) {
            if ($this->order_type == 'asc') {
                $this->order_type = 'desc';
            } else {
                $this->order_type = 'asc';
            }
        } else {
            $this->order_by = $order_by;
            $this->order_type = 'asc';
        }
    }

    public function delete_all_baned_clients()
    {
        $this->emitTo('modal', 'delete_all_baned_clients');
    }

    public function unban_client(User $client)
    {
        $this->emitTo('modal', 'unban_client', $client->id);
    }

    public function render()
    {
    	$search_phrase = $this->search;
        $clients = User::whereDoesntHave('roles')
            ->whereHas('ban')
            ->orderBy('created_at', 'desc')
            ->where(function($query) use ($search_phrase){
                $query->where('name', 'like', '%' . $search_phrase . '%')
                    ->orWhere('surname', 'like', '%' . $search_phrase . '%')
                    ->orWhere('email', 'like', '%' . $search_phrase . '%')
                    ->orWhere('dob', 'like', '%' . $search_phrase . '%')
                    ->orWhere('id_card_number', 'like', '%' . $search_phrase . '%')
                    ->orWhere('embg', 'like', '%' . $search_phrase . '%')
                    ->orWhere('address', 'like', '%' . $search_phrase . '%')
                    ->orWhere('bank_account', 'like', '%' . $search_phrase . '%')
                    ->orWhere('slug', 'like', '%' . $search_phrase . '%');
           })
            ->orderBy($this->order_by, $this->order_type)
            ->paginate($this->per_page_selected);

        return view('livewire.clients.baned', [
            'clients' => $clients
        ]);
    }
}
