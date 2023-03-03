<?php
# In the controller, I changed it from the previous controller to using the service pattern.
# Why did I make the Job Service class? because it refers to the Service Layer for Job CRUD Function.
# This is a design pattern where the logic is separated so that the logic can be used again without us rewriting the same logic.
# Usually, it will be used for functions that are repeatedly used in controllers or testing.

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Http\Resources\JobResource;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function view(Request $request)
    {
        $result = $this->jobService->getAllOpen($request);
        return JobResource::collection($result);
    }

    public function show(int $id)
    {
        $result = $this->jobService->findByIdOpen($id);
        return new JobResource($result);
    }

    public function viewByAdmin(Request $request)
    {
        $result = $this->jobService->getAll($request);
        return JobResource::collection($result);

    }

    public function showByAdmin(int $id)
    {
        $result = $this->jobService->findById($id);
        return new JobResource($result);
    }

    public function create(JobStoreRequest $request)
    {
        $result = $this->jobService->create($request);
        return new JobResource($result);
    }

    public function update(JobStoreRequest $request, int $id)
    {
        $result = $this->jobService->update($request, $id);
        return new JobResource($result);
    }

    public function delete(int $id)
    {
        $result = $this->jobService->deleteJob($id);
        return response()->json($result);
    }
}