<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Subscriber;
use App\Models\Project;
use App\Models\Client;
use App\Models\Ban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClientApprovedNotification;
use App\Notifications\InvestorPaymentApprovedNotification;
use App\Models\InvestitorUser;

class Modal extends Component
{
    public $model_to_delete = "";
    public $modal_property = "hidden";
    public $model_id = null;

    protected $listeners = [
        'delete_user' => 'delete_user',
        'delete_blog' => 'delete_blog',
        'delete_faq' => 'delete_faq',
        'delete_subscriber' => 'delete_subscriber',
        'delete_project' => 'delete_project',
        'delete_client' => 'delete_client',
        'delete_all_clients' => 'delete_all_clients',
        'approve_client' => 'approve_client',
        'ban_client' => 'ban_client',
        'delete_all_baned_clients' => 'delete_all_baned_clients',
        'unban_client' => 'unban_client',
        'delete_started_investment' => 'delete_started_investment',
        'approve_payment' => 'approve_payment'
    ];

    public function hide()
    {
        $this->modal_property = "hidden";
    }

    public function delete_user($user_id)
    {
        $this->model_to_delete = "user";
        $this->modal_property = "block";
        $this->model_id = $user_id;
    }

    public function confirm_user_deletion($user_id)
    {
        $user = User::find($user_id);
        $user->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('users.index', '$refresh');
    }

    public function delete_started_investment($investor_user_id)
    {
        $this->model_to_delete = "delete_started_investment";
        $this->modal_property = "block";
        $this->model_id = $investor_user_id;
    }

    public function confirm_delete_started_investment($investor_user_id)
    {
        $iu = InvestitorUser::find($investor_user_id);
        $iu->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('project-calculator.started-investment', '$refresh');
    }

    public function delete_blog($blog_id)
    {
        $this->model_to_delete = "blog";
        $this->modal_property = "block";
        $this->model_id = $blog_id;
    }

    public function confirm_blog_deletion($blog_id)
    {
        $blog = Blog::find($blog_id);
        $blog->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('blogs.index', '$refresh');
    }

    public function delete_project($project_id)
    {
        $this->model_to_delete = "project";
        $this->modal_property = "block";
        $this->model_id = $project_id;
    }

    public function confirm_project_deletion($project_id)
    {
        $project = Project::find($project_id);
        $project->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('projects.index', '$refresh');
    }

    public function delete_client($client_id)
    {
        $this->model_to_delete = "client";
        $this->modal_property = "block";
        $this->model_id = $client_id;
    }

    public function ban_client($client_id)
    {
        $this->model_to_delete = "ban_client";
        $this->modal_property = "block";
        $this->model_id = $client_id;
    }

    public function unban_client($client_id)
    {
        $this->model_to_delete = "unban_client";
        $this->modal_property = "block";
        $this->model_id = $client_id;
    }

    public function confirm_client_ban($client_id)
    {
        $client = User::find($client_id);
        if(isset($client)) {
            $new_ban = new Ban();
            $new_ban->user_id = $client_id;
            $new_ban->banned_by_user_id = Auth::user()->id;
            $new_ban->save();

            $this->model_to_delete = "";
            $this->modal_property = "hidden";
            $this->model_id = null;
            $this->emitTo('clients.index', '$refresh');
        }
    }

    public function confirm_client_unban($client_id)
    {
        Ban::where('user_id', $client_id)->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('clients.baned', '$refresh');
    }

    public function delete_all_clients()
    {
        $this->model_to_delete = "clients";
        $this->modal_property = "block";
        $this->model_id = 1;
    }

    public function delete_all_baned_clients()
    {
        $this->model_to_delete = "delete_baned_clients";
        $this->modal_property = "block";
        $this->model_id = 1;
    }

    public function approve_client($client_id)
    {
        $this->model_to_delete = "approve_client";
        $this->modal_property = "block";
        $this->model_id = $client_id;
    }

    public function approve_payment($investor_user_id)
    {
        $this->model_to_delete = "approve_payment";
        $this->modal_property = "block";
        $this->model_id = $investor_user_id;
    }

    public function confirm_client_deletion($client_id)
    {
        $client = User::find($client_id);
        $client->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('clients.index', '$refresh');
    }

    public function confirm_client_approval($client_id)
    {
        $client = User::find($client_id);
        $client->approved = 1;
        $client->save();

        $client = User::where('id', $client_id)->first();
        Notification::route('mail',  $client->email)->notify(new ClientApprovedNotification());

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('clients.index', '$refresh');
    }

    public function confirm_approve_payment($investor_user_id)
    {
        $investor_user = InvestitorUser::find($investor_user_id);
        $investor_user->has_payed = 1;
        $investor_user->save();

        $user = User::where('id', $investor_user->user_id)->first();
        Notification::route('mail',  $user->email)->notify(new InvestorPaymentApprovedNotification());

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('clients.signed-investments', '$refresh');

    }

    public function confirm_clients_deletion()
    {
        User::whereDoesntHave('roles')->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('clients.index', '$refresh');
    }

    public function confirm_baned_clients_deletion()
    {
        User::whereDoesntHave('roles')->whereDoesntHave('ban')->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('clients.index', '$refresh');
    }

    public function delete_faq($faq_id)
    {
        $this->model_to_delete = "faq";
        $this->modal_property = "block";
        $this->model_id = $faq_id;
    }

    public function confirm_faq_deletion($faq_id)
    {
        $faq = Faq::find($faq_id);
        $faq->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('faqs.index', '$refresh');
    }

    public function delete_subscriber($subscriber_id)
    {
        $this->model_to_delete = "subscriber";
        $this->modal_property = "block";
        $this->model_id = $subscriber_id;
    }

    public function confirm_subscriber_deletion($subscriber_id)
    {
        $subscriber = Subscriber::find($subscriber_id);
        $subscriber->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('subscribers.index', '$refresh');
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
