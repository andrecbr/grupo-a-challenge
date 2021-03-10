<?php

namespace App\Repositories;

use Illuminate\Http\Response;

abstract class AbstractRepository {

    protected $model;

    public function __construct() {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel() {
        return app($this->model);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function all() {
        $students = $this->model::simplePaginate(2);

        return new Response($students);
    }
}
