# 糊云黑
基于**HULICORE**，现将其开源。非前后端分离项目，**MVC(Model View Controller)**架构设计理念，运行稳定性未知，PHP版本推荐7.0.0+
## 目录
- hcb
    - app 应用目录
        - core 核心目录
            - func
                - function.php 公共函数
            - common.php 数据库核心
            - route.php 路由核心
        - demo 实例目录
            - Controllers 控制器目录
                - ...
            - Models 模型目录
                - Models.php
        - plugins 插件目录
            - email 邮箱插件
                - ...
    - config 配置目录
        - config.php 总配置
        - database.php 数据库配置
        - method.php 允许请求类型配置
    - public 网站目录
        - assets 资源目录
            - css CSS目录
            - img 图片目录
            - js JS目录
        - res 资源文件目录
        - favicon.ico 图标文件
        - index.php 重定向文件
    - sql SQL目录
    - view 视图目录
        - ...
    - Hcb.php 主程序文件
## 说明
数据库文件:/sql/hcb.sql，数据库配置文件:/config/database.php，自行导入配置并使用
邮箱插件配置文件:/app/plugins/email/_config.php，自行配置用于注册账号
网页聊天机器人插件:[https://github.com/BIYUEHU/hucloudblack-plguin-robot],用于世界频道聊天
默认最高管理员账户密码:123456@gmail.com 123456

伪静态配置
```nginx
location /{
	if (!-e $request_filename) {
	   rewrite  ^(.*)$  /index.php/$1  last;
	   break;
	}
}
```