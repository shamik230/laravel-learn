<?php

namespace App\Enums\Cars;

enum Status : int {
    case DRAFT = 0;
    case ACTIVE = 10;
    case SOLD = 20;
    case CANCELLED = 30;

    public function text() {
        return match ($this) {
            self::DRAFT => "Черновик",
            self::ACTIVE => "В продаже",
            self::SOLD => "Продано",
            self::CANCELLED => "Отменено",
        };
    }
}