最近在部署自己的靶场(Dorabox 链接：https://github.com/gh0stkey/DoraBox) 在Docker上，虽然以前学过但是没有真正的自己去部署，实际操作还是遇到了很多坑。

首先我pull下来的是tutum/lamp，当我创建容器的时候，我发现了run.sh(当创建容器后运行)这个坑，对其进行了修改；还有一个坑就是，当我commit容器为镜像，再从这个镜像中创建容器的时候发现Mysql数据没有存留，所以我在run.sh内写入了 `mysql < /var/www/html/pentest.sql` 这个语句，当创建时自动导入pentest.sql文件，这样我就可以做到数据初始化了。

假回滚：
一个脚本定时进行回滚（初始化）：
```bash
#!/bin/bash
while true
do
	echo "----------[ Starting ]----------"
	docker container kill dorabox
	docker container rm dorabox
	docker run -d --name dorabox -p 8080:80 dorabox:ghost
	echo "----------[ Finished ]----------"
	sleep 10m
done
```
修改sleep 10m为你想要做的定时时间（**别忘记运行的时候使用root权限**）
如何获取到我这个Docker镜像？
运行这条命令：
```bash
$ sudo docker pull registry.cn-qingdao.aliyuncs.com/dorabox/dorabox:lastest
```
接下来你可以运行：
```bash
$ sudo docker run -d --name dorabox -p 8080:80 dorabox:lastest
$ sudo ./rollback.sh
```
这时候你在本地的8080端口就运行这DoraBox的web服务。

