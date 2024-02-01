<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'nullable|unique:books,isbn,' . $this->book->id,
            'publish_year' => 'required|date_format:Y',
            'genre_id' => 'nullable|exists:genres,id',
            'available_quantity' => 'required|numeric',
            'description' => 'nullable',
            'cover' => 'nullable|image|max:2048',
        ];
    }
}
