<?php

namespace dto;

class Services
{
    private $service_id;
    private $permission_id;
    private $view;
    private $action_delete;
    private $action_update;
    private $action_create;
    // Getter và Setter cho $service_id
    public function getService_id()
    {
        return $this->service_id;
    }

    public function setService_id($service_id)
    {
        $this->service_id = $service_id;
    }

    // Getter và Setter cho $permission_id
    public function getPermission_id()
    {
        return $this->permission_id;
    }

    public function setPermission_id($permission_id)
    {
        $this->permission_id = $permission_id;
    }

    // Getter và Setter cho $view
    public function getView()
    {
        return $this->view;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    // Getter và Setter cho $action_delete
    public function getAction_delete()
    {
        return $this->action_delete;
    }

    public function setAction_delete($action_delete)
    {
        $this->action_delete = $action_delete;
    }

    // Getter và Setter cho $action_update
    public function getAction_update()
    {
        return $this->action_update;
    }

    public function setAction_update($action_update)
    {
        $this->action_update = $action_update;
    }

    // Getter và Setter cho $action_create
    public function getAction_create()
    {
        return $this->action_create;
    }

    public function setAction_create($action_create)
    {
        $this->action_create = $action_create;
    }
}
