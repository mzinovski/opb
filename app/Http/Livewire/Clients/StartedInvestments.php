<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\InvestitorUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project;
use Livewire\WithPagination;

class StartedInvestments extends Component
{
	use WithPagination;

	public $per_page = [10, 25, 50];
    public $per_page_selected = 10;
    public $search = '';
    public $order_by = 'created_at';
    public $order_type = 'desc';

    public $is_signed;

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

    public function approve_payment(InvestitorUser $investor_user)
    {
        $this->emitTo('modal', 'approve_payment', $investor_user->id);
    }

    public function render()
    {
    	$projects = Project::orderBy('name', 'asc')->get();
        $search_phrase = trim($this->search);

        $query = InvestitorUser::query();

        if($this->is_signed == null) {
            $query->where('has_payed', 0)->where('has_signed', 0)->with(['project', 'user']);
        }

        if($this->is_signed == 1) {
            $query->where('has_payed', 0)->where('has_signed', 1)->with(['project', 'user']);
        }

        $query->where(function($q) use ($search_phrase){

            $q->where('rangeValue', 'like', '%' . $search_phrase . '%')
            ->orWhere('investDate', 'like', '%' . $search_phrase . '%')
            ->orWhere('profit', 'like', '%' . $search_phrase . '%')
            ->orWhere('invest_step', 'like', '%' . $search_phrase . '%')
            ->orWhere(Project::select('name')->whereColumn('projects.id', 'investitor_users.project_id'), 'like', '%' . $search_phrase . '%')
            ->orWhere(User::select('email')->whereColumn('users.id', 'investitor_users.user_id'), 'like', '%' . $search_phrase . '%');
        });

        if ($this->order_by == 'name') {
            $query->orderBy(Project::select('name')->whereColumn('projects.id', 'investitor_users.project_id'), $this->order_type);
        } elseif ($this->order_by == 'email') {
            $query->orderBy(User::select('email')->whereColumn('users.id', 'investitor_users.user_id'), $this->order_type);
        } else {
            $query->orderBy($this->order_by, $this->order_type);
        }

        $investor_users = $query->paginate($this->per_page_selected);

        return view('livewire.clients.started-investments', ['projects' => $projects, 'investor_users' => $investor_users]);
    }
}
