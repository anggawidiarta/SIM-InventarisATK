<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}

function is_admin()
{
    $ci = get_instance();
    $level = $ci->session->userdata('level');
    $Akses = $ci->uri->segment(1);
    $ci->db->get_where('mst_user', ['level' => $Akses])->row_array();
    if ($level !== 'Admin') {
        redirect('auth/blocked');
    }
}

function is_gudang()
{
    $ci = get_instance();
    $level = $ci->session->userdata('level');
    $Akses = $ci->uri->segment(1);
    $ci->db->get_where('mst_user', ['level' => $Akses])->row_array();
    if ($level !== 'Gudang') {
        redirect('auth/blocked');
    }
}

function is_manager()
{
    $ci = get_instance();
    $level = $ci->session->userdata('level');
    $Akses = $ci->uri->segment(1);
    $ci->db->get_where('mst_user', ['level' => $Akses])->row_array();
    if ($level !== 'Manager') {
        redirect('auth/blocked');
    }
}

function is_staf()
{
    $ci = get_instance();
    $level = $ci->session->userdata('level');
    $Akses = $ci->uri->segment(1);
    $ci->db->get_where('mst_user', ['level' => $Akses])->row_array();
    if ($level !== 'Staf') {
        redirect('auth/blocked');
    }
}
