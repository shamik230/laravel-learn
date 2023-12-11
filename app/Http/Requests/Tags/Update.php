<?php

namespace App\Http\Requests\Tags;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends Store
{
    protected function titleUniqueRule() {
        return parent::titleUniqueRule()->ignore($this->tag->id);
    }
}
