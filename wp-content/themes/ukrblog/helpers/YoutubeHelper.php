<?php

class YoutubeHelper
{
    private $google_api_key = 'AIzaSyCUWuBpTk6fa2pg4mmFcbjzDsTRIGVmHjU';
    private $google_api_url = 'https://www.googleapis.com/youtube/v3/videos';

    public function get_video_data($id)
    {
        $video_data = $this->make_request(array(
            'part' => 'snippet',
            'id' => $id,
            'key' => $this->google_api_key
        ));
        $video_data_json = json_decode($video_data);
        if(!empty($video_data_json->items[0]->snippet)){
            return $video_data_json->items[0]->snippet;
        }else{
            return false;
        }
    }

    private function make_request($args)
    {
        $request_url = $this->google_api_url . '?';
        foreach ($args as $key => $value){
            $request_url .= $key . '=' . $value . '&';
        }
        $result = file_get_contents($request_url);
        return $result;
    }

    public function get_youtube_video_id_by_youtube_video_url($url)
    {
        return explode('&', explode('v=',$url)[1])[0];
    }
}