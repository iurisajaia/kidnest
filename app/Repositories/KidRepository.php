<?php

namespace App\Repositories;

use App\Http\Requests\Kid\CreateKidRequest;
use App\Http\Requests\Kid\CreateKidSummeryRequest;
use App\Models\Kid;
use App\Models\Staff;
use App\Models\Summary;
use App\Models\User;
use App\Repositories\Interfaces\KidRepositoryInterface;
use Illuminate\Http\JsonResponse;


class KidRepository implements KidRepositoryInterface
{

    public function findByPrivateNumberAndMatchForParent(string $privateNumber, int $parentId): Kid | string | null
    {
        try {
            $kid = Kid::query()->where('private_number', $privateNumber)->first();

            $kid?->parents()->attach($parentId);

            return $kid;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function findAdnMatchParents($privateNumber, $id){
        $users = User::whereJsonContains('user_data->kid_private_number', $privateNumber)->get();
        if($users && count($users)){
            $kid = Kid::query()->findOrFail($id);
            foreach($users as $user){
                $kid->parents()->attach($user->id);
            }
        }
    }

    public function create(CreateKidRequest $request) : JsonResponse{
        $kinderGardenId = $request->user()->id;


//        if($request->user()->user_role_id === 2){
//            $staff = Staff::query()->where('user_id', $request->user()->id)->first();
//            $kinderGardenId = $staff->kindergarten_id;
//        }

        $kid = Kid::create([
            ...$request->except(['_token', '_method']),
            "kindergarten_id" => $kinderGardenId
        ]);
        $this->findAdnMatchParents($request['private_number'], $kid->id);


//        if($user->user_role_id === 1){
//            $kid['kindergarten_id'] = $user->id;
//            $parent = User::query()->where('private_number', $request['parent_private_number'])->first();
//            if($parent){
//                $kid['parent_id'] = $parent->id;
//            }
//        };
//        if($user->user_role_id === 2) $kid['parent_id'] = $user->id;

//        $kid->save();

        return response()->json([
            'message' => 'Kid Created Successfully'
        ], 200);

    }

    public function update(CreateKidRequest $request, $id) : JsonResponse{
        Kid::where('id', $id)->update($request->except(['_token', '_method']));

        $this->findAdnMatchParents($request->private_number, $id);

        return response()->json([
            'message' => 'Kid Updated Successfully'
        ], 200);

    }

    public function delete($id) : JsonResponse{
        $kid = Kid::query()->findOrFail($id);

        $kid->delete();

        return response()->json([
            'message' => 'Kid Deleted Successfully'
        ], 200);

    }


    public function addSummary(CreateKidSummeryRequest $request, int $id){
        $kid = Kid::query()->findOrFail($id);

        $data = [
            'text' => $request['text'],
            'kid_id' => $kid['id'],
            'kindergarten_id' => $kid['kindergarten_id'],
            'group_id' => $kid['group_id'],
            'branch_id' => $kid['branch_id'],
        ];

        if($request['summary_id']){
            return Summary::where('id', $request['summary_id'])->update($data);
        }

        $summary = Summary::create($data);
        $summary->save();

        return $summary;
    }


}
