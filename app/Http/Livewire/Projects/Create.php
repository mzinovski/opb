<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
	use WithFileUploads;

    public $name;
    public $description;
    public $start_date;
    public $end_date;
    public $procenton;
    public $picture;
    public $investment_opportunity;
    public $return_of_investment;


    protected $rules = [
        'name' => 'string|required',
        'description' => 'string|required',
        'start_date' => 'required',
        'end_date' => 'required',
        'procenton' => 'required|numeric',
        'return_of_investment' => 'required|numeric',
        'picture' => 'required',
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
        'picture.required' => 'Полето е задолжително',
        'investment_opportunity.numeric' => 'Мора да е бројка',
        'investment_opportunity.required' => 'Полето е задолжително',
    ];

    public function submit()
    {
        $this->validate();

        if ($this->picture != null) {
            $image_extension = $this->picture->getClientOriginalExtension();
            $image_url = $this->picture->storeAs('images', $this->name . '-image.' . $image_extension);
            $image_url = url($image_url);
        } else {
            $image_url = null;
        }

        $project = Project::create([
            'name' => $this->name,
            'slug' => mb_strtolower(preg_replace('/\s+/', '-', $this->name), 'UTF-8'),
            'description' => $this->description,
            'start_date' => Carbon::createFromFormat('d/m/Y', $this->start_date)->format('d/m/Y'),
            'end_date' => Carbon::createFromFormat('d/m/Y', $this->end_date)->format('d/m/Y'),
            'procenton' => $this->procenton,
            'return_of_investment' => $this->return_of_investment,
            'picture' => $image_url,
            'investment_opportunity' => $this->investment_opportunity,
            
        ]);

        session()->flash('flash.banner', 'Проектот е внесен');
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('projects');

    }


    public function render()
    {
        return view('livewire.projects.create');
    }
}
