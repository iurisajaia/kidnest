<?php

namespace Database\Seeders;

use App\Enums\ActivityEnum;
use App\Models\Activity;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $groups = Group::all();

        foreach($groups as $group){
            foreach (ActivityEnum::ACTIVITIES as $activity){
                $existing = Activity::query()->whereJsonContains('title', $activity['title'])->where('group_id', $group->id)->first();

                if(!$existing){
                    Activity::create([
                        'title' => $activity['title'],
                        'description' => $activity['description'],
                        'group_id' => $group->id,
                        'kindergarten_id' => $group->kindergarten_id
                    ]);
                }
            }
        }
    }
}
