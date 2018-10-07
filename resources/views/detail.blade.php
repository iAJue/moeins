@extends('layouts.app')

@section('title', $res[2])

@section('content')

<div class="am-panel am-panel-success">
  <div class="am-panel-hd">{{$res[2]}}</div>
	<iframe id="vip-player" src="" allowtransparency="true" scrolling="No"></iframe>
</div>
<div class="am-panel am-panel-success my-panel">
	<div class="am-panel-hd">简介</div>
	<div class="am-panel-bd">
		<div class="s-top-left">
		    <img src="{{$res[1]}}">
		</div>
		<div class="s-top-right">
		    <h1 class="am-article-title">{{$res[2]}}<span class="s">{{strip_tags($res[3])}}</span></h1>
		    <p>{{strip_tags($res[4])}}</p>
		    <p>{{strip_tags($res[5])}}</p>
		    <p>{{strip_tags($res[6])}}</p>
		</div>
	</div>
</div>
@if ($count > 1)
<div class="am-panel am-panel-success my-panel">
	<div class="am-panel-hd">全部剧集</div>
	<div class="am-panel-bd">
		@for($i = 0;$i < $count; $i++)
			<button type="button" class="am-btn am-btn-default am-radius my-btn" data-url="{{$pages[$type=='va'?'1':'2'][$i]}}">{{$pages[$type=='va'?'2':'1'][$i]}}</button>
	    @endfor
	</div>
</div>
@endif
@endsection

@section('js')
$(".my-btn").click(function() {
	$('.my-btn').removeClass('am-btn-success');
	$(this).addClass('am-btn-success');
	layer.tips('准备播放' + $(this).html(), this, {
		tips: 1
	});
	refreshVideo($(this).attr('data-url'));
});


function refreshVideo(videoUrl) {
	record();
	$("#vip-player").attr("src", 'http://yun.odflv.com/?url=' + videoUrl);
}

refreshVideo('{{$video}}');
function record(){
	var histemp = store.get('history') ? store.get('history') : [];
	for (var i = 0; i < histemp.length; i++) {
		if (histemp[i].name == "{{$res[2]}}" && histemp[i].url == document.location.toString()) {
			histemp.splice(i, 1);
			break
		}
	}
	histemp.unshift({
		name: '{{$res[2]}}',
		url: document.location.toString()
	});
	if (histemp.length > 6) histemp.length = 6;
	store.set('history', histemp);
}
@endsection