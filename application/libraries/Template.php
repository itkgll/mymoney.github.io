<?php

Class Template {

    var $template_data = array();

    function __construct()
    {
        // Load session library
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {
        // $this->CI =& get_instance();

        if ($this->CI->session->userdata('logged_in')) {
            // Kirim data user ke template
            $this->set('username', $this->CI->session->userdata('username'));
            $this->set('email', $this->CI->session->userdata('email'));
        }

        $this->set('content', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }

}