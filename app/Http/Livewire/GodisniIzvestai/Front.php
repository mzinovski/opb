<?php

namespace App\Http\Livewire\GodisniIzvestai;

use Livewire\Component;
use App\Models\GodisniIzvestaj;
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

    public function downloadIzvestaj($file)
    {
    	return response()->download(storage_path('app/uploads/izvestai/'.$file));
    }

    public function render()
    {
    	$godisni_izvestai = GodisniIzvestaj::orderBy($this->order_by, $this->order_type)
            ->paginate($this->per_page_selected);
        return view('livewire.godisni-izvestai.front', ['godisni_izvestai' => $godisni_izvestai]);
    }
}
