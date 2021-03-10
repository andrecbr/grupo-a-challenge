<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->studentRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return $this->studentRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $ra
     * @return Response
     */
    public function show(int $ra): Response
    {
        return $this->studentRepository->show($ra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $ra
     * @return Response
     */
    public function update(Request $request, int $ra): Response
    {
        return $this->studentRepository->update($request, $ra);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $ra
     * @return Response
     */
    public function destroy(int $ra)
    {
        $this->studentRepository->destroy($ra);
    }
}
