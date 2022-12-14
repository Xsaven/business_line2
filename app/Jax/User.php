<?php

namespace App\Jax;

use App\Events\FileUpload;
use App\Events\OrderEvent;
use App\Events\ReportDownloadFileImageTask;
use App\Events\ReportDownloadFileTask;
use App\Events\ReportFunTask;
use App\Events\ReportImageVideoTask;
use App\Events\ReportPhotoTask;
use App\Events\ReportQuizTask;
use App\Events\ReportStarQuizTask;
use App\Events\ReportTextImageTask;
use App\Events\ReportTextImageVideoTask;
use App\Events\ReportTextTask;
use App\Events\ReportTextVideoTask;
use App\Events\ReportVideoTask;
use App\Events\SubscribeDirectionEvent;
use App\Events\SubscribeUserEvent;
use App\Events\User\ChangeName;
use App\Http\Resources\AuthUserResource;
use App\Http\Resources\DeliveryResource;
use App\Http\Resources\DivisionResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\PositionResource;
use App\Http\Resources\UserForFansSelect;
use App\Http\Resources\UserResource;
use App\Jobs\AdminStatisticJob;
use App\Jobs\OffLineJob;
use App\Models\Delivery;
use App\Models\Division;
use App\Models\Position;
use App\Models\QuizAnswer;
use App\Repositories\AuthUserRepository;
use App\Repositories\TaskReportRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Lar\LJS\JaxExecutor;
use Lar\LteAdmin\Models\LteFileStorage;

/**
 * User Class.
 */
class User extends JaxExecutor
{
    /**
     * @return bool
     */
    public function access()
    {
        return \Auth::check();
    }

    /**
     * @param string $login
     * @param int $division_id
     * @param int $position_id
     * @param string $about
     */
    public function update_user_data(string $login, int $division_id = null, int $position_id = null, string $about = '')
    {
        if (app(AuthUserRepository::class)
            ->user
            ->update([
                'login' => $login,
                'division_id' => $division_id,
                'position_id' => $position_id,
                'about' => $about,
            ])) {
            \Auth::user()->logs()->create([
                'field' => 'profile',
                'type' => 'update',
                'message' => '?????????????? ???????????? ??????????????',
            ]);
            $this->put('update');
        }
    }

    /**
     * @param Request $request
     */
    public function upload_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            if (
                ! is_image($file->getPathname()) &&
                ! str_contains($file->getMimeType(), 'jpg') &&
                ! str_contains($file->getMimeType(), 'jpeg') &&
                ! str_contains($file->getMimeType(), 'png')
            ) {
                $this->toast_error('???????????????? ???????????????????? ??????????.');

                return;
            }

            if ($file->getSize() > 10485760) {
                $this->toast_error('?????????????? ?????????????? ?????????? ??????????.');

                return;
            }
            $img = \Image::make($request->file('avatar'));

            $img->orientate();

            if (\Auth::user()->photo) {
                \Storage::disk('yandexcloud')->delete(
                    str_replace(config('filesystems.disks.yandexcloud.url').'/', '', \Auth::user()->photo)
                );
            }

            $img = $img->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');

            $file_name = \Auth::id().'_'.time().'_avatar.jpg';

            \Storage::disk('yandexcloud')->put($file_name, (string) $img);

            if (app(AuthUserRepository::class)
                ->user
                ->update([
                    'photo' => \Storage::disk('yandexcloud')->url($file_name),
                ])) {
                //$this->put("window.location.reload");
                \Auth::user()->logs()->create([
                    'field' => 'photo',
                    'type' => 'update',
                    'message' => '?????????????? ???????? ??????????????',
                ]);
            }

