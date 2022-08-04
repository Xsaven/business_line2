<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exploded = array_reverse(explode("\n", $this->text()));

        foreach ($exploded as $item) {
            $data = explode("\t", $item);
            $ee = explode('@', $data[3]);
            if (! User::where('number', $data[4])->exists() && (
                ! User::where('email', $data[3])->exists() || ! $data[3]
                )) {
                User::create([
                'name' => $data[1],
                'lastname' => $data[2],
                'login' => $ee[0] ?? time(),
                'email' => (bool) $data[3] ? $data[3] : null,
                'number' => $data[4],
                'password' => 'none',
                'direction_id' => 1,
            ]);
            }
        }
    }

    protected function text()
    {
        return <<<'TEXT'
Тест 1	Артём	Родин	arodin@f-sol.ru	1
Тест 2	Антон	Даниленко	a.dan@f-sol.ru	2
Тест 3	Xsaven	Developer	xsaven@gmail.com	3
TEXT;
    }
}
