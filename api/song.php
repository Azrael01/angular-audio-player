<?php
/**
 * @author xialei <xialeistudio@gmail.com>
 */
require __DIR__ . '/common.php';
if (!isset($_GET['song_id']))
{
	ajax(array(
			'error' => '缺少参数'
	));
}
$data = Request::get('http://ting.baidu.com/data/music/links', array(
		'songIds' => intval($_GET['song_id'])
));
$data = json_decode($data, true);
$data = $data['data']['songList'][0];
$info = array(
		'id' => $data['songId'],
		'img' => $data['songPicSmall'],
		'author' => $data['artistName'],
		'title' => $data['songName'],
		'time' => $data['time'],
		'audio'=>$data['songLink']
);
ajax($info);