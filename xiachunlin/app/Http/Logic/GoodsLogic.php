<?php
namespace App\Http\Logic;
use App\Common\ReturnData;
use App\Model\Admin\Good;
use App\Http\Requests\GoodsRequest;
use Validator;
use App\Model\Shop\Comment;

class GoodsLogic extends BaseLogic
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getModel()
    {
        return model('Admin\\Good');
    }
    
    public function getValidate($data, $scene_name)
    {
        //数据验证
        $validate = new GoodsRequest();
        return Validator::make($data, $validate->getSceneRules($scene_name), $validate->getSceneRulesMessages());
    }
    
    //列表
    public function getList($where = array(), $order = '', $field = '*', $offset = '', $limit = '')
    {
        $res = $this->getModel()->getList($where, $order, $field, $offset, $limit);
        
        if($res['count'] > 0)
        {
            foreach($res['list'] as $k=>$v)
            {
                $res['list'][$k] = $this->getDataView($v);
                
                $res['list'][$k]->price = $this->getModel()->get_goods_final_price($v);
                $res['list'][$k]->is_promote_goods = $this->getModel()->bargain_price($v->promote_price,$v->promote_start_date,$v->promote_end_date); //is_promote_goods等于0，说明不是促销商品
                $res['list'][$k]->goods_detail_url = route('shop_goods',array('id'=>$v->id));
            }
        }
        
        return $res;
    }
    
    //分页html
    public function getPaginate($where = array(), $order = '', $field = '*', $limit = '')
    {
        $res = $this->getModel()->getPaginate($where, $order, $field, $limit);
        
        if($res->count() > 0)
        {
            foreach($res as $k=>$v)
            {
                $res[$k] = $this->getDataView($v);
            }
        }
        
        return $res;
    }
    
    //全部列表
    public function getAll($where = array(), $order = '', $field = '*', $limit = '')
    {
        $res = $this->getModel()->getAll($where, $order, $field, $limit);
        
        if($res)
        {
            foreach($res as $k=>$v)
            {
                $res[$k] = $this->getDataView($v);
                
                $res[$k]->price = $this->getModel()->get_goods_final_price($v); //商品最终价格
                $res[$k]->is_promote_goods = $this->getModel()->bargain_price($v->promote_price,$v->promote_start_date,$v->promote_end_date); //is_promote_goods等于0，说明不是促销商品
                $res[$k]->goods_detail_url = route('shop_goods',array('id'=>$v->id));
            }
        }
        
        return $res;
    }
    
    //详情
    public function getOne($where = array(), $field = '*')
    {
        $res = $this->getModel()->getOne($where, $field);
        if(!$res){return false;}
        
        $res = $this->getDataView($res);
        $res->price = $this->getModel()->get_goods_final_price($res); //商品最终价格
        $res->is_promote_goods = $this->getModel()->bargain_price($res->promote_price,$res->promote_start_date,$res->promote_end_date); //is_promote_goods等于0，说明不是促销商品
		$res->goods_detail_url = route('shop_goods',array('id'=>$res->id));
        $res->goods_img_list = model('Admin\\GoodsImg')->getDb()->where(['goods_id'=>$res->id])->get();
        $res->type_name = model('Admin\\Goods_type')->getDb()->where(['id'=>$res->typeid])->value('name');
        
        //商品评论数
        $where2['comment_type'] = Comment::GOODS_COMMENT_TYPE;
        $where2['status'] = Comment::SHOW_COMMENT;
        $where2['id_value'] = $res->id;
        $res->goods_comments_num = model('Shop\\Comment')->getCount($where2);
        
        $this->getModel()->getDb()->where($where)->increment('click', 1); //点击量+1
        
        return $res;
    }
    
    //添加
    public function add($data = array(), $type=0)
    {
        if(empty($data)){return ReturnData::create(ReturnData::PARAMS_ERROR);}
        
        $validator = $this->getValidate($data, 'add');
        if ($validator->fails()){return ReturnData::create(ReturnData::PARAMS_ERROR, null, $validator->errors()->first());}
        
        $data['add_time'] = $data['pubdate'] = time();//添加、更新时间
        $res = $this->getModel()->add($data,$type);
        if($res){return ReturnData::create(ReturnData::SUCCESS,$res);}
        
        return ReturnData::create(ReturnData::FAIL);
    }
    
    //修改
    public function edit($data, $where = array())
    {
        if(empty($data)){return ReturnData::create(ReturnData::SUCCESS);}
        
        $validator = $this->getValidate($data, 'edit');
        if ($validator->fails()){return ReturnData::create(ReturnData::PARAMS_ERROR, null, $validator->errors()->first());}
        
        $res = $this->getModel()->edit($data,$where);
        if($res){return ReturnData::create(ReturnData::SUCCESS,$res);}
        
        return ReturnData::create(ReturnData::FAIL);
    }
    
    //删除
    public function del($where)
    {
        if(empty($where)){return ReturnData::create(ReturnData::PARAMS_ERROR);}
        
        $validator = $this->getValidate($where,'del');
        if ($validator->fails()){return ReturnData::create(ReturnData::PARAMS_ERROR, null, $validator->errors()->first());}
        
        $res = $this->getModel()->del($where);
        if($res){return ReturnData::create(ReturnData::SUCCESS,$res);}
        
        return ReturnData::create(ReturnData::FAIL);
    }
    
    /**
     * 数据获取器
     * @param array $data 要转化的数据
     * @return array
     */
    private function getDataView($data = array())
    {
        return getDataAttr($this->getModel(),$data);
    }
}