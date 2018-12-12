## 数据库

### 配置
文件： `config/database.php`

### 读写分离
```` php
'mysql' => [
    'read' => [
        'host' => '192.168.1.1',
    ],
    'write' => [
        'host' => '196.168.1.2'
    ],
    'driver'    => 'mysql',
    'database'  => 'database',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
],
````

### 使用多数据库连接
```` php
$users = DB::connection('foo')->select(...);

$pdo = DB::connection()->getPdo();
````

### 运行原生 SQL 语句
使用 DB facade 来执行查询。 DB facade 提供了 select 、 update 、 insert 、 delete 和 statement 的查询方法
```` php
$results = DB::select('select * from users where id = :id', ['id' => 1]);

DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);

$affected = DB::update('update users set votes = 100 where name = ?', ['John']);

$deleted = DB::delete('delete from users');

DB::statement('drop table users');
````


#### 监听查询时间
服务容器中注册方法
```` php
DB::listen(function ($query) {
     // $query->sql
     // $query->bindings
     // $query->time
});
````

### 事务
```` php
DB::transaction(function () {
    DB::table('users')->update(['votes' => 1]);

    DB::table('posts')->delete();
}, 5);// 若发生死锁，事务重复 5 次
````

#### 手动操作事务
```` php
DB::beginTransaction();

DB::rollBack();

DB::commit();
````


## 数据库请求构建器
```` php
$users = DB::table('users')->get(); // 一条记录
$email = DB::table('users')->where('name', 'John')->first()->value('email'); // 一个值

$roles = DB::table('roles')->pluck('title', 'name'); // 取一列的键值对数组
foreach ($roles as $name => $title) {
    echo $title;
}
````

### 结果分块
```` php

DB::table('users')->orderBy('id')->chunk(100, function ($users) {
    foreach ($users as $user) {
        //
    }

    return false; // 停止对后续分块处理
});

````


### 聚合方法
1. count()
2. max('field')
3. min('field')
4. avg('field')
5. sum('field')


### 原始表达式
```` php
$users = DB::table('users')
         ->select(DB::raw('count(*) as user_count, status'))
         ->where('status', '<>', 1)
         ->groupBy('status')
         ->get();
````

### SELECT
```` php
$users = DB::table('users')->select('name', 'email as user_email')->get();
$users = DB::table('users')->distinct()->get();

$query = DB::table('users')->select('name');
$users = $query->addSelect('age')->get();
````

### Insert
```` php
DB::table('users')->insert(
    ['email' => 'john@example.com', 'votes' => 0],
);

$id = DB::table('users')->insertGetId(
    ['email' => 'john@example.com', 'votes' => 0]
);
````

### Update
```` php
DB::table('users')
            ->where('id', 1)
            ->update(['votes' => 1]);
// update Json
DB::table('users')
            ->where('id', 1)
            ->update(['options->enabled' => true]);

// 对数字字段处理
DB::table('users')->increment('votes');
DB::table('users')->increment('votes', 5);
DB::table('users')->decrement('votes');
DB::table('users')->decrement('votes', 5);
// 同时更新其他字段
DB::table('users')->increment('votes', 1, ['name' => 'John']);
````

### Delete
```` php
DB::table('users')->where('votes', '>', 100)->delete();
DB::table('users')->truncate();
````

### [Join](http://d.laravel-china.org/docs/5.4/queries#joins "http://d.laravel-china.org/docs/5.4/queries#joins")

### Union
```` php
$first = DB::table('users')
            ->whereNull('first_name');

$users = DB::table('users')
            ->whereNull('last_name')
            ->union($first)
            ->get();
````

### Where
```` php
$users = DB::table('users')->where('votes', '=', 100)->get();
$users = DB::table('users')->where('votes', 100)->get();


$users = DB::table('users')
                ->where('votes', '>=', 100)
                ->get();
$users = DB::table('users')
                ->where('name', 'like', 'T%')
                ->get();

$users = DB::table('users')->where([
    ['status', '=', '1'],
    ['subscribed', '<>', '1'],
])->get();

// OR
$users = DB::table('users')
                    ->where('votes', '>', 100)
                    ->orWhere('name', 'John')
                    ->get();

$users = DB::table('users')
                    ->whereBetween('votes', [1, 100])->get();
