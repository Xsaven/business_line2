<?php

namespace App\Http\Resources;

use App\Models\Commentary;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * CommentaryResource Class.
 * @mixin Commentary
 */
class CommentaryResource extends CommentaryNoChildResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'child' => self::collection(
                $this->commentaries()
                    ->withCount('likes')
                    ->where('active', 1)
                    ->with('user', 'commentaries')
                    ->get()
            ),
        ]);
    }
}
