<?php

namespace App\Http\Livewire\ProjectCalculator;

use Livewire\Component;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ban;
use App\Models\InvestitorUser;
use PDF;
use GuzzleHttp\Client;
use App\Models\CurrencyRate;

class Index extends Component
{
	protected $listeners = [
        '$refresh'
    ];

    public $name;
    public $description;
    public $start_date;
    public $end_date;
    public $return_of_investment; //rok na izgradba
    public $picture;
    public $investment_opportunity;
    public $avg_slider_value;
    public $is_hidden;
    public $procenton;
    public $profit;
    public $min_date_for_investing;
    public $max_date_for_investing;
    public $curency;
    public $curency_symbol;
    public $min_investment_opportunity;
    public $project_obj;
    public $diff;
    public $selectProjectValue;
    public $currencyValue;
    public $investDate;
    public $rangeValue;
    public $dailyProcenton;
    public $selected_project;

    public $invest_step;
    public $steps_project_id;
    public $contract_name;

    public $otp_code_hidden;
    public $agreement_hidden;
    public $last_three_phone_digits;

    public $first;
    public $second;
    public $third;
    public $fourth;
    public $fifth;
    public $sixth;

    public $entered_code;
    public $investor_procenton;
    public $daily_early_invest_procenton;

    public $early_invest_procenton;

    public function mount()
    {
        $this->currencyValue = "eur";
        $this->investment_opportunity = 0;
        $this->avg_slider_value = 0;
        $this->rangeValue = 0;
        $this->procenton = 0;
        $this->dailyProcenton = 0;
        $this->early_invest_procenton = 0;
        $this->daily_early_invest_procenton = 0;
        $this->investor_procenton = 0;
        $this->profit = 0;
        $this->min_investment_opportunity = 0;
        $this->is_hidden = "style=display:none";

        $this->otp_code_hidden = "style=display:none";
        $this->agreement_hidden = "";

        $this->entered_code = "";

        $this->curency = "eur";
        $this->curency_symbol = "€";
        $this->selectProjectValue = "";
        $this->min_date_for_investing = Carbon::now()->format('d/m/Y');
        $this->max_date_for_investing = Carbon::now()->format('d/m/Y');
        $this->investDate = Carbon::now()->format('d/m/Y');
        $this->diff = 0;
        $this->invest_step = 0;
        $this->contract_name = "";
        $this->last_three_phone_digits = "";


        if(isset($this->selected_project)) {
            $this->selectProjectValue = $this->selected_project->id;
            $this->project_obj = $this->selected_project;
            $this->is_hidden = "";
            $this->min_investment_opportunity = 500;
            $this->name = $this->selected_project->name;
            $this->description = $this->selected_project->description;
            $this->start_date = $this->selected_project->start_date;
            $this->end_date = $this->selected_project->end_date;
            $this->return_of_investment = $this->selected_project->return_of_investment;
            $this->picture = $this->selected_project->picture;
            $this->investment_opportunity = $this->selected_project->investment_opportunity;
            $this->avg_slider_value = (float)$this->selected_project->investment_opportunity / 2;
            $this->rangeValue = $this->avg_slider_value;
            $this->procenton = $this->selected_project->procenton;
            $this->dailyProcenton = (float)$this->procenton / (float)(Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) ));

