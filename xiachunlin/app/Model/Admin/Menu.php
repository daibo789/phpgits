<?php

namespace App\Model\Admin;

use App\Http\Model\BaseModel;
use DB;
use Log;
class Menu extends BaseModel
{
    protected $table = 'menus';
    public $timestamps = false;
    protected $hidden = array();
    protected $guarded = array(); //$guarded包含你不想被赋值的字段数组。


    public function getDb()
    {
        return DB::table($this->table);
    }


    //获取后台管理员所具有权限的菜单列表
    public static function getPermissionsMenu($role_id, $pid=0, $pad=0)
    {
        $res = [];

        $where['accesses.role_id'] = $role_id;
        $where['menus.pid'] = $pid;
        $where["menus.status"] = 1;

        $menu = \DB::table('menus')
            ->join('accesses', 'accesses.menu_id', '=', 'menus.id')
            ->select('menus.*', 'accesses.role_id')
            ->where($where)
            ->orderBy('listorder', 'asc')
            ->get();


        $menu = object_to_array( $menu,0);

        if($menu)
        {

            foreach($menu as $row)
            {

                $row['deep'] = $pad;
                if($PermissionsMenu = self::getPermissionsMenu($role_id, $row['id'], $pad+1))
                {
                    $row['child'] = $PermissionsMenu;
                }

                $res[] = $row;
            }
        }

        return $res;
    }
}
