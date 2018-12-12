## 表单检验
```` php
// 如果验证通过，你的代码就可以正常的运行。若验证失败，则会抛出异常错误消息并自动将其返回给用户。在一般的 HTTP 请求下，都会生成一个重定向响应，而对于 AJAX 请求则会发送 JSON 响应。
$this->validate($request, [
    'title' => 'required|unique:posts|max:255',
    'body' => 'required',
]);
````

### [验证属性](http://d.laravel-china.org/docs/5.4/validation#可用的验证规则 "http://d.laravel-china.org/docs/5.4/validation#可用的验证规则")

#### 必填项
1. required
2. required_if:anotherfield,value,... // 指定的另一字段为任意一个 value 时，此项 **必填**
3. required_unless:anotherfield,value,... // 指定的另一字段为任意一个 value 时，此项 **必不填**
4. required_with:foo,bar,...  // 指定的字段中的 **任意一个** 有值且不为空，则此字段为必填
5. required_with_all:foo,bar,...  // 指定的 **所有** 字段都有值，则此字段为必填
6. required_without:foo,bar,...  // 缺少 **任意一个** 指定的字段，则此字段为必填
7. required_without_all:foo,bar,...  // 所有指定的字段 **都没有** 值，则此字段为必填


#### 类型匹配
1. date
2. data_format:format
3. string
4. boolean ：是否为true、false、1/0、"1"、"0"
5. integer ：是否是整数
6. numberic ：是否为数值
7. image ：必须为图片格式（ jpeg、png、bmp、gif、或 svg ）
8. json ：是否为有效的 JSON 字符串
9. file ：成功上传的文件
10. array ：为数组
11. url

#### 具体内容匹配
1. email ：邮箱格式
2. ip ：是否为 IP 地址
3. dimensions ：必须是图片且比例符合要求（'avatar' => 'dimensions:min_width=100,min_height=200'）【可用的规则为： min_width，max_width，min_height，max_height，width，height，ratio】
4. alpha ：是否仅仅包含字母 
5. alpha_num ：是否仅仅包含字母、数字
6. alpha_dash ：是否仅仅包含字母、数字、破则号（-）以及下划线（ _ ）
7. accepted ：验证是否为yes、on、1、true
8.  active_url ：判断是否有效[A 或 AAAA]

#### 范围匹配
1. max:255 / min:1 ：最大值/最小值
2. between:min,max  ：值域
3. before:date ：某日期之前
4. before_or_equal:date ：类似上一项
5. after:data ：某日期之后（after:tomorrow）
6. digits:value ：是否为数字且长度为 value
7. digits_between:min,max ：长度范围
8. in:foo,bar,...  ：值域
9. not_in:foo,bar,... ：与 in 相反
10. mimetypes:text/plain,...  ：必须是这些 MIME 类型中的一个
11. mimes:foo,bar,...  ：验证字段文件的 MIME 类型是否符合列表中指定的格式（'photo' => 'mimes:jpeg,bmp,png'）
12. different:field ：不同于指定值
13. exists:table,column ：验证字段值是否存在指定的数据表中（'email' => 'exists:db.user,email'）
14. in_array ：在指定数组中

#### 正则匹配
1. bail ：失败后停止继续下一项
2. filled ：必须有内容
3. unique:table,column,except,idColumn ：数据库指定字段的值唯一
4. nullable ：可空
5. distinct ：数组值唯一（'foo.*.id' => 'distinct'）
6. confirmed ：验证两输入数据是否相同（password == password_confirmation ？）
7. ipv4 ：是否符合 IPv4 格式
8. ipv6 ：是否符合 IPv6 格式
9. present ：必须出现，数据可以为空
10. regex:pattern ：验证字段值是否符合指定的正则表达式（使用数组而非管道分隔规则）

#### [自定义验证规则](http://d.laravel-china.org/docs/5.4/validation#custom-validation-rules "http://d.laravel-china.org/docs/5.4/validation#custom-validation-rules")
在服务提供者中使用 Validator Facade 中的 extend 方法

### 验证失败
返回 $errors

### 自定义闪存的错误消息格式
在控制器中重写 `formatValidationErrors`
```` php
protected function formatValidationErrors(Validator $validator)
{
    return $validator->errors()->all();
}
````

### AJAX 请求验证
失败时生成一个包含所有错误验证的 JSON 响应，并发送一个 422 HTTP 状态码

### 表单请求

#### 创建
    php artisan make:request StoreBlogPost
新生成的类保存在 app/Http/Requests 目录下
```` php
public function rules()
{
    return [
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
    ];
}
````
#### 使用方法
```` php
// 在控制器中注入相应类名
public function store(StoreBlogPost $request)
{
    // The incoming request is valid...
}
````

#### 添加表单请求后钩子
```` php
/**
 * @param  \Illuminate\Validation\Validator  $validator
 * @return void
 */
public function withValidator($validator)
{
    $validator->after(function ($validator) {
        if ($this->somethingElseIsInvalid()) {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        }
    });
}
````

#### 授权表单请求
```` php
/**
 * 判断用户是否有权限做出此请求。
 *
 * @return bool
 */
public function authorize()
{
    $comment = Comment::find($this->route('comment'));

    return $comment && $this->user()->can('update', $comment);
}
````

#### 自定义错误消息
```` php
/**
 * 获取已定义验证规则的错误消息。
 *
 * @return array
 */
public function messages()
{
    return [
        'title.required' => 'A title is required',
        'body.required'  => 'A message is required',
    ];
}
````

### 手动创建验证请求
```` php
// 新建规则
$validator = Validator::make($request->all(), [
     'title' => 'required|unique:posts|max:255',
     'body' => 'required',
]);
// 判断
if ($validator->fails()) {
    return redirect('post/create')
        ->withErrors($validator)
        ->withInput();
}
````

#### 自动重定向
```` php
Validator::make($request->all(), [
    'title' => 'required|unique:posts|max:255',
    'body' => 'required',
])->validate();
````

#### 命名错误包：适用于单页多个表单
```` php
return redirect('register')
            ->withErrors($validator, 'login');

{{ $errors->login->first('email') }}
````

### 处理错误信息
```` php
$errors = $validator->errors();
echo $errors->first('email');

foreach ($errors->get('attachments.*') as $message) {
    //
}
````
