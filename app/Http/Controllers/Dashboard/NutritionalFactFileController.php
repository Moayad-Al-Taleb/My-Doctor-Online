<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\NutritionalFactFile\NutritionalFactFileRepositoryInterface;
use Illuminate\Http\Request;

class NutritionalFactFileController extends Controller
{
    private $nutritionalFactFileRepository;

    public function __construct(NutritionalFactFileRepositoryInterface $nutritionalFactFileRepository)
    {
        $this->nutritionalFactFileRepository = $nutritionalFactFileRepository;
    }

    public function create($id)
    {
        return $this->nutritionalFactFileRepository->create($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4,video/mpeg,video/quicktime|max:100000', // 2048
            'nutritional_fact_id' => 'required|exists:nutritional_facts,id',
        ]);

        return $this->nutritionalFactFileRepository->store($request);
    }

    public function destroy(Request $request)
    {
        return $this->nutritionalFactFileRepository->destroy($request);
    }
}
