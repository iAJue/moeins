<!doctype html>
<html class="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{config('web.description')}}">
    <meta name="keywords" content="{{config('web.keywords')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{config('web.siteinfo')}}</title>
    <meta name="apple-mobile-web-app-title" content="阿珏博客">
    <meta name="generator" content="萌音影视">

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp">

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="128x128" href="{{asset('app-icon128x128@2x.ico')}}">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI">
    <link rel="apple-touch-icon-precomposed" href="{{asset('app-icon72x72@2x.ico')}}">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="{{asset('app-icon72x72@2x.ico')}}">
    <meta name="msapplication-TileColor" content="#0e90d2">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    
    <link rel="canonical" href="http://www.example.com/">
    
    <link rel="stylesheet" href="https://cdn.bootcss.com/amazeui/2.7.2/css/amazeui.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
<body>

<header class="am-topbar">
    <div class="am-container">
    <h1 class="am-topbar-brand hover-bounce">
        <a href="/" class="logo">
            <img src="{{asset('images/logo.png')}}">
        </a>
    </h1>
  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
        <li><a href="{{url('/')}}">首页</a></li>
        <li><a href="{{url('dianshi/list')}}">电视剧</a></li>
        <li><a href="{{url('dianying/list')}}">电影</a></li>
        <li><a href="{{url('dongman/list')}}">动漫</a></li>
        <li><a href="{{url('zongyi/list')}}">综艺</a></li>
        <li class="am-dropdown" data-am-dropdown>
            <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                更多 <span class="am-icon-caret-down"></span>
            </a>
            <ul class="am-dropdown-content">
            @foreach(config('web.links') as $k =>$v)
            <li><a href="{{$v}}" target="_blank">{{$k}}</a></li>
            @endforeach
            </ul>
        </li>
    </ul>
    <div class="am-topbar-right">
        <form class="am-topbar-form am-topbar-left am-form-inline" role="search" action="{{url('search')}}">
            <div class="am-input-group am-input-group-success am-input-group-sm">
                <input name="wd" type="text" class="am-form-field" placeholder="搜索" required>
                <span class="am-input-group-btn">
                    <button class="am-btn am-btn-success" type="submit">
                        <span class="am-icon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <div id="show-history-dropdown" class="am-dropdown" data-am-dropdown="{boundary: '.am-topbar'}">
            <button id="show-history" class="am-btn am-btn-success am-topbar-btn am-btn-sm am-dropdown-toggle" data-am-dropdown-toggle>
                观看记录 <span class="am-icon-caret-down"></span>
            </button>
            <ul id="history-list" class="am-dropdown-content">
                <li><a href="javascript:;">暂无播放记录</a></li>
            </ul>
        </div>
    </div>
  </div>
</div>
</header>

<div class="am-container">
    @yield('content')
</div>

<div class="eb-foot">
    <div class="am-container">
        <div class="eb-foot-wrap g-clear">
            <div class="eb-foot-left">
                <p><img src="{{asset('images/logo.png')}}"></p>
                <p>Copyright © {{config('web.title')}}. All Rights Reserved. {!!config('web.p')!!}</p>
                <p>{!!config('web.footerinfo')!!}</p>
            </div>
            <div class="eb-foot-right g-clear">
            @foreach (config('web.info') as $key => $value)
                <dl>
                    <dt>{{$key}}</dt>
                @foreach ($value as $k => $v)
                    <dd><a href="{{$v}}" target="_blank">{{$k}}</a></dd>
                @endforeach
                </dl>
            @endforeach
            </div>
        </div>  
    </div>    
</div>
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
    <a href="#top" title="滚回顶部">
        <i class="am-gotop-icon am-icon-arrow-up"></i>
    </a>
</div>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="https://cdn.bootcss.com/amazeui/2.7.2/js/amazeui.min.js"></script>
<script src="https://cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script src="https://cdn.bootcss.com/layer/3.1.0/layer.js"></script>
<script src="{{asset('js/ckplayer.min.js')}}"></script>
<script type="text/javascript">
var store = $.AMUI.store;
$(function() {
    @yield('js')
    $("#show-history").click(function() {
        if (store.enabled) {
            var histemp = store.get('history')? store.get('history'): [];
            if(histemp.length > 0) {
                $("#history-list").html('');
                for(var i = 0; i < histemp.length; i++) {
                    $("#history-list").append('<li><a href="'+histemp[i].url+'">'+histemp[i].name+'</a></li>');
                }
                $("#history-list").append('<li><a href="javascript:;" onclick="javascript:clearHistory();"><span class="am-text-warning am-text-xs">清空播放记录</span></a></li>');
            }
        }else{
            layer.msg('抱歉，当前浏览器不支持保存记录！', {icon: 5});
        }
    });
});
function clearHistory() {
    $("#show-history-dropdown").dropdown("close");
    store.remove('history');
    layer.msg("播放记录已清空");
    $("#history-list").html('<li><a href="javascript:;">暂无播放记录</a></li>');
}
</script>
</body>
</html>