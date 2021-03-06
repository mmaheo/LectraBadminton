<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatchUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        if ($user->hasRole('admin')) {
            return true;
        }

        abort(401, 'Unauthorized action.');

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matches_number_in_table' => 'required',
            'first_team_id'           => 'required',
            'second_team_id'          => 'required',
            'next_match_winner_id'    => 'required',
            'next_match_looser_id'    => 'required',
        ];
    }
}
