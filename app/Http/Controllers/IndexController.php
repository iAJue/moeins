<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 首页控制器
 */
class IndexController extends Controller {

	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function index(){
		
		$data = curl_get_https('https://www.360kan.com/');

		preg_match_all("|<a href='https://www.360kan.com/(.*?)'  class='js-link'><div class='w-newfigure-imglink g-playicon js-playicon'> <img src='https://p0.ssl.qhimg.com/d/_hao360/default.png' data-src='(.*?)' alt='.*?'  /><span class='w-newfigure-hint'>(.*?)</span></div><div class='w-newfigure-detail'><p class='title g-clear'><span class='s1'>(.*?)</span>(.*?)</p><p class='w-newfigure-desc'>(.*?)</p>|",$data,$res);

		preg_match_all('|<li><a href="(.*?)"><img src="https://p0.ssl.qhimg.com/d/_hao360/default.png" data-src="(.*?)"/></a></li>|',$data,$links);

		$lis = curl_get_https('https://www.360kan.com/dianying/index.html');
		preg_match_all('|data-cover="(.*?)" data-href="https://www.360kan.com(.*?)">[\s\S]*?<span class="b-topslider-tit">(.*?)</span>.*?<span class="b-topslider-desc">(.*?)</span>|',$lis,$slider);


		preg_match_all('|<li class="rank-item">[\s\S]*?<div class="normal-type g-clear">[\s\S]*?<span class=".*?">(.*?)</span>[\s\S]*?<a title=".*?" href="https://www.360kan.com(.*?)" class="name">(.*?)</a>[\s\S]*?<span class="vv">(.*?)</span>[\s\S]*?</div>[\s\S]*?</li>|',$data,	$lists);


		return view('index',[
			'res' => $res,
			'links' => $links,
			'slider' => $slider,
			'lists' => $lists,
			'type_lists' => [
				'热播电视剧榜',
				'热播综艺榜',
				'热播电影榜'
			]
		]);	

	}

	/**
	 * 所有分类列表
	 * @param  [type] $type 频道
	 * @param  string $cat  类型
	 * @param  string $year 年代
	 * @param  string $area 地区
	 * @param  string $page 页数
	 * @return [type]       [description]
	 */
	public function lists($type, $cat = 'all', $year = 'all', $area = 'all', $page = '1'){

		
		$data = curl_get_https('https://www.360kan.com/'.$type.'/list.php?year='.$year.'&area='.$area.'&act=all&cat='.$cat.'&pageno='.$page);
		
		// 匹配当前影视
		preg_match_all('|<a class="js-tongjic" href="(.*?)">[\s\S]*?<div class="cover g-playicon">[\s\S]*?<img src="(.*?)">[\s\S]*?<span class="hint">(.*?)</span>[\s\S]*?</div>[\s\S]*?<div class="detail">[\s\S]*?<p class="title g-clear">[\s\S]*?<span class="s1">(.*?)</span>[\s\S]*?<span class="s2">(.*?)</span>[\s\S]*?</p>[\s\S]*?<p class="star">(.*?)</p>|', $data, $matches);

		// 匹配页数
		preg_match_all("|target='_self'.*?>(\d*?)</a>|",$data,$pages);
		// 妈耶，手动分页真是累
		$i = count($pages[1]);
		$page_count = 1;
		$start = 1;
		$end = $start + 5;
		if ($i>0) {
			$page_count = $pages[1][$i-1]; //总页数
			if ($page >= 4) {
				$start = $page - 2;
				$end = $start + 5;
				if ($end > $page_count) {
					$start = $start - ($end - $page_count)+1;
					$end = $page_count+1;
				}
			}
		}

		// 匹配分类
		preg_match_all('!&cat=(.*?)" target="_self">(.*?)\s|</a>\s*?<b class="on">(.*?)</b>!',getSubstr($data,'类型:','收起'),$cats);

		// 匹配年代
		preg_match_all('!&year=(.*?)" target="_self">(.*?)\s|</a>\s*?<b class="on">(.*?)</b>!',getSubstr($data,'年代:','收起'),$years);

		// 匹配地区
		preg_match_all('!&area=(.*?)" target="_self">(.*?)\s|</a>\s*?<b class="on">(.*?)</b>!',getSubstr($data,'地区:','收起'),$areas);

		return view('list', [
			'page_count' => $page_count, //总页数
			'start' => $start,
			'end' => $end,
			'count' => count($matches[0]),
			'res' => $matches,
			'type' => $type,
			'cat' => $cat, 
			'year' => $year,
			'area' =>  $area, 
			'page' => $page,
			'cats' => $cats,
			'years' => $years,
			'cats_count' => count($cats[1]),
			'years_count' => count($years[1]),
			'types' => [
				'dianshi' => '电视剧',
				'dianying' => '电影',
				'zongyi' => '综艺',
				'dongman' => '动漫'
			],
			'areas' => $areas,
			'areas_count' => count($areas[0]),
		]);
		
	}


