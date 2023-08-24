<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IranPostalCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if( !$this->is_postal_code($value) ) {
            $fail("$value is not iran postal code");
        }
    }

    private function is_postal_code($phone): bool
    {
        $pattern = '/\b(?!(\d)\1{3})[13-9]{4}[1346-9][013-9]{5}\b/';
        return (bool)preg_match_all($pattern, $phone);
    }
}
