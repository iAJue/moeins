@extends('layouts.app')

@section('title', '萌音影视分类列表')

@section('content')
<div class="s-tab">
    
    <div class="s-filter">
        <dl class="s-filter-item">
            <dt class="type"><i class="am-icon-television am-icon-fw"></i> 频道：</dt>
            <dd class="item">
            @foreach ($types as $k => $v)
                @if ($type == $k)
                    <b class="on">{{$v}}</b>
                @else
                    <a target="_self" href="{{url($k.'/list')}}">{{$v}}</a>
                @endif
            @endforeach
            </dd>
        </dl>
        <dl class="s-filter-item">
            <dt class="type"><i class="am-icon-tachometer am-icon-fw"></i> 类型:</dt>
            <dd class="item">
            @if ($cat == 'all')
                <b class="on">全部</b>
            @endif
            @for ($i = 0; $i < $cats_count; $i++)
                @if ($cats[1][$i] === '' and $cats[3][$i] != '更早')
                   <b class="on">{{$cats[3][$i]}}</b>
                @elseif ($cats[1][$i] != '')
                    <a href="{{url($type.'/list',[$cats[1][$i],$year,$area])}}" target="_self">{{$cats[2][$i]}}</a>
                @endif
            @endfor
            </dd>
            <dd class="act">
                <a class="js-filter-open" href="#" style="display: inline;">更多 <i class="am-icon-arrow-down am-icon-fw"></i></a>
                <a class="js-filter-close" href="#" style="display: none;">收起 <i class="am-icon-arrow-up am-icon-fw"></i></a>
            </dd>
        </dl>

        @if ($years_count != '0')
        <dl class="s-filter-item">
            <dt class="type"><i class="am-icon-calendar-check-o am-icon-fw"></i> 年代:</dt>
            <dd class="item">
            @if ($year == 'all')
                <b class="on">全部</b>
            @endif
            @for ($i = 0; $i < $years_count; $i++)
                @if ($years[1][$i] === '')
                   <b class="on">{{$years[3][$i]}}</b>
                @elseif ($years[1][$i] != '')
                    <a href="{{url($type.'/list',[$cat,$years[1][$i],$area])}}" target="_self">{{$years[2][$i]}}</a>
                @endif
            @endfor
            </dd>
            <dd class="act">
                <a class="js-filter-open" href="#" style="display: inline;">更多 <i class="am-icon-arrow-down am-icon-fw"></i></a>
                <a class="js-filter-close" href="#" style="display: none;">收起 <i class="am-icon-arrow-up am-icon-fw"></i></a>
            </dd>
        </dl>
        @endif

        <dl class="s-filter-item">
            <dt class="type"><i class="am-icon-map-o am-icon-fw"></i> 地区:</dt>
            <dd class="item">
            @if ($area == 'all')
                <b class="on">全部</b>
            @endif
            @for ($i = 0; $i < $areas_count; $i++)
                @if ($areas[1][$i] === '')
                   <b class="on">{{$areas[3][$i]}}</b>
                @elseif ($areas[1][$i] != '')
                    <a href="{{url($type.'/list',[$cat,$year,$areas[1][$i]])}}" target="_self">{{$areas[2][$i]}}</a>
                @endif
            @endfor
            </dd>
            <dd class="act">
                <a class="js-filter-open" href="#" style="display: inline;">更多 <i class="am-icon-arrow-down am-icon-fw"></i></a>
                <a class="js-filter-close" href="#" style="display: none;">收起 <i class="am-icon-arrow-up am-icon-fw"></i></a>
            </dd>
        </dl>


    </div>

    <div class="s-tab-main">
        <ul class="am-avg-sm-3 am-avg-md-4 am-avg-lg-6 am-thumbnails">
        @for($i = 0; $i < $count; $i++)
            <li>
                <a href="{{url($res[1][$i])}}" target="_blank">
                    <div class="cover g-playicon">
                        <img src="{{$res[2][$i]}}">
                        <span class="hint">{{$res[3][$i]}}</span>
                    </div>
                    <div class="detail">
                        <p class="title">
                            <span class="s1">{{$res[4][$i]}}</span>
                            <span class="s2">{{$res[5][$i]}}</span>
                        </p>
                        <p class="star">{{$res[6][$i]}}</p>
                    </div>
                </a>
            </li>
        @endfor
        </ul>
    </div>
</div>
@if ($page_count > 1)
<ul class="am-pagination am-pagination-centered">
    <li class="{{$page=='1'?'am-disabled':''}}"><a href="{{url($type,['list',$cat,$year,$area,$page-1])}}">&laquo;</a></li>
    @for ($i = $start; $i < $end; $i++)
        @if ($page == $i)
            <li class="am-active"><a href="javascript:volid(0);">{{$i}}</a></li>
        @elseif (($end - $i == 1) && $i != $page_count)
            <li><a href="{{url($type,['list',$cat,$year,$area,$i])}}">...</a></li>
        @else 
            <li><a href="{{url($type,['list',$cat,$year,$area,$i])}}">{{$i}}</a></li>
        @endif
    @endfor
    <li class="{{$page==$page_count?'am-disabled':''}}"><a href="{{url($type,['list',$cat,$year,$area,$page+1])}}">&raquo;</a></li>
</ul>
@endif
@endsection

@section('js')
$('.js-filter-open').click(function(){$(this).parent().parent().height('auto');$(this).next().show();$(this).hide()});$('.js-filter-close').click(function(){$(this).parent().parent().height('40px');$(this).prev().show();$(this).hide()});
@endsection
