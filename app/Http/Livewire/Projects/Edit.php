<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Edit extends Component
{
	use WithFileUploads;

    public $name;
    public $description;
    public $start_date;
    public $end_date;
    public $procenton;
    public $picture;
    public $investment_opportunity;
    public $old_image;
    public $project;
    public $return_of_investment;


    protected $rules = [
        'name' => 'string|required',
        'description' => 'string|required',
        'start_date' => 'required',
        'end_date' => 'required',
        'procenton' => 'required|numeric',
        'return_of_investment' => 'required|numeric',
        'picture' => 'nullable',
        'investment_opportunity' => 'required|numeric',
    ];

    protected $messages = [
        'name.required' => 'Полето е задолжително',
        'name.string' => 'Грешен внес',
        'description.required' => 'Полето е задолжително',
        'start_date.required' => 'Полето е задолжително',
        'end_date.required' => 'Полето е задолжително',
        'procenton.required' => 'Полето е задолжително',
        'procenton.numeric' => 'Мора да е бројка',
        'return_of_investment.numeric' => 'Мора да е бројка',
        'return_of_investment.required' => 'Полето е задолжително',
        'investment_opportunity.numeric' => 'Мора да е бројка',
        'investment_opportunity.required' => 'Полето е задолжително',
    ];

    public function mount(Project $project)
    {
        $this->name = $project->name;
        $this->description = $project->description;
        $this->start_date = Carbon::parse($project->start_date)->format('d/m/Y');
        $this->end_date = Carbon::parse($project->end_date)->format('d/m/Y');
        $this->procenton = $project->procenton;
        $this->old_image = $project->picture;
        $this->investment_opportunity = $project->investment_opportunity;
        $this->return_of_investment = $project->return_of_investment;
    }

    public function submit()
    {
        $this->validate();

        $project = $this->project;
        $project->name = $this->name;
        $project->slug = mb_strtolower(preg_replace('/\s+/', '-', $this->name), 'UTF-8');
        $project->description = $this->description;
        $project->start_date = Carbon::createFromFormat('d/m/Y', $this->start_date)->format('d/m/Y');
        $project->end_date = Carbon::createFromFormat('d/m/Y', $this->end_date)->format('d/m/Y');
        $project->procenton = $this->procenton;
        
        $project->investment_opportunity = $this->investment_opportunity;
        $project->return_of_investment = $this->return_of_investment;

        if ($this->picture != null) {
            // $project->picture = $this->picture;
            $image_extension = $this->picture->getClientOriginalExtension();
            $image_url = $this->picture->storeAs('images', $this->name . '-image.' . $image_extension);
            $image_url = url($image_url);
            $project->picture = $image_url;
        }

        $project->save();

        session()->flash('flash.banner', 'Проектот е изменет');
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('projects');
    }

    public function render()
    {
        return view('livewire.projects.edit');
    }
}
