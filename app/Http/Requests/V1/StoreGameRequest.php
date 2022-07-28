<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'player_1_id' => ['required', 'numeric', 'exists:players,id'],
            'player_2_id' => ['required', 'numeric', 'exists:players,id'],
            'player_3_id' => ['required', 'numeric', 'exists:players,id'],
            'player_4_id' => ['required', 'numeric', 'exists:players,id'],
            'score_team_1' => ['required', 'numeric', 'min:0', 'max:9'],
            'score_team_2' => ['required', 'numeric', 'min:0', 'max:9']
        ];
    }
}
