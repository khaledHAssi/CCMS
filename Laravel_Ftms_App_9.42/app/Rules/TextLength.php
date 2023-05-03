<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TextLength implements Rule
{
    protected $count;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($count = 10)
    {
        $this->count = $count;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // dd(str_word_count(strip_tags($value)));
        return str_word_count(strip_tags($value)) >= $this->count;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'من فضلك اكتبلك كمان كلمتين زيادة';
    }
}
