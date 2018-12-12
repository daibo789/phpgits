## Collection 集合

### 构造方法
Collection collection($arr);

### 方法列表（Collection $col）
1. Array all() // 返回底层数组
2. int $col->avg($key = null) // 返回所有(指定)项平均值
3. Collection[] chunk($size) // 拆分集合(子集合的最大项数)
4. Collection collapse($col, ...) // 类似 array_merge()
5. Collection combine($values) // 集合值作为键名，参数数组作为键值
6. boolean contains($arrOrValue) // 判断集合中是否存在该值
7. Collection count() // 类似 count()
8. Collection diff($colOrArr) // 类似 array_diff()
9. Collection diffKeys($colOrArr) // 类似 array_diff_key()
10. void each(function($item, $key){}) // 遍历集合中的项目，并将之传入回调函数；回调函数中返回 false 以中断循环
11. boolean every(function($value, $key){} == null) // 判断集合中每一个元素是否都符合指定条件
12. Collection except($keys) // 返回集合中除了指定键以外的所有项目；同 only 相反
13. Collection filter(function($value, $key)){return true;// true 则保留} // 筛选集合；与 reject 相反
14. Object first(function($value, $key){}) // 返回第一个满足条件的项
15. Collection flatMap(function($values){}) // 对集合内所有子集遍历执行回调，并在最后转为一维集合
16. Collection flatten($depth = MAX) // 将多维集合转为一维集合，可选深度
17. Collection flip() // 键名与键值互换
18. void forget($key) // 移除项
19. Collection forPage($page, $pages) // 返回可用来在指定页码上所显示项目的新集合。这个方法第一个参数是页码数，第二个参数是每页显示的个数。
20. Object get($key, $defaultOrFunction = null) // 取项值
21. Collection groupBy($keyOrFunction) // 按键名（回调函数 function($item, $key){}）分组。该函数应该返回你希望用来分组的键的值。
22. boolean has() // 是否含有指定键名
23. Collection implode($keyOrLinkChar, $linkChar = null) // 同 implode()
24. Collection intersect($colOrArr) // 返回交集
25. boolean isEmpty() // 是否为空
26. Collection keyBy($keyOrFunction) // 以指定键的值（回调函数 function($item){}）作为集合项目的键
27. Collection keys() // 类似 array_keys()
28. Object last(function($value, $key){} == null) // 返回集合最后一个通过测试的元素
29. Collection map() // 类似 array_map()
30. Collection mapWithKeys(function($item){}) // 遍历整个集合并将每一个数值传入回调函数。回调函数返回包含一个键值对的关联数组
31. Object max($key = null)
32. Collection merge() // 类似 array_merge()
33. Object min($key = null)
34. Collection nth($n, $offset = null) // 由每隔第 n 个元素组成一个新的集合
35. Collection only($keys)
36. Array partition(function($i){}) // 结合 PHP 中的 list 方法来分开符合指定条件的元素以及那些不符合指定条件的元素
37. Collection pipe(function($col){}) // 将集合传给回调函数并返回结果
38. Collection pluck($key, $keyNew) // 获取集合中指定「键」所有对应的值
39. Object pop()
40. void prepend($value, $key = null) // 在集合前面增加一项
41. Collection pull($key) // 类似 pop()
42. void push($value) // 在集合后面添加一个元素
43. void put($key, $value) // 在集合内设置一个「键/值」
44. Obejct random($size = 1) // 类似 array_rand()
45. Object reduce(function($carry, $item){}, $value = null) // reduce 方法将集合缩减到单个数值，该方法会将每次迭代的结果传入到下一次迭代（$value 为初始值）
46. Collection reject()
47. Collection reverse()
48. Object search() // 类似 array_search()
49. Object shift()
50. Collection shuffle()
51. COllection slice($size)
52. Collection sort()
53. Collection sortBy()
54. Collection sortByDesc()
55. Collection splice($start, $size = null, $newItem)
56. Collection split($numOfGroups)
57. int sum($key = null)
58. Collection take($size) // $size 为负数时，从集合后面取
59. Array toArray()
60. Json toJson()
61. Collection transform(function ($item, $key){}) // 遍历集合并对集合内每一个项目调用指定的回调函数。集合的项目将会被回调函数返回的数值取代掉
62. Collection union() // 将给定的数组合并到集合中，如果数组中含有与集合一样的「键」，集合的键值会被保留
63. Collection unique($keyOfFunction) // （function ($item) {}）
64. Collection values()
65. Collection when($bool, function($col){}) // 当第一个参数运算结果为 true 的时候，会执行第二个参数传入的闭包
66. Collection where($key, $value) // 以一对指定的「键／数值」筛选集合
67. Collection whereStrict() // 比 where() 更严格匹配
68. Collection whereIn($key, $values)
69. Collection whereInStrict() // 比 whereIn() 更严格匹配
70. Collection zip($arr) // 将集合与指定数组相同索引的值合并在一起