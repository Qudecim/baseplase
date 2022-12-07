<?php

namespace App\Services;

use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Collection;

class StatusService
{

    /**
     * Create new status
     * @param User $user
     * @param array $data
     * @return Status
     */
    public static function create(User $user, array $data): Status
    {
        $status = new Status();
        $status->owner_id = $user->id;
        $status->name = $data['name'];
        $status->color = $data['color'];
        $status->save();
        return $status;
    }

    /**
     * @param User $user
     * @return Collection
     */
    public static function index(User $user): Collection
    {
        return $user->statuses()->get();
    }

    /**
     * @param Status $status
     * @return Status
     */
    public static function show(Status $status): Status
    {
        return $status;
    }

    /**
     * @param Status $status
     * @param array $data
     * @return Status
     */
    public static function update(Status $status, array $data): Status
    {
        $status->name = $data['name'];
        $status->color = $data['color'];
        $status->save();
        return $status;
    }

    /**
     * @param Status $status
     * @return void
     */
    public static function delete(Status $status): void
    {
        $status->delete();
    }

    /**
     * Create default statuses
     * @param User $user
     * @return void
     */
    public static function createDefault(User $user): void
    {
        $defaultStatuses = [
            [
                'owner_id'  => $user->id,
                'name'      => 'new',
                'color'     => '3498db',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ]
        ];

        Status::insert($defaultStatuses);
    }

    /**
     * @param User $user
     * @return int
     */
    public static function count(User $user): int
    {
        return $user->statuses()->count();
    }
}
