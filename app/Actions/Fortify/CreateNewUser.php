<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewClientNotification;
use App\Rules\IsUserUnderage;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'integer', 'digits_between:1,7'],
            'id_card_number' => ['required', 'string', 'max:255'],
            'embg' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'bank_account' => ['required', 'string', 'max:255'],
            'id_card_picture_front' => ['required', 'image', 'max:5000'],
            'id_card_picture_back' => ['required', 'image', 'max:5000'],
            'dob' => ['required', new IsUserUnderage],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],
        [   
            'name.required'    => 'Внесете го вашето име',
            'name.string'    => 'Грешен внес',
            'name.max:255'    => 'Грешен внес',

            'surname.required'    => 'Внесете го вашето презиме',
            'surname.string'    => 'Грешен внес',
            'surname.max:255'    => 'Грешен внес',

            'email.required'    => 'Внесете ја вашата епошта',
            'email.unique'    => 'Епоштата веке постои',
            'email.max:255'    => 'Грешен внес',
            'email.email'    => 'Ве молиме внесете валидна епошта',

            'phone.required'    => 'Внесете го вашиот мобилен телефон кој подоцна ке го користите за потврда',
            'phone.digits_between:1,7'    => 'Ве молиме внесете валиден мобилен телефон',
            'phone.integer'    => 'Ве молиме внесете валиден мобилен телефон',

            'id_card_number.required'    => 'Внесете го бројот на идентификациониот документ',
            'id_card_number.string'    => 'Грешен внес',
            'id_card_number.max:255'    => 'Грешен внес',

            'embg.required'    => 'Внесете ЕМБГ',
            'embg.string'    => 'Грешен внес',
            'embg.max:255'    => 'Грешен внес',

            'id_card_picture_front.required'    => 'Внесете слика од преден дел на идентификационен документ',
            'id_card_picture_front.image'    => 'Грешен внес',
            'id_card_picture_front.max:1024'    => 'Грешен внес',

            'id_card_picture_back.required'    => 'Внесете слика од заден дел на идентификационен документ',
            'id_card_picture_back.image'    => 'Грешен внес',
            'id_card_picture_back.max:1024'    => 'Грешен внес',

            'address.required'    => 'Внесете адреса',
            'address.string'    => 'Грешен внес',
            'address.max:255'    => 'Грешен внес',

            'bank_account.required'    => 'Внесете трансакциска сметка во некоја од комерцијалните банки во РМ од која и на која ќе се вршат уплати и исплати',
            'bank_account.string'    => 'Грешен внес',
            'bank_account.max:255'    => 'Грешен внес',

            'password.required' => 'Внесете лозинка',

            'dob.required' => 'Внесете датум на раѓање',
        ]
        )->validate();

        $slug = substr($input['name'], 0, 1) . '' . substr($input['surname'], 0, 1) . '' . substr($input['email'], 0, 1) . '' . substr($input['embg'], 0, 1) . '' . rand(1000,9999999999);

        if ($input['id_card_picture_front'] != null) {
            $image_extension = $input['id_card_picture_front']->getClientOriginalExtension();
            $input['id_card_picture_front']->storeAs('uploads/images', $slug . '-front-id.' . $image_extension);
            $id_card_picture_front_url =  $slug . '-front-id.' . $image_extension;
        } else {
            $id_card_picture_front_url = null;
        }

        //
        if ($input['id_card_picture_back'] != null) {
            $image_extension = $input['id_card_picture_back']->getClientOriginalExtension();
            $input['id_card_picture_back']->storeAs('uploads/images', $slug . '-back-id.' . $image_extension);
            $id_card_picture_back_url = $slug . '-back-id.' . $image_extension;
        } else {
            $id_card_picture_back_url = null;
        }

        //in listener
        // $admins = User::role('admin')->get();
        // foreach ($admins as $admin) {
        //     Notification::route('mail',  $admin->email)->notify(new NewClientNotification($input['name'], $input['email']));
        // }
        
        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'dob' => date("Y-m-d",strtotime($input['dob'])),
            'id_card_number' => $input['id_card_number'],
            'embg' => $input['embg'],
            'address' => $input['address'],
            'id_card_picture_front' => $id_card_picture_front_url,
            'id_card_picture_back' => $id_card_picture_back_url,
            'bank_account' => $input['bank_account'],
            'slug' => $slug,
            'password' => Hash::make($input['password']),
        ]);
    }
}