            $this->investor_procenton = $this->dailyProcenton * (float)(Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) ));

            $this->profit = ((float)$this->rangeValue) * (float)$this->procenton / 100;
            $this->min_date_for_investing = Carbon::now()->format('d/m/Y');
            $this->max_date_for_investing = Carbon::createFromFormat('d/m/Y', $this->selected_project->end_date)->format('d/m/Y');
            $this->investDate = Carbon::now()->format('d/m/Y');

            $user = User::where('id', Auth::user()->id)->first();
            if($user->invest_step == null) {
                $user->invest_step = 1;
                $user->steps_project_id = $this->selected_project->id;
                $user->save();
            }

            $iu = InvestitorUser::where('user_id', $user->id)->where('project_id', $this->selected_project->id)->where('has_payed', 0)->first();
            if(isset($iu) && $iu != null) {
                $this->invest_step = $iu->invest_step;
                $this->steps_project_id = $iu->project_id;
                $this->investDate = Carbon::createFromFormat('d/m/Y', $iu->investDate)->format('d/m/Y');
                $this->profit = $iu->profit;
                $this->rangeValue = $iu->rangeValue;
                $this->investor_procenton = $iu->investor_procenton;
                $this->avg_slider_value = $iu->rangeValue;
                $this->contract_name = $iu->contract_name;
                $this->early_invest_procenton = $iu->early_invest_procenton;

                if($iu->currencyValue != null) {
                    $this->currencyValue = $iu->currencyValue;
                    if($this->currencyValue == 'eur') {
                        $this->curency_symbol = "€";
                    }
                    if($this->currencyValue == 'mkd') {
                        $this->curency_symbol = "MKD";
                    }
                } else {
                    $this->currencyValue = 'eur';
                    if($this->currencyValue == 'eur') {
                        $this->curency_symbol = "€";
                    }
                    if($this->currencyValue == 'mkd') {
                        $this->curency_symbol = "MKD";
                    }
                }
                

                $user->invest_step = $iu->invest_step;
                $user->steps_project_id = $this->selected_project->id;
                $user->save();
            }

            if($this->invest_step == null || $this->invest_step == 1) {
                $this->updatedRangeValue();
            }
            
        }
        
    }

    public function updatedSelectProjectValue()
    {
        if(isset($this->selectProjectValue)) {
            $project = Project::where('id', $this->selectProjectValue)->first();
            if(isset($project)) {
                $this->project_obj = $project;
                $this->is_hidden = "";
                $this->min_investment_opportunity = 500;
                $this->name = $project->name;
                $this->description = $project->description;
                $this->start_date = $project->start_date;
                $this->end_date = $project->end_date;
                $this->return_of_investment = $project->return_of_investment;
                $this->picture = $project->picture;
                $this->investment_opportunity = $project->investment_opportunity;
                $this->avg_slider_value = (float)$project->investment_opportunity / 2;
                $this->rangeValue = $this->avg_slider_value;
                $this->procenton = $project->procenton;
                $this->investor_procenton = $project->procenton;
                $this->dailyProcenton = (float)$this->procenton / (float)(Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) ));

                //$this->investor_procenton = $this->dailyProcenton * (float)(Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) ));

                $this->profit = ((float)$project->investment_opportunity / 2) * (float)$this->procenton / 100;
                $this->min_date_for_investing = Carbon::now()->format('d/m/Y');
                $this->max_date_for_investing = Carbon::createFromFormat('d/m/Y', $project->end_date)->format('d/m/Y');
                $this->investDate = Carbon::now()->format('d/m/Y');

                $this->updatedRangeValue();
            }
        } 
    }

    public function updatedCurrencyValue()
    {
        if(isset($this->currencyValue)) {
            $currency_rate = CurrencyRate::orderBy('id', 'desc')->first();

            if(isset($currency_rate) && $currency_rate != null) {
                $eur_to_mkd_rate = $currency_rate->eur_to_mkd_rate;
            } else {
                $client = new Client();
                $api_key = env('CURRENCY_API_KEY');

                $headers = [
                    'apikey' => $api_key       
                ];

                //get currencies
                //https://apilayer.com/marketplace/exchangerates_data-api?txn=free&live_demo=show
                try {
                    $response = $client->request('GET', "https://api.apilayer.com/exchangerates_data/latest?symbols=MKD&base=EUR", [
                            'headers' => $headers
                        ]
                    );

                } catch (\Exception $e) {
                    \Log::info($e);
                    $eur_to_mkd_rate = 62;
                }

                if ($response->getStatusCode() != 200) {
                    \Log::info("currency rate api status code != 200");
                    $eur_to_mkd_rate = 62;
                }

                $content = $response->getBody()->getContents();
                $content = json_decode($content);

                if(isset($content->rates)) {
                    if(isset($content->rates->MKD)) {
                        $eur_to_mkd_rate = (float)(round((float)$content->rates->MKD, 3));
                        $currency_rate = new CurrencyRate;
                        $currency_rate->eur_to_mkd_rate = $eur_to_mkd_rate;
                        $currency_rate->save();
                    } else {
                        $eur_to_mkd_rate = 62;
                    }
                } else {
                    $eur_to_mkd_rate = 62;
                }
            }


            if($this->currencyValue == 'eur') {
                $this->curency_symbol = "€";
                $this->investment_opportunity = (float)$this->investment_opportunity / (float)$eur_to_mkd_rate;
                $this->avg_slider_value = (float)$this->avg_slider_value / (float)$eur_to_mkd_rate;
                $this->profit = (float)$this->profit / (float)$eur_to_mkd_rate;
                $this->min_investment_opportunity = (float)$this->min_investment_opportunity / (float)$eur_to_mkd_rate;
                $this->rangeValue = (float)$this->rangeValue / (float)$eur_to_mkd_rate;
            }
            if($this->currencyValue == 'mkd') {
                $this->curency_symbol = "MKD";
                $this->investment_opportunity = (float)$this->investment_opportunity * (float)$eur_to_mkd_rate;
                $this->avg_slider_value = (float)$this->avg_slider_value * (float)$eur_to_mkd_rate;
                $this->profit = (float)$this->profit * (float)$eur_to_mkd_rate;
                $this->min_investment_opportunity = (float)$this->min_investment_opportunity * (float)$eur_to_mkd_rate;
                $this->rangeValue = (float)$this->rangeValue * (float)$eur_to_mkd_rate;
            }
        }
    }

    public function updatedRangeValue() { 
        if($this->rangeValue >= $this->investment_opportunity) {
            $this->rangeValue = $this->investment_opportunity;
            $this->avg_slider_value = $this->investment_opportunity;
        }
        $this->avg_slider_value = $this->rangeValue;
        if(isset($this->investDate)) {
            if(Carbon::createFromFormat('d/m/Y', $this->investDate)->gte(Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date))){
                // Date is greater than or equals
                $this->diff = Carbon::createFromFormat('d/m/Y', $this->investDate)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) );
                if($this->diff <= 729) {
                    $this->profit = (float)$this->avg_slider_value * ((0.0249 * (float)$this->diff)/100);
                    $this->investor_procenton = (0.0249 * (float)$this->diff);
                } else {
                    $this->profit = (float)$this->avg_slider_value * (((float)$this->dailyProcenton * (float)$this->diff)/100);
                    $this->investor_procenton = ((float)$this->dailyProcenton * (float)$this->diff);
                }
            } else {
                $this->diff = Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) );
                $diff_from_invest_date = Carbon::createFromFormat('d/m/Y', $this->investDate)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) );
                if($diff_from_invest_date <= 729) {

                    $this->daily_early_invest_procenton = (float)0.7/(float)30;

                    $days_diff_before_start = (float)Carbon::createFromFormat('d/m/Y', $this->investDate)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date) );

                    $this->profit = ((float)$this->avg_slider_value * ((0.0249 * (float)$this->diff)/100)) + ((float)$this->avg_slider_value * ($days_diff_before_start * $this->daily_early_invest_procenton)/100);
                    $this->investor_procenton = (0.0249 * $this->diff);
                    $this->early_invest_procenton = $days_diff_before_start * $this->daily_early_invest_procenton;
                } else {

                    $this->daily_early_invest_procenton = (float)0.7/(float)30;

                    $days_diff_before_start = (float)Carbon::createFromFormat('d/m/Y', $this->investDate)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date) );

                    $this->profit = ((float)$this->avg_slider_value * ((float)$this->procenton/100)) + ((float)$this->avg_slider_value * ($days_diff_before_start * $this->daily_early_invest_procenton)/100);
                    $this->investor_procenton = (float)$this->procenton;
                    $this->early_invest_procenton = $days_diff_before_start * $this->daily_early_invest_procenton;
                }
            }
        }
    }

    public function updatedInvestDate(){
        if(isset($this->investDate)) {
            if(Carbon::createFromFormat('d/m/Y', $this->investDate)->gte(Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date))){
                // Date is greater than or equals
                $this->diff = Carbon::createFromFormat('d/m/Y', $this->investDate)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) );
                if($this->diff <= 729) {
                    $this->profit = (float)$this->avg_slider_value * ((0.0249 * $this->diff)/100);
                    $this->investor_procenton = (0.0249 * $this->diff);
                } else {
                    $this->profit = (float)$this->avg_slider_value * (((float)$this->dailyProcenton * (float)$this->diff)/100);
                    $this->investor_procenton = ((float)$this->dailyProcenton * (float)$this->diff);
                }
                
            } else {
                $this->diff = Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) );

                $diff_from_invest_date = Carbon::createFromFormat('d/m/Y', $this->investDate)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->end_date) );

                if($diff_from_invest_date <= 729) {

                    $this->daily_early_invest_procenton = (float)0.7/(float)30;
                    $days_diff_before_start = (float)Carbon::createFromFormat('d/m/Y', $this->investDate)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date) );

                    $this->profit = ((float)$this->avg_slider_value * ((0.0249 * $this->diff)/100)) + ((float)$this->avg_slider_value * ($days_diff_before_start * $this->daily_early_invest_procenton)/100);

                    $this->investor_procenton = (0.0249 * $this->diff);
                    $this->early_invest_procenton = $days_diff_before_start * $this->daily_early_invest_procenton;
                } else {
                    $this->daily_early_invest_procenton = (float)0.7/(float)30;
                    $days_diff_before_start = (float)Carbon::createFromFormat('d/m/Y', $this->investDate)->diffInDays( Carbon::createFromFormat('d/m/Y', $this->project_obj->start_date) );

                    $this->profit = ((float)$this->avg_slider_value * ((float)$this->procenton/100)) + ((float)$this->avg_slider_value * ($days_diff_before_start * $this->daily_early_invest_procenton)/100);
                    $this->investor_procenton = (float)$this->procenton;
                    $this->early_invest_procenton = $days_diff_before_start * $this->daily_early_invest_procenton;
                }
            }
        }
    }

    public function goToStepTwo()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $user->invest_step = 2;
        $user->steps_project_id = $this->selected_project->id;
        $user->save();

        $investor_user = InvestitorUser::where('user_id', $user->id)->where('project_id', $this->selected_project->id)->where('invest_step', 1)->where('has_payed', 0)->delete();

        $investor_user = new InvestitorUser;
        $investor_user->user_id = $user->id;
        $investor_user->project_id = $this->selected_project->id;
        $investor_user->rangeValue = $this->rangeValue;
        $investor_user->investDate = $this->investDate;
        $investor_user->profit = $this->profit;
        $investor_user->currencyValue = $this->currencyValue;
        $investor_user->investor_procenton = $this->investor_procenton;
        $investor_user->early_invest_procenton = $this->early_invest_procenton;
        $investor_user->invest_step = 2;
        $investor_user->save();

    
        $this->invest_step = 2;
        $this->steps_project_id = $user->steps_project_id;
    }

    public function goToStepThree()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $user->invest_step = 3;
        $user->steps_project_id = $this->selected_project->id;
        $user->save();

        $investor_user = InvestitorUser::where('user_id', $user->id)->where('project_id', $this->selected_project->id)->where('invest_step', 2)->where('has_payed', 0)->delete();

        $currency_rate = CurrencyRate::orderBy('id', 'desc')->first();
        $eur_to_mkd_rate = $currency_rate->eur_to_mkd_rate;

        if($this->currencyValue == 'eur') {
            $rangeValuePdf = (float)$this->rangeValue * (float)$eur_to_mkd_rate;
        }

        if($this->currencyValue == 'mkd') {
            $rangeValuePdf = (float)$this->rangeValue;
        }


        $pdf = PDF::loadView('pdfs.invest-contract', ['date' => Carbon::now()->format('d/m/Y'), 'user_name' => $user->name . ' ' . $user->surname, 'rangeValue' => $rangeValuePdf, 'early_invest_procenton' => (float)$this->early_invest_procenton, 'investor_procenton' => (float)$this->investor_procenton])->setPaper('a4', 'portrait');
        $contract_name = 'contract-'.time().'-'.str_replace('/', '', $this->investDate).'-'.$user->id.'-'.$this->selected_project->id.'.pdf';

        if (!is_dir(storage_path('pdfs/contracts/'.$user->id))) {
          // if it doesn't exist, make it
          mkdir(storage_path('pdfs/contracts/'.$user->id), 0777, true);
        }

        $pdf->save(storage_path('pdfs/contracts/'.$user->id.'/'.$contract_name));

        $investor_user = new InvestitorUser;
        $investor_user->user_id = $user->id;
        $investor_user->project_id = $this->selected_project->id;
        $investor_user->rangeValue = $this->rangeValue;
        $investor_user->investDate = $this->investDate;
        $investor_user->profit = $this->profit;
        $investor_user->currencyValue = $this->currencyValue;
        $investor_user->investor_procenton = $this->investor_procenton;
        $investor_user->early_invest_procenton = $this->early_invest_procenton;
        $investor_user->invest_step = 3;
        $investor_user->contract_name = $contract_name;
        $investor_user->save();

        $this->contract_name = $contract_name;
        $this->invest_step = 3;
        $this->steps_project_id = $user->steps_project_id;
    }

    public function goBackToStepOne()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $investor_user = InvestitorUser::where('user_id', $user->id)->where('project_id', $this->steps_project_id)->where('invest_step', 2)->where('has_payed', 0)->delete();

        $investor_user = new InvestitorUser;
        $investor_user->user_id = $user->id;
        $investor_user->project_id = $this->steps_project_id;
        $investor_user->rangeValue = $this->rangeValue;
        $investor_user->investDate = $this->investDate;
        $investor_user->profit = $this->profit;
        $investor_user->currencyValue = $this->currencyValue;
        $investor_user->investor_procenton = $this->investor_procenton;
        $investor_user->early_invest_procenton = $this->early_invest_procenton;
        $investor_user->invest_step = 1;
        $investor_user->save();

        $user->invest_step = 1;
        $user->steps_project_id = $this->selected_project->id;
        $user->save();
    
        $this->invest_step = 1;
        $this->steps_project_id = $user->steps_project_id;
    }

    public function goBackToStepTwo()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $investor_user = InvestitorUser::where('user_id', $user->id)->where('project_id', $this->steps_project_id)->where('invest_step', 3)->where('has_payed', 0)->delete();

        $investor_user = new InvestitorUser;
        $investor_user->user_id = $user->id;
        $investor_user->project_id = $this->steps_project_id;
        $investor_user->rangeValue = $this->rangeValue;
        $investor_user->investDate = $this->investDate;
        $investor_user->profit = $this->profit;
        $investor_user->currencyValue = $this->currencyValue;
        $investor_user->investor_procenton = $this->investor_procenton;
        $investor_user->early_invest_procenton = $this->early_invest_procenton;
        $investor_user->invest_step = 2;
        $investor_user->save();

        $user->invest_step = 2;
        $user->steps_project_id = $this->selected_project->id;
        $user->save();
    
        $this->invest_step = 2;
        $this->steps_project_id = $user->steps_project_id;
    }

    public function signSMS()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if(isset($user)) {
            $investor_user = InvestitorUser::where('user_id', $user->id)->where('project_id', $this->steps_project_id)->where('invest_step', 3)->where('has_payed', 0)->first();
            if(isset($investor_user)) {
                //phone
                if(isset($user->phone)){
                    $akton_username = env('AKTON_SMS_USERNAME');
                    $akton_password = env('AKTON_SMS_PASSWORD');
                    $sms_code_string = random_int(100000, 999999);
                    $sms_msg = "Здраво, вашиот код за договор е: " . $sms_code_string . ". Доколку не сте аплицирале игнорирајте ја пораката. https://sigroup.mk/";
                    //$user->sms_code = $sms_code_string;
                    $user->save();
                    //
                    $investor_user->sms_code = $sms_code_string;
                    $investor_user->save();
                    $client = new Client();

                    // Send sms code
                    try {
                        $response = $client->request('POST', 'http://81.17.225.230:8001/api/', [
                            'form_params' => [
                                'username' => $akton_username,
                                'password' => $akton_password,
                                'ani' => 'SiGroup',
                                'dnis' => "3897".$user->phone,
                                'message' => $sms_msg,
                                'command' => "submit",
                                'serviceType' => "",
                                'longMessageMode' => "split"
                            ]
                        ]);

                    } catch (\Exception $e) {
                        return redirect()->route('login')->with('msg', 'Упс, нешто не е во ред');
                    }

                    if ($response->getStatusCode() != 200) {
                        return redirect()->route('login')->with('msg', 'Упс, нешто не е во ред');
                    }

                    $content = $response->getBody()->getContents();
                    $content = json_decode($content);

                    if(isset($content[0]->message_id)) {
                        $this->agreement_hidden = "style=display:none";
                        $this->otp_code_hidden = "";
                        $this->last_three_phone_digits = substr($user->phone, -3);
                    }

                }
            }
        } 
    }

    public function submitSMScode()
    {
        $this->entered_code = "" . $this->first . $this->second . $this->third . $this->fourth . $this->fifth . $this->sixth; 
        $user = User::where('id', Auth::user()->id)->first();

        if(isset($user)) {
            $investor_user = InvestitorUser::where('user_id', $user->id)->where('project_id', $this->steps_project_id)->where('invest_step', 3)->where('has_payed', 0)->where('sms_code', '!=', null)->first();
            if(isset($investor_user)) {
                if((float)$this->entered_code == (float)$investor_user->sms_code) {
                    $user->invest_step = 4;
                    $user->steps_project_id = $this->selected_project->id;
                    $user->save();

                    //$investor_user->sms_code = null;
                    $investor_user->invest_step = 4;
                    $investor_user->has_signed = 1;
                    $investor_user->save();
                
                    $this->invest_step = 4;
                    $this->steps_project_id = $user->steps_project_id;
                }
            }
        }
    }

    public function render()
    {
        $projects = Project::orderBy('name', 'asc')->get();
        return view('livewire.project-calculator.index', [
            'projects' => $projects
        ]);
    }

}
