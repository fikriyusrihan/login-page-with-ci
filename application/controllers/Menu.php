<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login_helper();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('available', 'Availability', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $menu = $this->input->post('menu');
            $availability = $this->input->post('available');

            $this->db->insert('user_menu', ['menu' => $menu]);

            $menuId = $this->db->get_where('user_menu', ['menu' => $menu])->row_array();

            if ($availability == 0) {
                $roles = $this->db->get('user_role')->result_array();

                foreach ($roles as $role) {
                    $data = [
                        'role_id' => $role['id'],
                        'menu_id' => $menuId['id']
                    ];

                    $this->db->insert('user_access_menu', $data);
                }
            } else {
                $data = [
                    'role_id' => $availability,
                    'menu_id' => $menuId['id']
                ];

                $this->db->insert('user_access_menu', $data);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been created!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['subMenu'] = $this->menu->getSubMenu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu has been created!</div>');
            redirect('menu/submenu');
        }
    }

    public function delete($table, $id)
    {
        $this->db->delete($table, array('id' => $id));

        if ($table == 'user_menu') {
            redirect('menu');
        } else {
            redirect('menu/submenu');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Menu Management";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['edit'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $newTitle = $this->input->post('menu');
            $this->db->where('id', $id);
            $this->db->update('user_menu', ['menu' => $newTitle]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been edited!</div>');
            redirect('menu');
        }
    }

    public function edit_submenu($id)
    {
        $data['title'] = "Submenu Management";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['edit'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu Category', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'menu_id' => $this->input->post('menu_id'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu has been edited!</div>');
            redirect('menu/submenu');
        }
    }
}
