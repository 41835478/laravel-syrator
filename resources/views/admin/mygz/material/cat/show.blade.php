<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>layer</title>
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ _asset(ref('bootstrap.css')) }}" />
    <link href="{{ _asset('back/dist/css/syrator.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="layerForm" style="margin: 10px;">
    <div class="box-header with-border">
      <p>分类详情</p>
      <div class="basic_info bg-info">
         <ul>
            <li>名称：<span class="text-primary">{{ $catalog->name }}</span></li>
            <li>关键字：<span class="text-primary">{{ $catalog->keywords }}</span></li>
            <li>描述：<span class="text-primary">{{ $catalog->description }}</span></li>
            <li>上级分类：<span class="text-primary">{{ $catalog->pid_name }}</span></li>
            <li>排序：<b>{{ $catalog->sort_num }}</b></li>
            <li>是否显示：<b>{{ ($catalog->is_show === 0) ? '隐藏' : '显示' }}</b></li>
            </li>
        </ul>
      </div>
    </div><!-- /.box-header -->
</div>
</body>
</html>
