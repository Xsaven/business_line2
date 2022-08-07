<?php

if (! function_exists('user_avatar')) {
    /**
     * @param  \App\Models\User|int|null  $user
     * @return string
     */
    function user_avatar(\App\Models\User|int|null $user = null): string {
        if (is_int($user)) $user = \App\Models\User::find($user);
        if (!$user) $user = Auth::user();
        if (!$user) return "";
        return $user->photo ?
            '<img data-src="'.asset($user->photo).'" alt="" class="lozad">' :
            "<span>{$user->short_name}</span>";
    }
}

if (! function_exists('diff_day_chunk')) {
    /**
     * @param  \Carbon\Carbon  $start_at
     * @param  \Carbon\Carbon  $end_at
     * @return array
     */
    function diff_day_chunk(\Carbon\Carbon $start_at, \Carbon\Carbon $end_at): array {
        $diff_days = $start_at->diffInDays($end_at);
        $chunk = [$start_at->toDateString()];
        for ($i=1; $i<=$diff_days;$i++) {
            $chunk[] = $start_at->addDay()->toDateString();
        }
        return array_chunk($chunk, 7);
    }
}
