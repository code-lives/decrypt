# decrypt
用于前端和后台定义接口加密规则 进行解密
# 举例
```php

1.前端和后端定义 一个公用的加密参数 SECRET_KEY='123'

2.前端 请求接口header 传参

    sign         md5(SECRET_KEY+timestamp) 
    
    timestamp    时间戳
    
3.后端接收 timestamp 拿着后端定义好的 SECRET_KEY 进行加密 md5(SECRET_KEY+timestamp) 

4.加密后进行 和前端加密的sign 进行对比。

```
## 这是加密

```php

$apidecode = new \api\decode\apidecode($secret_key);

$sign = $apidecode->encode();

$sign=array('sign' => , 'time' => );

```
## 这是解密
```php

$apidecode = new \api\decode\apidecode($secret_key);

$status = $apidecode->decode($sign, $timestamp);

if(!$status){

    exit('非法操作');
    
}

```