// 同理还有 whereNotBetween、 whereIn、 whereNotIn、 whereNull、 whereNotNull
// 关于日期有 whereDate、 whereMonth、 whereDay、 whereYea

// 对比两个列的数据
$users = DB::table('users')
                ->whereColumn(['first_name', '>', 'last_name'])
                ->get();
````

### JSON 查询
```` php
$users = DB::table('users')
                ->where('preferences->dining->meal', 'salad')
                ->get();
````
### 其他
函数 | 作用 | 参数
----|----|----
orderBy|排序|字段，'asc'（无则默认）或'desc'
latest/oldest | 按日期对查询结果排序，需要 created_at 列 | 无
inRandomOrder | 随机排序 | 无
groupBy | 分组 | 字段
having / havingRaw | 与 where 类似 | ...
skip/offset | 跳过结果数 | 条数
take/limit | 取结果数 | 条数


### 另类条件查询
希望某个值为 true 时才执行查询
```` php
$role = $request->input('role');

$users = DB::table('users')
                ->when($role, function ($query) use ($role) {
                    return $query->where('role_id', $role);
                })
                ->get();
````


### 悲观锁
共享锁：可防止选中的数据列被篡改，直到事务被提交为止
```` php
DB::table('users')->where('votes', '>', 100)->sharedLock()->get();
DB::table('users')->where('votes', '>', 100)->lockForUpdate()->get();
````

## 分页

```` php
$users = DB::table('users')->paginate(15);

$users = DB::table('users')->simplePaginate(15);

$users = User::where('votes', '>', 100)->paginate(15);
````

### 显示结果
```` php
// links 方法将会渲染结果集中的其他页链接
<div class="container">
    @foreach ($users as $user)
        {{ $user->name }}
    @endforeach
</div>

{{ $users->links() }} 

// withPath 方法允许你在生成分页链接时自定义 URI
Route::get('users', function () {
    $users = App\User::paginate(15);

    $users->withPath('custom/url');

});

// 使用 append 方法附加查询参数到分页链接
{{ $users->appends(['sort' => 'votes'])->links() }} 中

// 附加「哈希片段」到分页器的链接中。例如，要附加 #foo 到每个分页链接的末尾
{{ $users->fragment('foo')->links() }} 

// 将结果转换为 JSON
Route::get('users', function () {
    return App\User::paginate();
});
// 返回的 JSON 对象
{
   "total": 50,
   "per_page": 15,
   "current_page": 1,
   "last_page": 4,
   "next_page_url": "http://laravel.app?page=2",
   "prev_page_url": null,
   "from": 1,
   "to": 15,
   "data":[
        {
            // Result Object
        },
        {
            // Result Object
        }
   ]
}

// 分页信息
$results->count()
$results->currentPage()
$results->firstItem()
$results->hasMorePages()
$results->lastItem()
$results->lastPage() // 当使用 simplePagination 时无效
$results->nextPageUrl()
$results->perPage()
$results->previousPageUrl()
$results->total() // 当使用 simplePagination 时无效
$results->url($page)
````


## 数据库迁移

