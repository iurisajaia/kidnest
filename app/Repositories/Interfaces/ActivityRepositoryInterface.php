<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\Activity\CreateActivityNotificationRequest;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use Illuminate\Http\Request;

Interface ActivityRepositoryInterface{
    public function delete(Request $request, $id);
    public function create(CreateActivityRequest $request);
    public function update(UpdateActivityRequest $request, $id);
    public function getActivityNotifications(Request $request);
    public function createNotification(CreateActivityNotificationRequest $request);

}