	/**
	 * 视频介绍页
	 */
	public function detail($type,$id){

		$url = 'https://www.360kan.com/'.$type .'/'.$id;
		$data = curl_get_https($url);


		if ($type == 'va') {
			// 综艺
			preg_match_all("|<a href='(.*?)' d[\s\S]*?<span class='w-newfigure-hint'>(.*?)</span>|",stristr($data,'s-month-tab'),$pages);
			$preg = '|<img src="(.*?)">\r[\s\S]*?<h1>(.*?)</h1>[\s\S]*?(.*?)<p class="tag">(.*?)</p>[\s\S]*?<span class="cat-title">([\s\S]*?)</div>[\s\S]*?display:none;"><span>([\s\S]*?)<a href="#"|';
			preg_match($preg,$data,$res);
		}elseif($type == 'm'){
			// 电影
			preg_match_all('|<a href="(.*?)" class="g-playicon s-cover-img" data-daochu=".*?" data-num="1">|', $data, $pages);
			preg_match('|<img src="(.*?)">\r[\s\S]*?<h1>(.*?)</h1>[\s\S]*?<div class="s-title-right">([\s\S]*?)</div>[\s\S]*?<p class="item"><span class="cat-title">([\s\S]*?)</div>[\s\S]*display:none;"><span>([\s\S]*?)(.*?)<a href="#"|',$data,$res);
		}else {
			// 电视剧and动漫
			preg_match_all('|<a data-num="(.*?)" data-daochu=".*?" href="(.*?)">|',stristr($data,'num-tab-main g-clear js-tab'),$pages);
			$preg = '|<img src="(.*?)">\r[\s\S]*?<h1>(.*?)</h1>[\s\S]*?(.*?)<p class="tag">(.*?)</p>[\s\S]*?<div class="g-clear item-wrap">([\s\S]*?)</div[\s\S]*?display:none;"><span>([\s\S]*?)<a href="#"|';
			preg_match($preg,$data,$res);
		}

		return view('detail', [
			'pages' => $pages,
			'count' => count($pages[0]),
			'res' => $res,
			'type' => $type,
			'video' => $pages[$type=='va' || $type == 'm'?'1':'2'][0]
		]);
	}


	/**
	 * 搜索视频
	 * @return [type] [description]
	 */
	public function search(Request $request){
		$key = $request->input('wd');
		$data = curl_get_https('https://so.360kan.com/index.php?kw='.urlencode($key));
		preg_match_all('|<img src="(.*?)" alt=".*?" />.*?<span class="m-series">(.*?)</span></a></div><div class="cont"><h3 class="title"><a href="http://www.360kan.com(.*?)" >(.*?)</a><span class="playtype">([\s\S]*?)</p>|',$data,$matches);
		return view('search',[
			'res' => $matches,
			'count' => count($matches[0]),
			'key' => $key
		]);
	}

}

