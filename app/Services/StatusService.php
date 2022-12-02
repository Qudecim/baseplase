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
     * @param string $name
     * @param string $color
     * @return Status
     */
    public static function create(User $user, string $name, string $color): Status
    {
        $status = new Status();
        $status->owner_id = $user->id;
        $status->name = $name;
        $status->color = $color;
        $status->save();
        return $status;
    }

    /**
     * @param User $user
     * @return Collection
     */
    public static function all(User $user): Collection
    {
        return $user->statuses()->get();
    }

    /**
     * @param User $user
     * @param Status $status
     * @return Status
     * @throws \Exception
     */
    public static function show(User $user, Status $status): Status
    {
        if ($status->owner_id == $user->id) {
            return $status;
        }
        throw new \Exception('');
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
     * @param User $user
     * @param Status $status
     * @return void
     */
    public static function delete(User $user, Status $status): void
    {
        if ($status->owner_id == $user->id) {
            $status->delete();
        }
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

}
