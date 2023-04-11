<?php

namespace App\Services;

use App\Models\User;
use App\Models\Taxi;
use App\Models\Color;
use App\Models\UserTaxi;
use Illuminate\Support\Facades\DB;
use App\Exceptions\NotEnoughCreditException;

class TaxiService
{
    public static function buy(User $user, Taxi $taxi): void
    {
        DB::transaction(function () use ($user, $taxi) {
            UserService::checkCredits($user, $taxi->price);

            UserService::decreaseCredits($user, $taxi->price);

            UserTaxi::create([
                'user_id' => $user->id,
                'taxi_id' => $taxi->id,
                'price' => $taxi->price,
            ]);
        });
    }

    public static function changeColor(User $user, array $data): void
    {
        DB::transaction(function () use ($user, $data) {
            $color = Color::find($data['color_id']);
            $userTaxi = UserTaxi::find($data['taxi_id']);
            
            if ($userTaxi->is_painted) {
                UserService::checkCredits($user, $color->price);
                UserService::decreaseCredits($user, $color->price);
            }
            
            $userTaxi->update([
                'color_id' => $color->id,
                'is_painted' => true
            ]);
        });
    }
}
