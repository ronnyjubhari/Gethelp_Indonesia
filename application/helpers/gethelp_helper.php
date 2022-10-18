<?php
//untuk admin
function is_logged_in()
{
    $ci = get_instance(); //memanggil fitur ci 
    if (!$ci->session->userdata('admin_data')) {
        redirect('auth');
    }
}

//untuk user
function user_sudah_login()
{
    $ci = get_instance(); //memanggil fitur ci 
    if (!$ci->session->userdata('user_data')) {
        $ci->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert">
            Kamu Harus Login dulu untuk mengakses halaman ini
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>');
        redirect('auth');
    }
   
        
}

function variabel($var= ""){
    $var;
}

function user_email()
{
    $ci = get_instance(); //memanggil fitur ci 
   
        return $ci->session->userdata('user_data');
    
}