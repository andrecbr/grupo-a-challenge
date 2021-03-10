<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Contracts\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentRepository extends AbstractRepository implements StudentRepositoryInterface {

    protected $model = Student::class;

    public function store(Request $request): Response
    {
        $student = new $this->model;

        $student->fill($request->all());
        $student->save();

        return new Response($student, 201);
    }

    public function show(int $ra) {
        $student = $this->model->findOrFail($ra);

        return new Response($student);
    }

    public function update(Request $request, int $ra): Response
    {
        $student = $this->model->findOrFail($ra);

        $student->fill($request->all());
        $student->save();

        return new Response($student);
    }

    public function destroy(int $ra) {
        $student = $this->model->findOrFail($ra);

        $student->delete();
    }

}
