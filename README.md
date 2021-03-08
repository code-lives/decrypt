# decrypt
接口解密

## 传递参数
```php
<?php
$data=array(
  'timestamp'=>   //时间戳
  'sign'=>  //加密后的
)
```
# new 
$apidecode = new \api\decode\apidecode();

## 这是加密
$apidecode->encode($sign,$timestamp);

## 这是解密

$apidecode->decode($sign,$timestamp);

## SECRET_KEY  PARAM_EXP_AUTH  PARAM_EXP_LENGTH 

自行配置  laravel 可以 把SECRET_KEY注释 self::SECRET_KEY 替换成 env('')
