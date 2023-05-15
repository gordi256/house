<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Coordinate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_numeric($value)) {
            return false;
        }

        $latitude = (float) $value;

        return $latitude >= -90 && $latitude <= 90;
    }




    public function message()
    {
        return 'The :attribute must be a valid latitude/longitude .';
    }
}
