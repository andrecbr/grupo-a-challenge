<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface StudentRepositoryInterface extends RepositoryInterface {
    public function store(Request $request);
    public function show(int $ra);
    public function update(Request $request, int $ra);
    public function destroy(int $ra);
}
