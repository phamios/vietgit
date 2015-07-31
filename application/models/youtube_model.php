<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Youtube_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_video_user($userid, $num = null, $offset = null) {

        $this->db->order_by("id", "desc");
        $this->db->where('userid', $userid);
        $query = $this->db->get('tbl_youtube', $num, $offset);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_video_user_by_cateid($cateid, $userid, $num = null, $offset = null) {
        $this->db->order_by("id", "desc");
        $this->db->where('userid', $userid);
        $this->db->where('cateid', $cateid);
        $query = $this->db->get('tbl_youtube', $num, $offset);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function count_video_user($userid) {

        $this->db->where('userid', $userid);
        $query = $this->db->get('tbl_youtube');
        return $query->num_rows();
    }

    function count_video_user_by_cateid($cateid, $userid) {

        $this->db->where('userid', $userid);
        $this->db->where('cateid', $cateid);
        $query = $this->db->get('tbl_youtube');
        return $query->num_rows();
    }

    function get_video_details($userid, $id) {

        $this->db->where('userid', $userid);
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_youtube');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function get_video_by_cate($userid, $id) {

        $this->db->where('userid', $userid);
        $this->db->where('cateid', $id);
        $this->db->order_by('id', 'random');
        $query = $this->db->get('tbl_youtube');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function get_video_by_id($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('tbl_youtube');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function add_video($cateid, $userid, $video_name, $video_link, $video_content, $video_image, $video_duration, $active, $videomode, $youtubemode) {
        $data = array(
            'cateid' => $cateid,
            'userid' => $userid,
            'video_name' => $video_name,
            'video_link' => $video_link,
            'video_content	' => $video_content,
            'video_created' => date("Y-m-d h:s:m"),
            'active' => $active,
            'video_image' => $video_image,
            'video_duration' => $video_duration,
            'youtube_mode' => $youtubemode,
            'video_mode' => $videomode,
        );
        $this->db->insert('tbl_youtube', $data);
    }

    public function update_video($cateid, $userid, $video_name, $video_link, $video_content, $video_image, $video_duration, $active, $videomode, $youtubemode) {
        $data = array(
            'cateid' => $cateid,
            'userid' => $userid,
            'video_name' => $video_name,
            'video_link' => $video_link,
            'video_content  ' => $video_content,
            'video_created' => date("Y-m-d h:s:m"),
            'active' => $active,
            'video_image' => $video_image,
            'video_duration' => $video_duration,
            'youtube_mode' => $youtubemode,
            'video_mode' => $videomode,
        );
        $this->db->update('tbl_youtube', $data);
    }

    function update_api($id, $userid, $video_name, $video_link, $video_content, $active) {

        $data = array(
            'video_name' => $video_name,
            'video_link' => $video_link,
            'video_content	' => $video_content,
            'video_created' => date("Y-m-d h:s:m"),
            'active' => $active
        );
        $this->db->where('id', $id);
        $this->db->where('userid', $userid);
        $this->db->update('tbl_youtube', $data);
    }

    function del_video($userid, $videoid) {

        $this->db->where('userid', $userid);
        $this->db->where('id', $videoid);
        $this->db->delete('tbl_youtube');
    }

    public function cateid_handler($cateid) {
        if ($cateid == 'All') {
            $this->session->unset_userdata('cateid');
            return $cateid;
        } elseif ($cateid) {
            $this->session->set_userdata('cateid', $cateid);
            return $cateid;
        } elseif ($this->session->userdata('cateid')) {
            $cateid = $this->session->userdata('cateid');
            return $cateid;
        } else {
            $this->session->unset_userdata('cateid');
            $cateid = null;
            return $cateid;
        }
    }

    function total_media(  $userid = null) {
       
        $this->db->where('userid', $userid);
        return $this->db->count_all('tbl_youtube');
    }

}
