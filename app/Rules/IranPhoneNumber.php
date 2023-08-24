<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IranPhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if( !$this->is_phone($value) ) {
            $fail("$value is not iran phone number");
        }
    }

    private function is_phone($phone): bool
    {
        $pattern = '/(\+?98|098|0|0098)?(9\d{9})/';
        return (bool)preg_match_all($pattern, $phone);
    }
}
