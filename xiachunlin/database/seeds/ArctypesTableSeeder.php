<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Arctype;
class ArctypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        $list = array (
            0 =>
                array (
                    'id' => 1,
                    'pid' => 0,
                    'addtime' => 1483345707,
                    'name' => '新闻中心',
                    'seotitle' => '',
                    'keywords' => '新闻中心',
                    'description' => '新闻中心',
                    'content' => '<p>新闻中心</p>',
                    'typedir' => 'news',
                    'templist' => 'category',
                    'temparticle' => 'detail',
                    'litpic' => '',
                    'seokeyword' => '新闻中心',
                    'model' => 0,
                    'listorder' => 50,
                    'is_show' => 0,
                ),
            1 =>
                array (
                    'id' => 2,
                    'pid' => 0,
                    'addtime' => 1476063429,
                    'name' => '案例中心',
                    'seotitle' => '',
                    'keywords' => '案例中心',
                    'description' => '案例中心',
                    'content' => '<p>案例中心</p>',
                    'typedir' => 'case',
                    'templist' => 'category',
                    'temparticle' => 'detail',
                    'litpic' => '',
                    'seokeyword' => '案例中心',
                    'model' => 0,
                    'listorder' => 50,
                    'is_show' => 0,
                ),
            2 =>
                array (
                    'id' => 3,
                    'pid' => 1,
                    'addtime' => 1476063419,
                    'name' => '行业新闻',
                    'seotitle' => '',
                    'keywords' => '行业新闻',
                    'description' => '行业新闻',
                    'content' => '<p>行业新闻</p>',
                    'typedir' => 'hangye',
                    'templist' => 'category',
                    'temparticle' => 'detail',
                    'litpic' => '',
                    'seokeyword' => '行业新闻',
                    'model' => 0,
                    'listorder' => 50,
                    'is_show' => 0,
                ),
            3 =>
                array (
                    'id' => 4,
                    'pid' => 1,
                    'addtime' => 1476068069,
                    'name' => '企业新闻',
                    'seotitle' => '',
                    'keywords' => '企业新闻',
                    'description' => '企业新闻',
                    'content' => '<p>企业新闻</p>',
                    'typedir' => 'qiye',
                    'templist' => 'category',
                    'temparticle' => 'detail',
                    'litpic' => '',
                    'seokeyword' => '企业新闻',
                    'model' => 0,
                    'listorder' => 50,
                    'is_show' => 0,
                ),
        );

        foreach($list as $value){
            Arctype::create($value);
        }

    }
}
