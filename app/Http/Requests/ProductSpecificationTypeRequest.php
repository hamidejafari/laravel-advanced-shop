<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSpecificationTypeRequest extends FormRequest
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
        if ($this->segment(1) == config('site.admin')) {

            switch ($this->segment(3)) {
                case 'add':
                    return [
                        'title' => 'required',
                        'name' => 'required'
                    ];
                    break;
                case 'cat-add':
                    return [
                        'pst_id' => 'required',
                        'category_id' => 'required'
                    ];
                    break;
                case 'edit':
                    return [
                        'title' => 'required',
                        'name' => 'required'
                    ];
                    break;
                case 'delete':
                    return [
                        'deleteId' => 'required',
                    ];
                    break;
                case 'sort':
                    return [
                        'update' => 'required',
                    ];
                    break;
            }

        }
    }
}
