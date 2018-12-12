## [视图](http://d.laravel-china.org/docs/5.4/views "http://d.laravel-china.org/docs/5.4/views")
位置：`resources/views`

### 响应
```` php
return view('admin.profile', ['name' => 'Victoria']);
return view('greeting')->with('name', 'Victoria');
````

### 存在
```` php
View::exists('emails.customer')
````

### 共享数据
```` php
// App\Providers\AppServiceProvider
public function boot()
{
    View::share('key', 'value');
}
````
## Blade

### 布局
1. `@sectio('content')` 定义一个视图区块
2. `@yield` 显示指定区块的内容
3. `@extends('layout')` 子页面指定其所 「继承」 的页面布局
4. `@parent` 命令追加布局中的 sidebar 区块中的内容


#### 组件
1. `@component('alert', ['name' => 'li'])`
2. `@slot('title')`

#### 显示数据
1. `{ $name or 'Default' }`
2. `{!! $name !!}` ：显示未转义过的数据
3. `@{{ name }}` ：保留原始状态以适应 JS 框架
4. 大区域展示 JS 变量
```` php
@verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim
````

#### 控制结构

##### 条件
```` php
@if (count($records) === 1)
    我有一条记录！
@elseif (count($records) > 1)
    我有多条记录！
@else
    我没有任何记录！
@endif
````

#### 循环
```` php
@for ($i = 0; $i < 10; $i++)
    目前的值为 {{ $i }}
@endfor

@foreach ($users as $user)
    <p>此用户为 {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>没有用户</p>
@endforelse

@while (true)
    <p>我永远都在跑循环。</p>
@endwhile
// @continue 与 @break 也可用
@foreach ($users as $user)
    @continue($user->type == 1)
    <li>{{ $user->name }}</li>
    @break($user->number == 5)
@endforeach
````

#### 关于循环变量 `$loop`
属性 | 描述
----|----
$loop->index | 当前循环所迭代的索引，起始为 0
$loop->iteration | 当前迭代数，起始为 1
$loop->remaining | 循环中迭代剩余的数量
$loop->count | 被迭代项的总数量
$loop->first | 当前迭代是否是循环中的首次迭代
$loop->last | 当前迭代是否是循环中的最后一次迭代
$loop->depth | 当前循环的嵌套深度
$loop->parent | 当在嵌套的循环内时，可以访问到父循环中的 $loop 变量

```` php
@foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif

    @if ($loop->last)
        This is the last iteration.
    @endif

    <p>This is user {{ $user->id }}</p>
@endforeach

// 涉及多重循环的首尾循环变量
@foreach ($users as $user)
    @foreach ($user->posts as $post)
        @if ($loop->parent->first)
            This is first iteration of the parent loop.
        @endif
    @endforeach
@endforeach
````

#### 注释
```` php
{{-- 注释内容 --}}
````

#### 嵌入 PHP
```` php
@php
    //
@endphp
````

### 引入子视图
```` php
@include('view.name', ['some' => 'data'])
@includeIf('view.name', ['some' => 'data']) // 不确定视图是否存在

````

#### 为集合渲染视图
```` php
// 第一个参数为每个元素要渲染的子视图，第二个参数是你要迭代的数组或集合，而第三个参数为迭代时被分配至子视图中的变量名称
@each('view.name', $jobs, 'job')

// 当需要迭代的数组为空时，将会使用第四个参数提供的视图来渲染
@each('view.name', $jobs, 'job', 'view.empty')
````

#### 堆栈
```` html
@push('scripts')
    <script src="/example.js"></script>
@endpush


<head>
    <!-- Head Contents -->

    @stack('scripts')
</head>
````

#### [服务注入](http://d.laravel-china.org/docs/5.4/blade#service-injection "http://d.laravel-china.org/docs/5.4/blade#service-injection")
```` php
@inject('metrics', 'App\Services\MetricsService')

<div>
    Monthly Revenue: {{ $metrics->monthlyRevenue() }}.
</div>
````

#### 拓展
在 AppServiceProvider 的 boot 方法中注册
```` php
Blade::directive('datetime', function ($expression) {
      return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
});

// 调用时
@datetime($var)
````

### [视图合成器](http://d.laravel-china.org/docs/5.4/views#view-composers "http://d.laravel-china.org/docs/5.4/views#view-composers")
Laravel 没有存放视图合成器的默认目录

### 视图构造器
在视图渲染时执行
```` php
View::creator('profile', 'App\Http\ViewCreators\ProfileCreator');
````
