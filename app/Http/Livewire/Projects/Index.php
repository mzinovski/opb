<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

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

    public function delete_project(Project $project)
    {
        $this->emitTo('modal', 'delete_project', $project->id);
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
        $projects = Project::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('start_date', 'like', '%' . $this->search . '%')
            ->orWhere('end_date', 'like', '%' . $this->search . '%')
            ->orWhere('procenton', 'like', '%' . $this->search . '%')
            ->orWhere('investment_opportunity', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('return_of_investment', 'like', '%' . $this->search . '%')
            ->orderBy($this->order_by, $this->order_type)
            ->paginate($this->per_page_selected);

        return view('livewire.projects.index', [
            'projects' => $projects
        ]);
    }
}
