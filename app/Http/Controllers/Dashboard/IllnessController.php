<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Illness\IllnessRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IllnessController extends Controller
{
    private $illnessRepository;

    public function __construct(IllnessRepositoryInterface $illnessRepository)
    {
        $this->illnessRepository = $illnessRepository;
    }

    public function index()
    {
        return $this->illnessRepository->index();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:illness_translations|max:255',
            'description' => 'required|max:65535',
        ]);

        return $this->illnessRepository->store($request);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('illness_translations')->ignore($request->input('id')),
                'max:255',
            ],
            'description' => 'required|max:65535',
        ]);

        return $this->illnessRepository->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->illnessRepository->destroy($request);
    }

}
