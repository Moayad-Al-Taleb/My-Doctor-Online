<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\NutritionalFact\NutritionalFactRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NutritionalFactController extends Controller
{
    private $nutritionalFactRepository;

    public function __construct(NutritionalFactRepositoryInterface $nutritionalFactRepository)
    {
        $this->nutritionalFactRepository = $nutritionalFactRepository;
    }

    public function index()
    {
        return $this->nutritionalFactRepository->index();
    }

    public function create()
    {
        return $this->nutritionalFactRepository->create();
    }

    public function store(Request $request)
    {
        $request->validate([
            'fact' => 'required|unique:nutritional_fact_translations|max:255',
            'description' => 'required|max:65535',
            'health_category_id' => 'exists:health_categories,id',
            'illness_id' => 'exists:illnesses,id',
        ]);

        return $this->nutritionalFactRepository->store($request);
    }

    public function show($id)
    {
        return $this->nutritionalFactRepository->show($id);
    }

    public function edit($id)
    {
        return $this->nutritionalFactRepository->edit($id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fact' => [
                'required',
                Rule::unique('nutritional_fact_translations')->ignore($request->input('id')),
                'max:255',
            ],
            'description' => 'required|max:65535',
            'health_category_id' => 'nullable|exists:health_categories,id',
            'illness_id' => 'nullable|exists:illnesses,id',
        ]);

        return $this->nutritionalFactRepository->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->nutritionalFactRepository->destroy($request);
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'status' => 'required|in:0,1|numeric'
        ]);

        return $this->nutritionalFactRepository->update_status($request);
    }
}
