## 数组
1. array_add($array, $newKey, $newValue)
2. array_collapse($array, ...) == array_merge()
3. array_divide($array) 返回 [array_keys($array), array_values($array)]
4. array_dot(['a'=>['b'=>'c']]) 返回 ['a.b'=>'c'] 将多维数组压缩为一维
5. array_except($array, $keyArray) 移除指定键(数组)的键值对
6. array_first($array, function($value, $key){}, $default) 筛选出第一个符合条件的键值
7. array_flatten($array) 取多维数组的所有键值
8. array_forget($array, 'a.b') '点'式移除键值对
9. array_get($array, 'a.b') '点'式取键值对的值
10. array_has($array, 'a.b') '点'式判断存在
11. array_last($array, function($value, $key), $default) 类似 array_first，取最后一个满足条件的值
12. array_only($array, $keyArray) 返回指定键值对
13. array_pluck($array, 'a.b.c') 取某个键值对
14. array_prepend($array, 'first') 数组头部加入元素
15. array_pull($array, 'name') 移除指定键值对并返回该键值对的值
16. array_set($array, 'a.b.c', $value) 写入值
17. array_sort($array, function($value){}) 排序
18. array_sort_recursive($array) 递归排序
19. array_where($array, function($value, $key){}) 过滤
20. head($array) 取第一个元素
21. last($array) 取最后一个元素


## 路径
函数 | 对应目录
-----|-----
app_path()|app
base_path()|../
config_path()|config
database_path()|database
public_path()|public
resource_path()|resource
storage_path()|storage


## 字符串

### 转换
1. camel_case($str) 转换成驼峰式命名 aB
2. snake_case($str) 转换成蛇形命名 a_b
3. class_basename('a\b\c') 返回 c : 不包含命名空间的类名称
4. e() 同 htmlentities
5. str_plural($word, $num = null) 将单词转换为复数
6. str_singular($words) 将单词转换为单数
7. studly_case($lowerCace) 首字母大写
8. title_case($str) 每个单词首字母大写
9. trans($str) 翻译
10. trans_choice($str, $num) 可翻译复数

### 长度
1. str_limit($str, $num) 限制长度

### 匹配
1. start_with($str, $childStr) 判断开头是否为指定内容
2. end_with($str, $childStr) 判断结尾是否为指定内容
3. str_contains($str, $regOrRegArray) 判断是否包含指定内容，可匹配多项（数组）
4. str_finish($str, $last) 添加指定内容到末尾
5. str_is($reg, $str) 正则匹配

### 生成
1. str_random($len = 16) 生成随机字符串
2. str_slug($str, $alter) 生成 URL 友好的 slug 【如替换空格】

## URL
1. action('HomeController@get') 函数根据指定控制器的方法生成 URL
2. asset('a.jpg') 资源文件
3. secure_asset('file.zip', $title, $attributes = []) 使用 HTTPS 协议生成资源文件的 URL
4. route('login', $params = []) 根据路由名称
5. secure_url('login', $params = []) 使用 HTTPS 协议生成指定路径的完整 URL
6. url($childPath) 生成指定路径的完整 URL
7. url()->current() 当前路径
8. url()->full() 当前完整路径
9. url()->previous() 上一访问路径

## 其他

### 异常
1. abort(404, $message) 抛出异常
2. abort_if($condition, 404) 根据条件判断抛出异常
3. abort_unless($condition, 404) 根据条件判断不抛出异常

### 生成
1. auth()->user() 返回 Auth facade 的实例
2. back() 生成一个重定向响应让用户返回之前的位置
3. bcrypt($password) 使用 Bcrypt 算法哈希指定的数值
4. collect($array) 生成集合
5. csrf_field() 生成 input[type='hidden' name='csrf_field' value='$value'] 字段
6. method_field() 生成模拟各种 HTTP 动作请求的 HTML 表单隐藏字段
7. factory($class) 根据指定类、名称以及数量生成模型工厂构造器
8. redirect($url = null) 返回一个 HTTP 重定向响应
9. request($key, $default = null) 返回当前 请求 实例或获取输入的项目
10. response() 创建一个 响应 实例或获取一个 response 工厂实例
11. session($array) 设置 session
12. value(function() { return $value; }) 返回值
13. view($name) 返回视图

### 获取
1. cache($key, $default) 获取缓存值
2. config() 获取配置信息
3. env($key, $default) 获取环境变量值
4. csrf_token() 获取当前 CSRF 令牌的内容
5. old($key) 获取 session 内一次性的历史输入值
6. session($key) 获取 session 键值


### 日志
1. info($content) 以 info 级别写入日志
2. logger($content, $array) 以 debug 级别写入日志


### 输出
1. dd($value, ...) 函数输出指定变量的值并终止脚本运行
2. dump($value) 输出指定变量的值

### 处理
1. dispatch($job) 把一个新任务推送到 Laravel 的 任务队列中
2. event($listener) 派发指定的 事件 到所属的侦听器
3. retry($num, function(){}, $max)将会重复调用给定的回调函数，最多调用指定的次数