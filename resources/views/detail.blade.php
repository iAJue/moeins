@extends('layouts.app')

@section('title', $res[2])

@section('content')

<div class="am-panel am-panel-success">
  <div class="am-panel-hd">{{$res[2]}}</div>
	<div id="video"></div>
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
var videoObject = {
	container: '#video',
	variable: 'player',
	autoplay: false,
	drag: 'start',
	seek: 0,
	adpause: 'https://ws4.sinaimg.cn/large/0072Vf1ply1fvjidch261g308c06yglu.jpg,https://ws1.sinaimg.cn/large/0072Vf1ply1fvjidctnoug308c06y0t6.jpg',
	adpausetime: '5,5',
	adpauselink: 'https://www.52ecy.cn/post-84.html,https://www.52ecy.cn/post-77.html',
	video: ''
};
var player = new ckplayer(videoObject);
$('.my-btn').on('click', function() {
	$('.my-btn').removeClass('am-btn-success');
	$(this).addClass('am-btn-success');
	layer.tips('准备播放第' + $(this).html() + '集', this, {
		tips: 1
	});
	api($(this).attr('data-url'))
});
api('{{$video}}');
function api(url) {
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
	$.post('{{url('api')}}', {
		'url': url,
		'_token': '{{csrf_token()}}'
	}, function(res) {
		if (res.status != '0') {
			layer.msg(res.msg, {
				icon: 5
			});
			return
		}
		changeVideo(res.msg)
	})
}
function changeVideo(videoUrl) {
	if (player == null) {
		return
	}
	var newVideoObject = {
		container: '#video',
		variable: 'player',
		autoplay: true,
		drag: 'start',
		seek: 0,
		adpause: 'https://ws4.sinaimg.cn/large/0072Vf1ply1fvjidch261g308c06yglu.jpg,https://ws1.sinaimg.cn/large/0072Vf1ply1fvjidctnoug308c06y0t6.jpg',
		adpausetime: '5,5',
		adpauselink: 'https://www.52ecy.cn/post-84.html,https://www.52ecy.cn/post-77.html',
		promptSpot: [{words: '萌音影视',time: 300}, {words: 'www.moeins.cn',time: 150}],
		loaded: 'loadedHandler',
		video: videoUrl
	};
	if (player.playerType == 'html5video') {
		if (player.getFileExt(videoUrl) == '.flv' || player.getFileExt(videoUrl) == '.m3u8' || player.getFileExt(videoUrl) == '.f4v' || videoUrl.substr(0, 4) == 'rtmp') {
			player.removeChild();
			player = null;
			player = new ckplayer();
			player.embed(newVideoObject)
		} else {
			player.newVideo(newVideoObject)
		}
	} else {
		if (player.getFileExt(videoUrl) == '.mp4' || player.getFileExt(videoUrl) == '.webm' || player.getFileExt(videoUrl) == '.ogg') {
			player = null;
			player = new ckplayer();
			player.embed(newVideoObject)
		} else {
			player.newVideo(newVideoObject)
		}
	}
}
@endsection