<?php

/*
 * Created by Pham Xuan Son
 * Email: Sonpxvn@gmail.com
 * This is library for Codeigniter Lib. 
 * Solutions: 
 *  - get Signle Youtube Link media
 *  - get Multiple Youtube Link Media
 */

class Youtube {

    function __construct() {
        
    }

    function get_youtube($video_link, $multiple = null) {
        $video = explode("watch?v=", $video_link);
        $video_ID = $video[1];
        $json = file_get_contents("https://gdata.youtube.com/feeds/api/videos/{$video_ID}?v=2&alt=json");
        $json_data = json_decode($json);
        $title = $json_data->{'entry'}->{'title'}->{'$t'};
        $video_content = $json_data->{'entry'}->{'media$group'}->{'media$description'}->{'$t'};
        $video_image = $this->getYoutubeImage($video_link);
        $video_duration = $this->getDuration($video_link);
        $result = array(
            'id' => $video_ID,
            'title' => $title,
            'content' => $video_content,
            'image' => $video_image,
            'duration' => $video_duration,
        );
        return $result;
    }

    function getPlaylist($playlist = null) {
        $cont = json_decode(file_get_contents('http://gdata.youtube.com/feeds/api/playlists/' . $playlist . '/?v=2&alt=json&feature=plcp'));
        $feed = $cont->feed->entry;
        $videoID_array = array();
        if (count($feed)) {
            foreach ($feed as $item)
                array_push($videoID_array, $item->{'media$group'}->{'yt$videoid'}->{'$t'});
        }
        return $videoID_array;
    }

    function getYoutubeImage($e) {
        //GET THE URL
        $url = $e;

        $queryString = parse_url($url, PHP_URL_QUERY);

        parse_str($queryString, $params);

        $v = $params['v'];
        //DISPLAY THE IMAGE
        if (strlen($v) > 0) {
            return "http://i3.ytimg.com/vi/$v/mqdefault.jpg";
        }
    }

    function getDuration($url) {

        parse_str(parse_url($url, PHP_URL_QUERY), $arr);
        $video_id = $arr['v'];


        $data = @file_get_contents('http://gdata.youtube.com/feeds/api/videos/' . $video_id . '?v=2&alt=jsonc');
        if (false === $data)
            return false;

        $obj = json_decode($data);

        return $obj->data->duration * 0.0166667;
    }

}
