<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Url;

class UpdateUrlRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool {
        // Get the 'url' model being updated from the route parameter
        $url = $this->route('url'); // Assumes route parameter name is 'url'

        // Check if the authenticated user owns this URL
        // Make sure the user is logged in AND the url's user_id matches the logged-in user's id
        return $this->user() && $url && $url->user_id == $this->user()->id;

        // Alternative using Policies (if you have an UrlPolicy set up):
        // return $this->user()->can('update', $url);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array {
        // Copy rules from your controller's update method
        // Note: We probably DON'T want to validate 'shortener_url' here
        // as it's generated, not user input for update.
        return [
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255|url', // Added 'url' rule
        ];
    }
}
