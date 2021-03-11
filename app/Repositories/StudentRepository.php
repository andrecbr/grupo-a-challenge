<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Contracts\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function App\Helpers\stripDotsAndHyphens;

class StudentRepository extends AbstractRepository implements StudentRepositoryInterface {

    protected $model = Student::class;

    public function store(Request $request): Response
    {
        $requestAll = $request->all();

        $validator = Validator::make($requestAll, [
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'cpf' => 'required|max:11'
        ]);

        if ($validator->fails()) {
            return new Response($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        $fields = $requestAll;

        $fields['cpf'] = stripDotsAndHyphens($fields['cpf']);

        $student = new $this->model;
        $student->fill($fields);
        $student->save();

        return new Response($student, 201);
    }

    public function show(int $ra) {
        $student = $this->model->findOrFail($ra);

        return new Response($student);
    }

    public function update(Request $request, int $ra): Response
    {
        $fields = $request->all();

        unset($fields['cpf']);

        $student = $this->model->findOrFail($ra);
        $student->fill($fields);
        $student->save();

        return new Response($student);
    }

    public function destroy(int $ra) {
        $student = $this->model->findOrFail($ra);

        $student->delete();
    }

    public function allLimited(int $perPage): Response
    {
        $students = $this->model::paginate($perPage);

        return new Response($students);
    }

}
