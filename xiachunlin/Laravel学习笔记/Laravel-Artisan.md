## 指点江山（artisan 命令）

### 查看已有命令
> php artisan list

**命令**                | **作用**                 |**参数**
-----------------------|--------------------------|--------
  clear-compiled       | 清除已编译好的类文件       |-
  down                 | 使该项目进入 “维护模式”    |--message[=MESSAGE] 关于 “维护模式” 的信息<br/>--retry[=RETRY] 设置重新执行命令的时间（秒）
  env                  | 查看项目所处环境（server） |-
  help                 | 输出某个命令的帮助信息     |--format=FORMAT 以一定格式存储帮助信息(txt, xml, json, or md) [默认: "txt"]<br/>--raw 输出命令原生帮助信息
  inspire              | 随机输出一条鼓励语句       |-
  list                 | 查看现有所有命令           |同 help <br/>make （类别名） 
  migrate              | 运行数据库迁移            |--database[=DATABASE] 设置使用的数据库<br/>--force 在生产环境中强制运行命令<br/>--path[=PATH] 数据迁移文件执行路径<br/>--pretend              不执行 SQL 查询<br/>--seed 同时执行数据填充<br/>--step 强制执行迁移，可单独回滚
  optimize             | 优化框架                  |--force 强制编译类文件（覆盖过时文件）<br/>--psr 不优化 Composer 的自动加载.
  serve                | 启动 server              |--host[=HOST] 主机（默认: "127.0.0.1"） 对应 /public/ <br/>--port[=PORT] 端口（默认: 8000）
  tinker               | 进入 Psy Shell           |include 开始前加载的文件名
  up                   | 退出 “维护模式”           |-


 **类别：app**          | **作用：与应用本身相关** |**参数**
-----------------------|-------------------------|--------
  app:name             | 给应用重命名             |应用新名


 **类别：auth**         | **作用：与用户授权相关** |**参数**
-----------------------|-------------------------|--------
  auth:clear-resets    | 清除过期密码，重置令牌    |密钥代理名


 **类别：cache**        | **作用：与缓存相关** |**参数**
-----------------------|-------------------------|--------
  cache:clear          | 清除应用所有缓存      |store 缓存仓库的名称（可选）
  cache:forget         | 清除某项缓存         | key 缓存仓库键名 store 缓存仓库名（可选）
  cache:table          | 为缓存数据表创建迁移 |-


 **类别：config**       | **作用：与配置相关** |**参数**
-----------------------|---------------------|--------
  config:cache         | 缓存应用配置项       |-
  config:clear         | 清除应用配置缓存      |-


 **类别：db**           | **作用：与数据库相关** |**参数**
-----------------------|-----------------------|--------
  db:seed              | 填充数据               |-
  event:generate       | 生成所有事件和监听器    |-


 **类别：key**          | **作用：与应用密钥相关** |**参数**
-----------------------|-------------------------|--------
  key:generate         |Set the application key  |-


 **类别：make**         | **作用：与生成各模块文件相关** |**参数**
-----------------------|-------------------------|--------
  make:auth            |生成用户登录注册相关视图、路由、数据表文件|--views 只生成视图文件<br/>--force 覆盖同名文件
  make:command         |生成新的命令类            |name<br/>--command[=COMMAND] 定义命令 [默认: "command:name"]
  make:controller      |生成新的控制器类          |name
  make:event           |生成新的事件类            |name
  make:job             |生成新的工作类            |name<br/>--sync 同时设置为同步任务
  make:listener        |生成新的监听器类          |name<br/>-e, --event=EVENT     监听的事件名<br/>--queued 设置事件类排队
  make:mail            |生成新的邮件类            |name<br/>-f, --force<br/>-m, --markdown[=MARKDOWN]
  make:middleware      |生成新的中间件类          |name
  make:migration       |生成新的数据表迁移类      |name<br/>--create[=CREATE] 同时设置创建的数据表名<br/>--table[=TABLE] 迁移的表名<br/>--path[=PATH]
  make:model           |生成新的 Eloquent 模型类 |name<br/>-f, --force<br/>-m, --migration<br/>-c, --controller 同时创建控制器类<br/>-r, --resource 指明创建的控制器类为资源控制器类
  make:notification    |生成新的通知类           |name<br/>-f, --force<br/>-m, -markdown[=MARKDOWN]
  make:policy          |生成新的策略类           |name<br/>-m, --model[=MODEL] 指定对应模型类
  make:provider        |生成新的服务提供者类      |name
  make:request         |生成新的请求类           |name
  make:seeder          |生成新的数据填充器        |name（~Seeder）
  make:test            |生成新的测试类           |name（~Test）<br/>--unit 设置为单元测试类

