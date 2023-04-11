<?php

namespace App\Services;

use App\Models\User;
use App\Exceptions\NotEnoughCreditException;

class UserService
{
    public static function increaseCredits(User $user, float $value): void
    {
        self::decreaseCredits($user, -$value);
    }

    public static function decreaseCredits(User $user, float $value): void
    {
        $user->credit -= $value;
        $user->save();
    }

    public static function checkCredits(User $user, float $price): void
    {
        $lockedUser = User::lockForUpdate()->find($user->id);

        if ($lockedUser->credit < $price) {
            throw new NotEnoughCreditException('Недостаточно кредита.');
        }
    }
}
