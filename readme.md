# 前言

DoraBox，名字起源于哆啦A梦的英文，希望DoraBox能帮助你像大雄借助哆啦A梦的百宝袋一样学习到一些东西。

![dorabox](./img/dorabox.png)

# DoraBox - 多拉盒

掌握常见漏洞攻防，快速提升渗透能力

界面很丑，学过前端，但是懒得去搞了。

作者：Vulkey_Chen

Blog：gh0st.cn

如果有建议或者问题可以发送到邮箱：admin@gh0st.cn

## DoraBox 组成

**目录结构：**

```tree
.
├── LICENSE
├── PoC #PoC存放目录
│   ├── csrf
│   │   ├── CORS
│   │   │   ├── get.php
│   │   │   ├── index.html
│   │   │   └── post.php
│   │   └── jsonp.html
│   └── race_condition
│       ├── pay_poc.py
│       └── upload_poc.py
├── class #类方法目录
│   └── function.class.php
├── code_exec #代码执行&&命令执行
│   ├── code.php
│   └── exec.php
├── conn.php
├── csrf #CSRF（客户端脚本伪造）
│   ├── jsonp.php
│   └── userinfo.php
├── docker-image.md
├── file_include #文件包含
│   ├── any_include.php
│   ├── include_1.php
│   └── txt.txt
├── file_upload #文件上传
│   ├── any_upload.php
│   ├── upload
│   │   └── test.txt
│   ├── upload_content.php
│   ├── upload_js.php
│   ├── upload_mime.php
│   └── upload_name.php
├── image.png
├── img
│   └── dorabox.png
├── index.html
├── others #其他
│   └── file_read.php
├── pentest.sql
├── race_condition #条件竞争（HTTP并发）
│   ├── key.php
│   ├── pay.php
│   ├── upload.php
│   └── uploads
│       └── test.txt
├── readme.md
├── sql_injection #SQL注入
│   ├── sql_num.php
│   ├── sql_search.php
│   └── sql_string.php
├── ssrf #SSRF（服务端请求伪造）
│   └── ssrf.php
└── xss #XSS（跨站脚本）
    ├── dom_xss.php
    ├── reflect_xss.php
    └── stored_xss.php
```

**网站结构：**

1.MySQL数据库(pentest.sql 导入到MySQL中即可)

**db_name:pentest**

| table_name | column_name                              |
| ---------- | ---------------------------------------- |
| account    | Id(int11),rest(varchar255),own(varchar255) |
| news       | id(int11),title(varchar45),content(varchar45) |

2.PHP

- conn.php 数据库配置文件
- class/function.class.php 核心功能文件
- 其他的差不多是咸鱼(开个玩笑)

大部分的功能实现是借助如下成员方法(**代码写的烂，也请忍受下 \*_\***)：

```php
public function con_function(){
		//自己造的回调
		$func_array = func_get_args();
		$name = func_get_arg(0);
		array_shift($func_array);
		return call_user_func_array($name,$func_array);
}
```



## 集合的漏洞类型

- SQL注入：数字型、字符型、搜索型
- XSS：反射型、存储型、DOM型
- 文件包含：任意、目录限制
- 文件上传：任意、JS限制、MIME限制、扩展名限制、内容限制
- 代码/命令执行：任意
- SSRF：SSRF（回显）
- 其他：条件竞争（支付&上传）、任意文件读取
- CSRF：增加CSRF读取型（JSONP劫持、CORS跨域资源读取） 

除此之外还有一些poc在项目的PoC目录中。

## Docker
[Read This](./docker.md)