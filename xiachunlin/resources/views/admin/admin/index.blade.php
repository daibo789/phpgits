@extends('admin.layouts.main')
@section('title', '管理员列表')

@section('content')
<h2 class="sub-header">管理员列表</h2>[ <a href="<?php echo route('admin_admin_add'); ?>">添加管理员</a> ]<br><br>

<form name="listarc"><div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr class="info">
<th>ID</th>
<th>用户名</th>
<th>邮箱</th>
<th>状态</th>
<th>管理</th>
</tr></thead>
<tbody>

<?php foreach($posts as $row){ ?>

    <tr>
    <td>{{$row->id}}</td>
    <td>{{$row->username}}</td>
    <td>{{$row->email}}</td>
    <td>{{$row->status}}</td>
    <td><a href="{{route('admin_admin_edit')}}?id={{$row->id}}">修改</a><?php if($row->id<>1){ ?> | <a onclick="delconfirm('{{route('admin_admin_del')}}?id={{$row->id}}')" href="javascript:;">删除</a><?php } ?></td>
    </tr><?php } ?>
</tbody>
</table>
</div><!-- 表格结束 --></form><!-- 表单结束 -->

<nav aria-label="Page navigation">{{ $posts->links() }}</nav>
@endsection