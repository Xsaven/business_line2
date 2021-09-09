<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Faq Class
 * @package App\Models
 */
class Faq extends Model
{
    const TITLE = 'Faq';

    /**
     * The table associated with the model.
     * @return string
     */
    protected $table = 'faqs';

    /**
     * The attributes that are mass assignable.
     * @return array
     */
    protected $fillable = [
        'question',
        'answer',
        'active'
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        "question" => 'string',
        "answer" => 'string',
        "active" => 'boolean'
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        "active" => true
    ];

}
