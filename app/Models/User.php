<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Ban;
use App\Models\InvestitorUser;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'surname',
        'dob',
        'id_card_number',
        'embg',
        'address',
        'id_card_picture_front',
        'id_card_picture_back',
        'bank_account',
        'slug',
        'approved',
        'invest_step',
        'steps_project_id',
        'phone',
        //'sms_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'email' => 'encrypted',
        // 'embg' => 'encrypted',
        // 'bank_account' => 'encrypted',
        // 'id_card_number' => 'encrypted',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function ban() {
        return $this->belongsTo(Ban::class, 'id', 'user_id');
    }

    public function isBanned() {
        $banned_user = Ban::where('user_id', $this->id)->first();
        if($banned_user != null) {
            return true;
        } else {
            return false;
        }
    }

    public function hasStartedInvestments() {
        $started_investments = InvestitorUser::where('user_id', $this->id)->where('invest_step', "<=", 4)->where('has_payed', 0)->get();
        if($started_investments != null && count($started_investments) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function startedInvestments()
    {

    }

    public function signedInvestments()
    {
        $signed_investments = InvestitorUser::where('user_id', $this->id)->where('has_payed', 0)->where('has_signed', 1)->with(['project', 'user'])->get();
        return $signed_investments;
    }

    public function payedInvestments()
    {
        $payed_investments = InvestitorUser::where('user_id', $this->id)->where('has_payed', 1)->where('has_signed', 1)->with(['project', 'user'])->get();
        return $payed_investments;
    }
}
