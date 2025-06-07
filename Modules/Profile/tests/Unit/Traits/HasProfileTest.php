<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Profile\Concerns\HasProfile;
use Modules\Profile\Models\Profile;

it('defines a hasOne profile relation', function () {
    $stub = new class extends Model {
        use HasProfile;

        public $timestamps = false;
        protected $guarded = [];
    };

    $relation = $stub->profile();
    expect($relation)
        ->toBeInstanceOf(HasOne::class)
        ->and($relation->getRelated())
        ->toBeInstanceOf(Profile::class);
});
