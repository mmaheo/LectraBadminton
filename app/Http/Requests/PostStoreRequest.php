<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        if (! $user->hasRole('ce'))
        {
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
            'photo'   => 'image',
            'content' => 'required_without:photo',
        ];
    }
}
