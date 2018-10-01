@extends('layouts.app')

@section('title', config('web.title'))

@section('content')


<div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{"animation":"slide","slideshow":true,"controlNav":false}' >
  <ul class="am-slides">
      @for ($i = 0;$i < 5; $i++)
      <li>
        <a href="{{url($slider[2][$i])}}">
          <img src="{{$slider[1][$i]}}">
          <div class="am-slider-desc">{{$slider[3][$i]}}<br>{{$slider[4][$i]}}</div>
        </a>
      </li>
    @endfor
  </ul>
</div>

<div class="am-u-sm-12 am-u-lg-9">
<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-no-layout">
    <h2 class="am-titlebar-title ">
        电视剧
    </h2>
</div>
<div class="s-tab-main">
    <ul class="am-avg-lg-5 am-thumbnails">
    @for($i = 0; $i < 20; $i++)
        <li>
            <a href="{{url($res[1][$i])}}" target="_blank">
                <div class="g-playicon dianshi">
                    <img src="{{$res[2][$i]}}">
                    <span class="hint">{{$res[3][$i]}}</span>
                </div>
                <div class="detail">
                    <p class="title">
                        <span class="s5">{{$res[4][$i]}}</span>
                        <span class="s2">{{strip_tags($res[5][$i])}}</span>
                    </p>
                    <p class="star">{{$res[6][$i]}}</p>
                </div>
            </a>
        </li>
    @endfor
    </ul>
</div>


<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-no-layout">
    <h2 class="am-titlebar-title ">
        综艺
    </h2>
</div>
<div class="s-tab-main">
    <ul class="am-avg-lg-12 am-thumbnails">
    @for($i = 20; $i < 27; $i++)
        <li class="w-newfigure {{$i==20?'w-newfigure-309x321':'w-newfigure-180x153'}}">
            <a href="{{url($res[1][$i])}}" target="_blank">
                <div class="g-playicon">
                    <img src="{{$res[2][$i]}}" class="{{$i==20?'w-newfigure-380x268':'w-newfigure-180x321'}}">
                    <span class="hint">{{$res[3][$i]}}</span>
                </div>
                <div class="detail">
                    <p class="title">
                        <span class="s5">{{$res[4][$i]}}</span>
                        <span class="s2">{{strip_tags($res[5][$i])}}</span>
                    </p>
                    <p class="star">{{$res[6][$i]}}</p>
                </div>
            </a>
        </li>
    @endfor
    </ul>
</div>


<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-no-layout">
    <h2 class="am-titlebar-title ">
        电影
    </h2>
</div>
<div class="s-tab-main">
    <ul class="am-avg-lg-4 am-thumbnails">
    @for($i = 27; $i < 39; $i++)
        <li>
            <a href="{{url($res[1][$i])}}" target="_blank">
                <div class="g-playicon dianying">
                    <img src="{{$res[2][$i]}}">
                    <span class="hint">{{$res[3][$i]}}</span>
                </div>
                <div class="detail">
                    <p class="title">
                        <span class="s5">{{$res[4][$i]}}</span>
                        <span class="s2">{{strip_tags($res[5][$i])}}</span>
                    </p>
                    <p class="star">{{$res[6][$i]}}</p>
                </div>
            </a>
        </li>
    @endfor
    </ul>
</div>


<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-no-layout">
    <h2 class="am-titlebar-title ">
        动漫
    </h2>
</div>
<div class="s-tab-main">
    <ul class="am-avg-lg-7 am-thumbnails">
    @for($i = 39; $i < 46; $i++)
        <li class="w-newfigure {{$i==39?'w-newfigure-309x321':'w-newfigure-180x153'}}">
            <a href="{{url($res[1][$i])}}" target="_blank">
                <div class="g-playicon">
                    <img src="{{$res[2][$i]}}" class=" {{$i==39?'w-newfigure-380x268':'w-newfigure-180x321'}}">
                    <span class="hint">{{$res[3][$i]}}</span>
                </div>
                <div class="detail">
                    <p class="title">
                        <span class="s5">{{$res[4][$i]}}</span>
                        <span class="s2">{{strip_tags($res[5][$i])}}</span>
                    </p>
                    <p class="star">{{$res[6][$i]}}</p>
                </div>
            </a>
        </li>
    @endfor
    </ul>
</div>

</div>

<div class="am-u-lg-3" style="padding-right:0px;">

@for ($q = 0;$q < 3;$q++)
    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-no-layout">
        <h2 class="am-titlebar-title ">
            {{$type_lists[$q]}}
        </h2>
    </div>

    <ul class="am-list am-list-border">
    @for ($i = ($q+1)*10;$i < ($q+1)*10+9;$i++)
        <li>
            <a href="{{url($lists[2][$i])}}" class="s5" target="_blank">
                <span class="am-badge am-badge-success">{{$lists[1][$i]}}</span>
                {{$lists[3][$i]}}
                <span class="my-span">{{$lists[4][$i]}}</span>
            </a>
        </li>
    @endfor
    </ul>
@endfor


</div>

<div class="am-u-lg-12">
<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-no-layout">
    <h2 class="am-titlebar-title ">
        合作专区
    </h2>
</div>
<div class="s-tab-main">
    <ul class="list">
    @for ($i = 0;$i < 23; $i++)
        <li><a href="{{$links[1][$i]}}" target="_blank"><img src="{{$links[2][$i]}}"></a></li>
    @endfor
    <li><a href="https://www.moeins.cn/?{{url('/')}}" target="_blank"><img src="https://www.moeins.cn/images/logo.png"></a></li>
    </ul>
</div>
</div>
@endsection
