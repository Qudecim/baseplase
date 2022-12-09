<?php

namespace App\Services;

use App\Models\Action;
use App\Models\User;

class ActionService
{
    /**
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function index(User $user)
    {
        return $user->actions()->get();
    }

    /**
     * @param Action $action
     * @return Action
     */
    public static function show(Action $action): Action
    {
        return $action;
    }

    /**
     * @param User $user
     * @param array $data
     * @return Action
     */
    public static function create(User $user, array $data): Action
    {
        $action = new Action();
        $action->owner_id = $user->id;
        $action->publisher = $data['publisher'];
        $action->publisher_data = json_encode($data['publisher_data']);
        $action->subscriber = $data['subscriber'];
        $action->subscriber_data = json_encode($data['subscriber_data']);
        $action->save();
        return $action;
    }

    /**
     * @param Action $action
     * @param array $data
     * @return Action
     */
    public static function update(Action $action, array $data): Action
    {
        $action->publisher = $data['publisher'];
        $action->publisher_data = json_encode($data['publisher_data']);
        $action->subscriber = $data['subscriber'];
        $action->subscriber_data = json_encode($data['subscriber_data']);
        $action->save();
        return $action;
    }

    /**
     * @param Action $brand
     * @return void
     */
    public static function destroy(Action $brand): void
    {
        $brand->delete();
    }

    /**
     * @param User $user
     * @return int
     */
    public static function count(User $user): int
    {
        return $user->actions()->count();
    }
}