**类别：migrate**       | **作用：与数据库迁移相关**|**参数**
-----------------------|-------------------------|--------
  migrate:install      |执行数据库迁移            |--database[=DATABASE]
  migrate:refresh      |重新迁移数据库            |--database[=DATABASE]<br/>--force<br/>--path[=PATH]<br/>--seed 指定数据填充器<br/>--seeder[=SEEDER] 数据填充器名<br/> --step[=STEP].
  migrate:reset        |回滚数据库                |--database[=DATABASE]<br/>--force<br/>--path[=PATH]<br/>--pretend
  migrate:rollback     |回滚一次命令              |--database[=DATABASE]<br/>--force<br/>--path[=PATH]<br/>--pretend<br/>--step   
  migrate:status       |查看数据库迁移状态         |--database[=DATABASE]<br/>--path[=PATH]


**类别：notifications** | **作用：与通知相关**|**参数**
-----------------------|--------------------|--------
  notifications:table  |为通知模块创建数据表  |-


 **类别：queue**        | **作用：与队列相关** |**参数**
-----------------------|-------------------------|--------
  queue:failed         |查看所有失败的队列任务     |-
  queue:failed-table   |创建失败队列任务数据表     |-
  queue:flush          |删除所有失败的队列任务     |-
  queue:forget         |删除一个失败的队列任务     |id 任务（job） ID
  queue:listen         |监听队列                  |connection 连接名<br/>--delay[=DELAY] 任务失败后延迟几秒 [默认: "0"]<br/>--force 即使在 “维护模型” 也强制运行<br/>--memory[=MEMORY] 内存限度 [默认: "128"]<br/>--queue[=QUEUE] 指定监听的队列<br/>--sleep[=SLEEP] 当队列中无任务时需要等待几秒 [默认: "3"]<br/>--timeout[=TIMEOUT]  子进程可运行秒数 [默认: "60"]<br/>--tries[=TRIES] 任务失败后重新尝试的次数 [默认: "0"]
  queue:restart        |当前任务结束后，重启队列守护进程 |-
  queue:retry          |重启一个失败的队列任务     |id 失败任务的 ID
  queue:table          |创建队列任务数据表         |-
  queue:work           |守护进程开始处理队列任务的工作|connection 连接名<br/>--daemon 守护进程<br/>--once 只运行下一个任务<br/>其他同 queue:listen


 **类别：route**        | **作用：与路由相关** |**参数**
-----------------------|---------------------|--------
  route:cache          |生成路由缓存          |-
  route:clear          |清除缓存的路由文件     |-
  route:list           |列出所有已经注册的路由 |--method[=METHOD] 请求方法<br/>--name[=NAME] 指定路由<br/>--path[=PATH]


 **类别：schedule**     | **作用：与任务相关** |**参数**
-----------------------|---------------------|--------
  schedule:run         |执行预定任务          |-


 **类别：session**      | **作用：与 session 相关** |**参数**
-----------------------|--------------------------|--------
  session:table        |为 session 模块创建数据表   |-


 **类别：storage**      | **作用：与文件存储相关** |**参数**
-----------------------|-------------------------|--------
  storage:link         |创建软链接 "public/storage" <=> "storage/app/public"|-


 **类别：vendor**       | **作用：与扩展包相关** |**参数**
-----------------------|-----------------------|--------
  vendor:publish       |发布扩展包              |--force<br/>--provider[=PROVIDER]  服务提供者<br/>--tag[=TAG] 标签


 **类别：view**         | **作用：与视图相关** |**参数**
-----------------------|----------------------|--------
  view:clear           |清除所有已编译的视图文件|-


#### PS
1. **-f 或 --force** 覆盖同名文件
2. **name** 对应类名
3. **-m, --markdown[=MARKDOWN]** 同时生成 Markdown 模板文件
4. **--database[=DATABASE]** 指定数据库
5. **--pretend** 不执行 SQL 查询
6. **--path[=PATH]** 执行文件路径
7. **--step** 回滚步数
#### 命令公有第一参数（设置）
````
Options:
  -h, --help            # 输出帮助信息
  -q, --quiet           # 不输入任何信息
  -V, --version         # 输出应用版本
      --ansi            # ANSI 编码输出
      --no-ansi         # 禁止 ANSI 编码输出
  -n, --no-interaction  # 不回应任何问题
      --env[=ENV]       # 所处环境配置
  -v|vv|vvv, --verbose  # Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
````
