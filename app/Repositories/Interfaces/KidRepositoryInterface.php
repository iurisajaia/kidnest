<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\Kid\CreateKidRequest;
use App\Http\Requests\Kid\CreateKidSummeryRequest;
use Illuminate\Http\Request;

Interface KidRepositoryInterface{
    public function delete($id);
    public function search(Request $request);
    public function create(CreateKidRequest $request);
    public function update(CreateKidRequest $request, $id);
    public function addSummary(CreateKidSummeryRequest $request, int $id);
    public function findByPrivateNumberAndMatchForParent(string $privateNumber, int $parentId);

}
