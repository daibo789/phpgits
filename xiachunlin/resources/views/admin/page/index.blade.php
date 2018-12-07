@extends('admin.layouts.main')
@section('title', '单页面列表')

@section('content')
<h2 class="sub-header">单页文档管理</h2>[ <a href="/admin/page/add">增加一个页面</a> ]<br><br>

<form name="listarc"><div class="table-responsive"><table class="table table-striped table-hover">
<thead>
<tr>
  <th>编号</th>
  <th>页面名称</th>
  <th>别名</th>
  <th>更新时间</th>
  <th>管理</th>
</tr>
</thead>
<tbody>
<?php if($posts){foreach($posts as $row){ ?>
<tr>
  <td><?php echo $row["id"]; ?></td>
  <td><a href="/admin/page/edit?id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a></td>
  <td><?php echo $row["filename"]; ?></td>
  <td><?php echo date('Y-m-d',$row["pubdate"]); ?></td>
  <td><a target="_blank" href="<?php echo get_front_url(array("type"=>"page","pagename"=>$row["filename"])); ?>">预览</a>&nbsp;<a href="/admin/page/edit?id=<?php echo $row["id"]; ?>">修改</a>&nbsp;<a onclick="delconfirm('/admin/page/del?id=<?php echo $row["id"]; ?>')" href="javascript:;">删除</a></td>
</tr>
<?php }} ?>
</tbody>
</table></div><!-- 表格结束 --></form><!-- 表单结束 -->
@endsection