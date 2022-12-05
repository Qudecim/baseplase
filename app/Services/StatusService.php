<?php

namespace App\Services;

use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Collection;

class StatusService
{

    /**
     * Create new status
     * @param string $name
     * @param string $color
     * @return Status
     */
    public static function create(string $name, string $color): Status
    {
        $status = new Status();
        $status->owner_id = auth()->id();
        $status->name = $name;
        $status->color = $color;
        $status->save();
        return $status;
    }

    /**
     * @return Collection
     */
    public static function index(): Collection
    {
        return auth()->user()->statuses()->get();
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
     * @return void
     */
    public static function createDefault(): void
    {
        $defaultStatuses = [
            [
                'owner_id'  => auth()->id,
                'name'      => 'new',
                'color'     => '3498db',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ]
        ];

        Status::insert($defaultStatuses);
    }

}
