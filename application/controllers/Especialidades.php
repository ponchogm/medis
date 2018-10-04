<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Especialidades extends CI_CONTROLLER
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // Cargo el helper de formulario
        $this->load->helper('form');
        //Cargo el Modelo de las especialidades
        $this->load->model('EspecialidadesModel');
        $this->load->model('ModelLogin');

        if (!$this->ModelLogin->valida_session()) {redirect('Home');}
    }

    public function index()
    {
        $data['segmento'] = $this->uri->segment(3);
        if (!$data['segmento']) {
            $data['consulta'] = $this->EspecialidadesModel->listar_esp();
        } else {
            $data['consulta'] = $this->EspecialidadesModel->mostrar_esp($data['segmento']);
        }

        $this->load->view('especialidades', $data);
    }

    //Método que inserta nueva especialidad en la base de datos
    public function add_esp()
    {
        $data = array(
            'cod'    => $this->input->post('cod'),
            'nombre' => $this->input->post('nombre'),
        );
        //llamo al metodo que inserta en el modelo
        $this->EspecialidadesModel->nueva_esp($data);
        redirect('especialidades');
    }
    public function cerrar_sesion()
    {
        $this->ModelLogin->close_session();
        redirect('Home');
    }
    public function editar()
    {
        $data['id_espe']      = $this->uri->segment(3);
        $data['especialidad'] = $this->EspecialidadesModel->mostrar_esp($data['id_espe']);
        $this->load->view('editar_espe', $data);
    }
    public function actualizar()
    {
        $data = array(
            'cod'    => $this->input->post('id_espe'),
            'nombre' => $this->input->post('nombre_espe'),
        );
        $this->EspecialidadesModel->actualizar_esp($this->uri->segment(3), $data);
        redirect('especialidades');
    }
    public function eliminar()
    {
        $id = $this->uri->segment(3);
        $this->EspecialidadesModel->eliminar_esp($id);
        redirect('especialidades');
    }
}
