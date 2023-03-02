<?php

namespace App\Services;

use App\Enums\JobStatus;
use App\Models\Job;

class JobService
{
    public function getAllOpen($request)
    {
        $jobs = Job::open()->paginate($request->per_page);
        return $jobs;
    }
    public function findByIdOpen($id)
    {
        $job = Job::open()->find($id);
        return $jobs;
    }
    public function getAll($request)
    {
        $jobs = Job::paginate($request->per_page);
        return $jobs;
    }
    public function findById($id)
    {
        $job = Job::find($id);
        return $jobs;

    }
    public function create($data): Job
    {
        $job = new Job;
        $job->company_id = $data['company_id'];
        $job->job_title_id = $data['job_title_id'];
        $job->description = $data['description'];
        $job->status = JobStatus::fromKey($data['status']);
        $job->save();

        return $job;
    }

    public function update($data, $id): Job
    {
        $job = Job::find($id);
        $job->company_id = $data['company_id'];
        $job->job_title_id = $data['job_title_id'];
        $job->description = $data['description'];
        $job->status = JobStatus::fromKey($data['status']);
        $job->save();

        return $job;
    }
    public function deleteJob(int $id)
    {
        $job = Job::find($id);
        $job->delete();

        return response()->noContent();

    }
}