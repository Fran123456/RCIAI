<?php

        $this->load->model('dashboard_Model');
        $notis =$this->dashboard_Model->show_join($this->session->userdata('id'));
        $con = count($notis);
        //preparamos los datos de la sesión
         $data = array(
            'id' => $this->session->userdata('id'),
            'user' =>$this->session->userdata('user'),
            'nombre' => $this->session->userdata('nombre'),
            'apellido' => $this->session->userdata('apellido'),
            'correo' => $this->session->userdata('correo'),
            'rol' => $this->session->userdata('rol'),
            'cargo' => $this->session->userdata('cargo'),
            'login' => TRUE,
            'contador' => $con,
            'notificaciones' => $notis,
         );
         $this->session->set_userdata($data);
