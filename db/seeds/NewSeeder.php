<?php


use Phinx\Seed\AbstractSeed;

class NewSeeder extends AbstractSeed
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
                'title'       => 'Titulo Noticia 1',
                'description' => 'Descrição Noticia 1',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")
            ],[
                'title'       => 'Titulo Noticia 2',
                'description' => 'Descrição Noticia 2',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")
            ],[
                'title'       => 'Titulo Noticia 3',
                'description' => 'Descrição Noticia 3',
                'is_logged'   => true,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")
            ]
        ];

        $posts = $this->table('news');
        $posts->insert($data)
              ->save();
    }
}
