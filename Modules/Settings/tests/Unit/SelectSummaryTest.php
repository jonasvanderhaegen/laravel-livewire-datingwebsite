<?php

use Illuminate\Support\Collection;
use Modules\Settings\Traits\SelectSummary;

beforeEach(function () {
    // create an anonymous class just to host the trait
    $this->service = new class {
        use SelectSummary;
    };

    // define a sample config array under a test key
    config()->set('test.options', [
        ['identifier' => 'a', 'name' => 'Option A'],
        ['identifier' => 'b', 'name' => 'Option B'],
        ['identifier' => 'c', 'name' => 'Option C'],
    ]);
});

it('getTranslateKeyFromSelectFromConfig returns empty string for null or empty', function () {
    expect($this->service->getTranslateKeyFromSelectFromConfig(null, 'test.options'))->toBe('');
    expect($this->service->getTranslateKeyFromSelectFromConfig('', 'test.options'))->toBe('');
});

it('returns custom when value is "custom" and custom string provided', function () {
    expect($this->service->getTranslateKeyFromSelectFromConfig(
        'custom',
        'test.options',
        'name',
        'My Custom'
    ))->toBe('My Custom');
});

it('looks up by identifier when given a string', function () {
    expect($this->service->getTranslateKeyFromSelectFromConfig('b', 'test.options'))
        ->toBe(__('Option B'));
    // not found should fall back to empty
    expect($this->service->getTranslateKeyFromSelectFromConfig('z', 'test.options'))
        ->toBe('');
});

it('treats an integer as 1-based index', function () {
    // 1-based index 3 → zero-based 2 → 'Option C'
    expect($this->service->getTranslateKeyFromSelectFromConfig(3, 'test.options'))
        ->toBe(__('Option C'));
    // out of range returns empty
    expect($this->service->getTranslateKeyFromSelectFromConfig(10, 'test.options'))
        ->toBe('');
});

it('summarizeSelect returns empty when no values', function () {
    expect($this->service->summarizeSelect([], 'test.options'))->toBe('');
    expect($this->service->summarizeSelect(Collection::make([]), 'test.options'))->toBe('');
});

it('summarizeSelect returns single label when exactly one', function () {
    // index 2 → Option B
    expect($this->service->summarizeSelect([2], 'test.options'))
        ->toBe(__('Option B'));
});

it('summarizeSelect returns "FirstName, +N more" when multiple', function () {
    // [1,3,2] → labels ['Option A','Option C','Option B']
    $result = $this->service->summarizeSelect([1, 3, 2], 'test.options');
    expect($result)->toBe(__('Option A').', +2 more');
});

it('summarizeSelect accepts a Collection input', function () {
    $values = Collection::wrap([3, 1]);
    expect($this->service->summarizeSelect($values, 'test.options'))
        ->toBe(__('Option C').', +1 more');
});

it('ignores totally invalid indexes and returns empty', function () {
    expect($this->service->summarizeSelect([999], 'test.options'))->toBe('');
});

it('filters out invalid indexes and still summarizes the valid ones', function () {
    // [1, 999] → only index 1 is valid → Option A
    expect($this->service->summarizeSelect([1, 999], 'test.options'))
        ->toBe(__('Option A'));
});
