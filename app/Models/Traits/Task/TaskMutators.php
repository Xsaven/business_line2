<?php

namespace App\Models\Traits\Task;

/**
 * TaskMutators Trait.
 * @package App\Models\Traits\Task
 */
trait TaskMutators
{
    /**
     * @param $value
     * @return string
     */
    public function getTermsOfParticipationAttribute($value): string
    {
        return $value ?: config('terms_of_participation');
    }
}
