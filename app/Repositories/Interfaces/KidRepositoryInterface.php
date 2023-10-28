<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\Kid\CreateKidRequest;
use App\Http\Requests\Kid\CreateKidSummeryRequest;

Interface KidRepositoryInterface{
    public function findByPrivateNumberAndMatchForParent(string $privateNumber, int $parentId);
    public function delete($id);
    public function create(CreateKidRequest $request);
    public function update(CreateKidRequest $request, $id);
    public function addSummary(CreateKidSummeryRequest $request, int $id);

}
