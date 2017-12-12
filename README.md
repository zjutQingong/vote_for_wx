# vote_for_wx
这个项目目的在于实现一个在微信端的投票系统
[API文档](http://101.132.163.56/showdoc/index.php?s=/1)
# 一. [投票系统](https://zjutqingong.github.io/vote_for_wx/)
## 1.1 入口：微信菜单
> 获取用户ID
## 1.2 交互界面：移动端
### 界面展示
> * 参赛选手照片
> * 参赛选手个人信息
> * 参赛选手宣言
> * 得票情况(提议:在页面底部使用图形化形式展示)
### 接口设计
#### 1. 投票接口
> 针对不同用户显示不同效果
>> 获取投票用户的唯一标识符并与数据库内相应表比对，若已投票则使投票接口处于不可投票状态
>> 若未投票则可投票
#### 返回json格式的数据
```
    {}
```
# 二. [投票系统后台管理](https://zjutqingong.github.io/vote_for_wx/)
## Web端：
### 登陆界面(简单起见只允许一位系统管理员，不可增加管理员)
### 管理界面：web端
> 1. 功能：针对参赛选手的增删改查的功能
> 接口设计:
>> 增:
```
    [函数名]();
```
>> 删除:
```
    [函数名]();
```
>> 改:
```
    [函数名]();
```
>> 查:
```
    [函数名]();
```
> 通过向后台发送请求实现,请求时发送json格式的数据
```
    {}
```
> 2. 原则：界面简约，操作方便
# 三. 数据存储：数据库
## 数据表设计
> * 参赛选手表
>> + 选手照片
>> + 选手个人信息
>> + 选手宣言
>> + 选手得票数
> * 参与投票的用户表
>> + 唯一标识符
> * 系统管理员信息
>> + 账号

# 四. 任务划分：
> 1. 投票系统移动端页面制作
> 2. 投票系统后台管理页面制作
> 3. 数据库表的设计
> 4. 后端开发
