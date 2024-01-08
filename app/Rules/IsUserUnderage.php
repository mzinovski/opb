<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class IsUserUnderage implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $today_date = Carbon::today();
        $date_of_birth = Carbon::createFromFormat('d-m-Y', $value);
        $age = $today_date->diffInYears($date_of_birth);
        if($age < 18) {
        	$fail('Мора да имате над 18 години');
        }
    }
}
