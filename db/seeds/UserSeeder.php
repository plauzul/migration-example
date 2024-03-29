<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'email'    => 'henriq10@outlook.com',
                'password' => password_hash('secret', PASSWORD_DEFAULT),
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")
            ],[
                'email'    => 'jose@gmail.com',
                'password' => password_hash('secret', PASSWORD_DEFAULT),
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")
            ]
        ];

        $posts = $this->table('users');
        $posts->insert($data)
              ->save();
    }
}
