<?php

namespace App\Observers;

use App\Events\Ws\AllUserExec;
use App\Models\Commentary;
use App\Models\TaskReport;
use App\Models\User;
use App\Notifications\UserNotedYouInTaskNotification;

class CommentaryOserver
{
    /**
     * Handle the Commentary "created" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function created(Commentary $commentary)
    {
        if (
            $commentary->text &&
            str_contains($commentary->text, '@')
        ) {
            $commentary->text = preg_replace_callback('/@([а-яА-ЯёЁa-zA-Z0-9_]+)/ui', function ($m) {
                if (isset($m[1])) {
                    $m[1] = explode('_', $m[1]);
                    $name = $m[1][0] ?? null;
                    $lastname = $m[1][1] ?? null;
                    $user = User::whereLogin($name)->first();
                    if (! $user) {
                        $user = User::whereName($name)->whereLastname($lastname)->first();
                    }
                    if ($user) {
                        return "<a href='/user/{$user->id}'>{$user->full_name}</a>";
                    }
                }

                return $m[0];
            }, $commentary->text);

            $commentary->save();
        }

        if ($commentary->active) {

            if ($commentary->commentaryable_id != 1) {
                AllUserExec::dispatch(["comment-add-{$commentary->commentaryable_id}" => $commentary->id]);
            } else {
                AllUserExec::dispatch(['v-home-commentaries:add_to_child' => [$commentary->id]]);
            }
        }
    }

    /**
     * Handle the Commentary "updated" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function updated(Commentary $commentary)
    {
        if (!$commentary->active) {

            //AllUserExec::dispatch('comment-drop-' . $commentary->id);
            AllUserExec::dispatch('v-home-commentaries:update_list');

        } else if ($commentary->active != (bool) $commentary->getRawOriginal('active')) {

            if ($commentary->commentaryable_id != 1) {
                AllUserExec::dispatch(["comment-add-{$commentary->commentaryable_id}" => $commentary->id]);
            } else {
                AllUserExec::dispatch(['v-home-commentaries:add_to_child' => [$commentary->id]]);
            }
        }
    }

    /**
     * Handle the Commentary "deleted" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function deleted(Commentary $commentary)
    {
        //AllUserExec::dispatch('comment-drop-' . $commentary->id);
        AllUserExec::dispatch('v-home-commentaries:update_list');
        Commentary::whereCommentaryableType($commentary->commentaryable_type)
            ->whereCommentaryableId($commentary->id)
            ->delete();
    }

    /**
     * Handle the Commentary "restored" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function restored(Commentary $commentary)
    {
        //
    }

    /**
     * Handle the Commentary "force deleted" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function forceDeleted(Commentary $commentary)
    {
        //
    }
}