### 字段
设置字段 | 说明
--------|-----
bigIncrements('id');|	递增 ID（主键），相当于「UNSIGNED BIG INTEGER」型态。
bigInteger('votes');|	相当于 BIGINT 型态。
binary('data');|	相当于 BLOB 型态。
boolean('confirmed');|	相当于 BOOLEAN 型态。
char('name', 4);|	相当于 CHAR 型态，并带有长度。
date('created_at');|	相当于 DATE 型态
dateTime('created_at');	|相当于 DATETIME 型态。
dateTimeTz('created_at');|	DATETIME (带时区) 形态
decimal('amount', 5, 2);|	相当于 DECIMAL 型态，并带有精度与基数。
double('column', 15, 8);|	相当于 DOUBLE 型态，总共有 15 位数，在小数点后面有 8 位数。
enum('choices', ['foo', 'bar']);|	相当于 ENUM 型态。
float('amount', 8, 2);|	相当于 FLOAT 型态，总共有 8 位数，在小数点后面有 2 位数。
increments('id');|	递增的 ID (主键)，使用相当于「UNSIGNED INTEGER」的型态。
integer('votes');|	相当于 INTEGER 型态。
ipAddress('visitor');|	相当于 IP 地址形态。
json('options');|	相当于 JSON 型态。
jsonb('options');|	相当于 JSONB 型态。
longText('description');|	相当于 LONGTEXT 型态。
macAddress('device');|	相当于 MAC 地址形态。
mediumIncrements('id');	|递增 ID (主键) ，相当于「UNSIGNED MEDIUM INTEGER」型态。
mediumInteger('numbers');|	相当于 MEDIUMINT 型态。
mediumText('description');	|相当于 MEDIUMTEXT 型态。
morphs('taggable');|	加入整数 taggable_id 与字符串 taggable_type。
nullableMorphs('taggable');	|与 morphs() 字段相同，但允许为NULL。
nullableTimestamps();|	与 timestamps() 相同，但允许为 NULL。
rememberToken();|	加入 remember_token 并使用 VARCHAR(100) NULL。
smallIncrements('id');|	递增 ID (主键) ，相当于「UNSIGNED SMALL INTEGER」型态。
smallInteger('votes');|	相当于 SMALLINT 型态。
softDeletes();|	加入 deleted_at 字段用于软删除操作。
string('email');|	相当于 VARCHAR 型态。
string('name', 100);|	相当于 VARCHAR 型态，并带有长度。
text('description');|	相当于 TEXT 型态。
time('sunrise');|	相当于 TIME 型态。
timeTz('sunrise');|	相当于 TIME (带时区) 形态。
tinyInteger('numbers');|	相当于 TINYINT 型态。
timestamp('added_on');|	相当于 TIMESTAMP 型态。
timestampTz('added_on');|	相当于 TIMESTAMP (带时区) 形态。
timestamps();|	加入 created_at 和 updated_at 字段。
timestampsTz();|	加入 created_at and updated_at (带时区) 字段，并允许为NULL。
unsignedBigInteger('votes');|	相当于 Unsigned BIGINT 型态。
unsignedInteger('votes');|	相当于 Unsigned INT 型态。
unsignedMediumInteger('votes');|	相当于 Unsigned MEDIUMINT 型态。
unsignedSmallInteger('votes');|	相当于 Unsigned SMALLINT 型态。
unsignedTinyInteger('votes');|	相当于 Unsigned TINYINT 型态。
uuid('id');|	相当于 UUID 型态。


### 修饰
字段修饰 | 说明
--------|------
->after('column')|	将此字段放置在其它字段「之后」（仅限 MySQL）
->comment('my comment')|	增加注释
->default($value)|	为此字段指定「默认」值
->first()|	将此字段放置在数据表的「首位」（仅限 MySQL）
->nullable()|	此字段允许写入 NULL 值
->storedAs($expression)|	创建一个存储的生成字段 （仅限 MySQL）
->unsigned()|	设置 integer 字段为 UNSIGNED
->virtualAs($expression)|	创建一个虚拟的生成字段 （仅限 MySQL）

### 索引
设置索引 | 说明
--------|------
->primary('id');|	加入主键。
->primary(['first', 'last']);|	加入复合键。
->unique('email');|	加入唯一索引。
->unique('state', 'my_index_name');|	自定义索引名称。
->unique(['first', 'last']);|	加入复合唯一键。
->index('state');|	加入基本索引。

### 外键约束
```` php
Schema::enableForeignKeyConstraints();

Schema::disableForeignKeyConstraints();
````

### *修改字段模块
> composer require doctrine/dbal


## 数据填充

### run()
```` php
DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

// 模型工厂
factory(App\User::class, 50)->create()->each(function ($u) {
        $u->posts()->save(factory(App\Post::class)->make());
    });

// 运行其他 seeder
$this->call(UsersTableSeeder::class);
````


## Redis
> composer require predis/predis

### 集群配置
```` php
'redis' => [

    'client' => 'predis',

	// 使用 redis 原生集群
	'options' => [
	        'cluster' => 'redis',
	    ],

    'clusters' => [
        'default' => [
            [
                'host' => env('REDIS_HOST', 'localhost'),
                'password' => env('REDIS_PASSWORD', null),
                'port' => env('REDIS_PORT', 6379),
                'database' => 0,
            ],
        ],
    ],

],
````

### 使用
```` php
Redis::set('name', 'Taylor');

$values = Redis::lrange('names', 5, 10);

$values = Redis::command('lrange', ['name', 5, 10]);
````


