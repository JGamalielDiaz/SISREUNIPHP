<?php

namespace Repositories\BasePersistencia;

interface IBasePersistencia {

    public function getModel();

    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function finById($id);


}