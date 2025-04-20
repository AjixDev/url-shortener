<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UrlManagementService {
    /**
     * Creates a new URL entry.
     *
     * @param array $validatedData Data validated by StoreUrlRequest
     * @return Url|null The created Url model or null on failure
     */
    public function store(array $data): Url {
        // Validate the data (you can also use a FormRequest for this)
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        // Prepare the data for storage
        $data['user_id'] = Auth::id(); // Assuming the user is authenticated
        $data['title'] = Str::ucfirst($data['title']);
        $data['shortener_url'] = Str::random(5); // Generate a random short URL

        // Create and return the URL record
        return Url::create($data);
    }
}
