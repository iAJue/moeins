![](public/images/logo.png)

[Blog](https://www.52ecy.cn) | [演示站](https://www.moeins.cn) | [QQ群](http://shang.qq.com/wpa/qunwpa?idkey=618c7f3214a5c5ed06c9343a395371a8b27318e5190491bf7283fbf7468e35d7)

基于优雅的 laravel 框架和一点都不妹子的 妹子UI 的在线影视应用

![](https://ws1.sinaimg.cn/large/0072Vf1ply1fvlkidzljxj310y0qb4qp.jpg)
![](https://ws3.sinaimg.cn/large/0072Vf1ply1fvlkieaeelj310q0q27wh.jpg)

#### 作者有话要说
虽然在线影视网上也是遍地都是，但这并不影响我自个写一个，这样以后自己看番也方便，毕竟自己动手才能丰衣足食，又能学习到新的知识，岂不美哉。

页面设计参考了部分网站。影视资源均来自网上，如有侵权，请及时联系我们。

让我们一起抛弃那些ex的60秒广告吧~

* 无数据库、无后台模式，仅只有一个配置文件(`config/web.php`)
* 无广告，支持vip解析，官方源，速度快，多频道，多分类

To-do:

* - [ ] 独立的频道首页
* - [ ] 电视台直播
* - [ ] 多解析接口
* - [ ] 待添加...

#### 赞助专享版

另外这是一个双版本应用，就是它会有两个不同的版本，赞助版基于普通版的优化而来，在功能和性能上做了很大提升，大大加快运行速度，并且保持优先的更新.

* 那么，问题来了，如何获得赞助专享版呢？

你可以在 [这里](https://github.com/178146582/qr#author) 或者 [这里](https://pay.52ecy.cn) 对项目赞助58元以上即可获得

当然，如果项目对你有帮助，或者你有需要，都可以选择赞助我们，哪怕一分也是爱

我想没有一个人写开源项目是为了牟利而写，毕竟它还没有去砖厂搬一天砖赚的多。


安装需求
------------
* LNMP/AMP With PHP5.6+
* curl、OpenSSL扩展
* Composer


通过Composer安装主程序
------------
#### 1. 使用composer安装moeins
```
$ composer create-project a-jue/moeins
```

```
#等待安装依赖库后，会自动执行安装脚本
#出现如下提示表示安装完成

> Illuminate\Foundation\ComposerScripts::postInstall
> php artisan optimize
Generating optimized class loader
The compiled services file has been removed.
> php artisan key:generate
Application key [base64:Hx0I9UUQg7OyIz8lpDYG6Y/gW1uxS760ERdWvGG2jyQ=] set successfully.

```

#### 2.目录权限
将`public` 子目录设置为对外公开的web目录

#### 3.URL重写
对于Apache服务器，项目目录下的`.htaccess`已经配置好重写规则，如有需求酌情修改.
对于Nginx服务器，以下是一个可供参考的配置：
```
location / {  
	try_files $uri $uri/ /index.php$is_args$query_string;  
}  
```

#### 4.完成
* 重命名`.env.example`为`.env`
* 给本项目一个Star~
* 访问你的`域名`即可


通过Git安装
------------
#### 1. Clone本项目
```
git clone https://github.com/178146582/moeins.git
```
#### 2.composer安装扩展包

```
composer install
```

#### 3.PHP执行以下命令 
```
php -r "file_exists('.env') || copy('.env.example', '.env');"

php artisan key:generate
```

#### 4.从"通过Composer安装"的第二步继续

许可证
------------
GPLV3
