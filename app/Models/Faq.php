<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Faq Class.
 *
 * @package App\Models
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @mixin \Eloquent
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
        'active',
    ];

    /**
     * The attributes that should be cast.
     * @return array
     */
    protected $casts = [
        'question' => 'string',
        'answer' => 'string',
        'active' => 'boolean',
    ];

    /**
     * The model's attributes.
     * @return array
     */
    protected $attributes = [
        'active' => true,
    ];
}
