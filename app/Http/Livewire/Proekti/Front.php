<?php

namespace App\Http\Livewire\Proekti;

use Livewire\Component;
use App\Models\Proekt;
use Livewire\WithPagination;

class Front extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $per_page = [3, 6, 9];
    public $per_page_selected = 6;
    public $search = '';
    public $order_by = 'created_at';
    public $order_type = 'desc';

    public $proektiFilter = 'realizirani';

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

    public function render()
    {
    	$proekti = Proekt::orderBy($this->order_by, $this->order_type)
    		->where('type', $this->proektiFilter)
            ->paginate($this->per_page_selected);

        return view('livewire.proekti.front', ['proekti' => $proekti]);
    }
}
