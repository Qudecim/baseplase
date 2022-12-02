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
    public static function get(User $user, Status $status): Status
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

    public static function delete(Status $status)
    {
        $status->delete();
    }

}
