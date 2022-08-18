<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserSex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:sex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $text = \Database\Seeders\UsersListSeeder::getText();

        $exploded = array_reverse(explode("\n", $text));

        foreach ($exploded as $item) {
            $data = explode("\t", $item);
            $num = trim($data[0]);
            $user = User::where('number', $num)->first();
            if ($user && isset($data[5])) {
                $sex = trim($data[5]);
                $sexNum = $sex === 'Мужской' ? 0 : 1;
                if ($user->sex != $sexNum) {
                    $this->info(
                        $user->id
                        . ') '
                        . $user->full_name
                        . ": "
                        . ($user->sex ? 'Женский' : 'Мужской')
                        . " => "
                        . ($sexNum ? 'Женский' : 'Мужской')
                        . " ({$sex})"
                    );
                    $user->update(['sex' => $sexNum]);
                }
            }
        }

        return 0;
    }
}