            return ['result' => true];
        } else {
            $this->toast_error('?????????????????? ???????????? ???????????????? ??????????!');

            return ['result' => false];
        }
    }

    /**
     * @param  int  $user_id
     */
    public function subscribe(int $user_id)
    {
        event(new SubscribeUserEvent($user_id));

        //$this->reload();
        $this->put('update');
    }

    /**
     * @param  AuthUserRepository  $repository
     * @return AuthUserResource
     */
    public function update(AuthUserRepository $repository)
    {
        return AuthUserResource::make(
            $repository->user
        );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function question_likes(UserRepository $repository)
    {
        return $repository->question_likes();
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function new_notifications(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NotificationResource::collection(
            app(AuthUserRepository::class)->new_notifications
        );
    }

    /**
     * @return array
     */
    public function mark_as_read_notifications(): array
    {
        \Auth::user()->logs()->create([
            'field' => 'as_read',
            'type' => 'notifications',
            'message' => '?????????????? ?????? ???????? ?????????????????? ?????? ??????????????????????',
        ]);

        return [
            'result' => app(AuthUserRepository::class)->mark_as_read_notifications(),
        ];
    }

    /**
     * @return string[]
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function ping(bool $come_back = false, string $page = null)
    {
        $user = \Auth::user();

        \Cache::set("n:user:session:{$user->id}", 2, now()->addMinutes(5));
        //\Cache::set("n:user:{$page}:{$user->id}", 2, now()->addMinutes(5));

        if (! $come_back) {
            \Auth::user()->increment('seconds', 60);
        }

        return ['result' => 'pong'];
    }

    /**
     * @param int $direction_id
     */
    public function follow_direction(int $direction_id)
    {
        if (! \Auth::user()->direction_id) {
            /**
             * @var SubscribeDirectionEvent $event
             */
            $event = new SubscribeDirectionEvent($direction_id);

            event($event);
        }

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param string $comment
     */
    public function text_report(int $task_id, string $comment)
    {
        /**
         * @var ReportTextTask
         */
        $event = new ReportTextTask($task_id, $comment);

        event($event);

        $this->reload();
    }

    public function text_report_for_fans(int $task_id, string $comment, int $fun_id, string $file = null)
    {
        $event = new ReportFunTask($task_id, $fun_id, $comment, $file);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param Request $request
     */
    public function video_report(int $task_id, string $file)
    {
        $event = new ReportVideoTask($task_id, $file);

        event($event);

        if ($event->validated) {
            $this->reload();
        }
    }

    /**
     * @param int $task_id
     * @param Request $request
     */
    public function image_report(int $task_id, string $file)
    {
        //dd($task_id, $file);

        $event = new ReportPhotoTask($task_id, $file);

        event($event);

        $this->reload();
    }

    public function text_or_image_or_video_report(int $task_id, string $comment, string $file)
    {
        $event = new ReportTextImageVideoTask($task_id, $comment, $file);

        event($event);

        $this->reload();
    }

    /**
     * @param  int  $task_id
     * @param  string  $file
     */
    public function image_or_video_report(int $task_id, string $file)
    {
        $event = new ReportImageVideoTask($task_id, $file);

        event($event);

        $this->reload();
    }

    /**
     * @param  int  $task_id
     * @param  string  $comment
     * @param  string  $file
     */
    public function text_or_video_report(int $task_id, string $comment, string $file)
    {
        $event = new ReportTextVideoTask($task_id, $file, $comment);

        event($event);

        $this->reload();
    }

    /**
     * @param int $task_id
     * @param string $comment
     * @param Request $request
     */
    public function text_or_image_report(int $task_id, string $comment, string $file)
    {
        $event = new ReportTextImageTask($task_id, $comment, $file);

        event($event);

        $this->reload();
    }

    /**
     * @param $task
     * @param array $quiz_answers
     * @return array
     */
    public function quiz_report($task, array $quiz_answers)
    {
        $event = new ReportQuizTask($task, $quiz_answers);

        event($event);

        return ['balls' => $event->balls];
    }

    /**
     * @param int $task_id
     * @param array $star_quiz_answers
     * @return array
     */
    public function star_quiz_report(int $task_id, array $star_quiz_answers)
    {
        $event = new ReportStarQuizTask($task_id, $star_quiz_answers);

        event($event);

        return ['star' => $event->star, 'balls' => $event->balls];
    }

    /**
     * @param int $task_id
     */
    public function download_file_report(int $task_id)
    {
        $event = new ReportDownloadFileTask($task_id);

        event($event);

        $this->reload();
    }

    /**
     * @param  int  $task_id
     * @param  string  $file
     */
    public function download_file_image_report(int $task_id, string $file)
    {
        $event = new ReportDownloadFileImageTask($task_id, $file);

        event($event);

        $this->reload();
    }

    /**
     * @param string $phone
     * @param string $email
     * @param int $delivery_id
     * @param $value
     * @param $product_id
     */
    public function create_order(string $phone, string $email, int $delivery_id, $value, $product_id)
    {
        $event = new OrderEvent($phone, $email, $delivery_id, $value, $product_id);

        event($event);

        $this->reload();
    }

    /**
     * @param string $q
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function search_users(string $q)
    {
        return UserForFansSelect::collection(
            app(UserRepository::class)->search_users_for_fans($q))->toArray(\request()
        );
    }

    /**
     * @param  Request  $request
     * @return array|false[]
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function upload_file(Request $request)
    {
        if ($request->hasFile('file')) {
            $event = new FileUpload($request->file('file'));

            event($event);

            if ($event->result()) {
                \Cache::set(\Auth::id().'-'.$event->filename, 1, now()->addDay());
            }

            return ['result' => $event->result(), 'file' => $event->filename];
        }

        return ['result' => false, 'file' => null];
    }

    /**
     * @param  string  $file
     * @return bool[]|false[]|null[]
     */
    public function drop_file(string $file)
    {
        if (\Cache::has(\Auth::id().'-'.$file)) {
            return ['result' => \Storage::disk('yandexcloud')->delete($file)];
//            if (str_ends_with($file, '.jpg')) {
//                return ['result' => \Storage::disk('yandexcloud')->delete($file)];
//            } else {
//                return ['result' => is_file($file) ? unlink($file) : null];
//            }
        }

        return ['result' => false];
    }

    public function answer(int $answer_id)
    {
        $answer = QuizAnswer::find($answer_id);

        return ['result' => (bool) $answer?->cost];
    }

    public function positions(string $q = null, int $id = null): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $f = Position::find($id);

        return PositionResource::collection(
            collect()
                ->when(! $q && $f, fn ($c, $p) => $c->merge([$f]))
                ->merge(
                    Position::where('name', 'like', "%{$q}%")
                        ->limit(100)
                        ->get()
                )
        );
    }

    public function divisions(string $q = null, int $id = null): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $f = Division::find($id);

        return DivisionResource::collection(
            collect()
                ->when(! $q && $f, fn ($c, $p) => $c->merge([$f]))
                ->merge(
                    Division::where('name', 'like', "%{$q}%")
                        ->limit(100)
                        ->get()
                )
        );
    }

    public function deliveries(string $q = null, int $id = null): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $f = Delivery::find($id);

        return DeliveryResource::collection(
            collect()
                ->when(! $q && $f, fn ($c, $p) => $c->merge([$f]))
                ->merge(
                    Delivery::where('address', 'like', "%{$q}%")
                        ->limit(100)
                        ->get()
                )
        );
    }
}
