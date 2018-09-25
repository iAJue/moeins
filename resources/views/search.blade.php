@extends('layouts.app')

@section('title', $key . '  搜索结果')

@section('content')
<div data-am-widget="list_news" class="am-list-news am-list-news-default am-no-layout">
    <div class="am-list-news-bd">
    @if ($count > 0)
    	<ul class="am-list">
    	@for ($i = 0; $i < $count; $i++)
		<li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
            <div class="am-u-sm-4 am-list-thumb s-top-left" style="margin-left: 50px;">
                <a href="{{url($res[3][$i])}}" target="_blank">
                    <img src="{{$res[1][$i]}}">
                </a>
            </div>
            <div class="am-u-sm-8 am-list-main s-top-right">
                <h1 class="am-list-item-hd">
                    <a href="{{url($res[3][$i])}}" target="_blank" class="search-item-href">{{strip_tags($res[4][$i])}}</a>
                </h1>
                <div class="my-text">{{strip_tags($res[5][$i])}}</div>
                <a href="{{url($res[3][$i])}}" target="_blank" class="am-btn am-btn-success am-btn-sm search-item-btn" style="padding: .5em 1em;">
                    <i class="am-icon-play"></i>
                    在线播放  
                </a>
            </div>
        </li>
        @endfor
	    </ul>
	@else
	<div class="am-container">
		<div class="am-alert am-alert-success" data-am-alert="">
			<button type="button" class="am-close">×</button>
			<p>什么都没有找到o</p>
		</div>
	</div>
	@endif
    </div>
</div>



@endsection
