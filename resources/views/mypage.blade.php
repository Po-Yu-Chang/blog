<!DOCTYPE html>
<html>
<head>
    <title>我的頁面</title>
</head>
<body>
<h1>HI~歡迎來到我的頁面</h1>
<p>{{ $var1 }}
    @if($var1=='京城五')
        說你好
    @endif
</p>
<p>{{ $var2 }}</p>
<p>{{ $var3 }}</p>
<ul>
    <?php foreach($orders as $order): ?>
    <li><?=$order->name;?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>