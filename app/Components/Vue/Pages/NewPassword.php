<?php

namespace App\Components\Vue\Pages;

use Lar\Tagable\Vue;

/**
 * NewPassword Class.
 * @package App\Components\Vue\Pages
 */
class NewPassword extends Vue
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_new_password';

    /**
     * @param  null  $id
     * @param  array  $attrs
     * @param ...$params
     */
    public function __construct($id = null, array $attrs = [], ...$params)
    {
        if (! request()->has('token') || ! request()->has('email')) {
            abort(404);
        }

        $attrs['token'] = request()->token;
        $attrs['email'] = request()->email;

        parent::__construct($id, $attrs, $params);
    }
}
