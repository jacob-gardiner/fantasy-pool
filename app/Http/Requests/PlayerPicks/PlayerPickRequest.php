<?php

namespace App\Http\Requests\PlayerPicks;

use App\Rules\Pools\AllowSelection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PlayerPickRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'houseguest_id' => 'required',
            'player_id'     => 'required',
            'pool_id'       => [
                'required',
                new AllowSelection()
            ],
        ];
    }

    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        $this->redirect = route('fantasy-pool.dashboard', ['pool' => $this->request->get('pool_id')]);

        session()->flash('message-type', 'danger');
        session()->flash('message', 'Unable to select player, please try again or contact your pool admin');

        throw (new ValidationException($validator))->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    }
}
