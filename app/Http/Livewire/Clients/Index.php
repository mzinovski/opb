<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Ban;

class Index extends Component
{
	use WithPagination;

    public $per_page = [10, 25, 50];
    public $per_page_selected = 10;
    public $search = '';
    public $order_by = 'created_at';
    public $order_type = 'desc';

    protected $listeners = [
        '$refresh'
    ];

    public function delete_client(User $client)
    {
        $this->emitTo('modal', 'delete_client', $client->id);
    }

    public function ban_client(User $client)
    {
        $this->emitTo('modal', 'ban_client', $client->id);
    }

    public function delete_all_clients()
    {
        $this->emitTo('modal', 'delete_all_clients');
    }

    public function approve_client(User $client)
    {
        $this->emitTo('modal', 'approve_client', $client->id);
    }

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

    public function render()
    {
        $search_phrase = trim($this->search);
        $clients = User::whereDoesntHave('roles')
            ->whereDoesntHave('ban')
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

        return view('livewire.clients.index', [
            'clients' => $clients
        ]);
    }
}
