## 响应

### 附加头部信息（Cookie）至响应
```` php
return response($content)
            ->header('Content-Type', $type)
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value')
            ->cookie('name', 'value', $minutes);
// 等价于
return response($content)
            ->withHeaders([
                'Content-Type' => $type,
                'X-Header-One' => 'Header Value',
                'X-Header-Two' => 'Header Value',
            ])->cookie('name', 'value', $minutes);
````

### 重定向
```` php
return redirect('index');
return redirect()->route('login', ['result' => false]); // 至路由
return redirect()->action('Controller@index'); // 至控制器

// 至视图
return response()->view('hello', $data, 200)->header('Content-Type', $type); 
return view('index');

return back()->withInput(); // 常用于表单提交失败
return redirect('dashboard')->with('status', 'Profile updated!'); // 带闪存数据
````

### JSON 响应
```` php
return response()->json([
    'name' => 'Abigail',
    'state' => 'CA'
]);

// JSONP 响应
return response()
            ->json(['name' => 'Abigail', 'state' => 'CA'])
            ->withCallback($request->input('callback'));
````

### 文件资源

#### 配置
文件：`config/filesystems.php`
***所有文件路径都是基于配置文件中的 root 目录的相对路径**

##### 公开磁盘
    php artisan storage:link
默认 `public` 磁盘使用 `local` 驱动将文件存储在 `storage/app/public` 目录下，随后可通过函数创建 URL：
```` php
$path = asset('storage/file.txt');
````

##### local 驱动
下面方法会把文件保存在 `storage/app/file.txt`
```` php
Storage::disk('local')->put('file.txt', 'Contents');
````

#### 获取
```` php
$file = $request->file('photo');
$file = $request->photo;
````

#### 检验
```` php
$request->hasFile('photo')
$request->isVaild('photo')
````

#### 信息
```` php
$path = $request->photo->path();
$extension = $request->photo->extension();

$size = Storage::size('file1.jpg');
$time = Storage::lastModified('file1.jpg');
````

#### 上传
```` php
// 第一参数为路径，此处 s3指定是亚马逊 S3 云存储
$path = $request->photo->store('photo', 's3'); // 自动生成文件名，第二参数为磁盘名称
$path = $request->photo->storeAs('photo', 'image1.jpg', 's3'); // 指定文件名

````

#### 删除
```` php
Storage::delete('file.jpg');
Storage::delete(['file1.jpg', 'file2.jpg']);
````

#### 文件内容操作
```` php
Storage::put('file.jpg', $contents);
Storage::put('file.jpg', $resource);

// 自动生成唯一文件名...
Storage::putFile('photos', new File('/path/to/photo'), 'public');
// 手动指定一个文件名...
Storage::putFileAs('photos', new File('/path/to/photo'), 'photo.jpg', 'public');

// 写入文件开头
Storage::prepend('file.log', 'Prepended Text');
// 写入文件结尾
Storage::append('file.log', 'Appended Text');

Storage::copy('old/file1.jpg', 'new/file1.jpg');
Storage::move('old/file1.jpg', 'new/file1.jpg');
````

#### 文件目录操作
```` php
// 获取文件
$files = Storage::files($directory);
$files = Storage::allFiles($directory);

// 获取单个目录内所有目录
$directories = Storage::directories($directory);
// 递归获取
$directories = Storage::allDirectories($directory);

// 创建目录
Storage::makeDirectory($directory);

// 删除目录
Storage::deleteDirectory($directory);
````

### 文件下载
```` php
return response()->download($pathToFile);
return response()->download($pathToFile, $name, $headers);
````

### 文件响应（如 PDF）
```` php
return response()->file($pathToFile);
return response()->file($pathToFile, $headers);
````

