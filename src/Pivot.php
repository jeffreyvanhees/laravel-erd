<?php

namespace Recca0120\LaravelErdGo;

use Recca0120\LaravelErdGo\Contracts\Drawable;

class Pivot implements Drawable
{
    private array $attributes;

    public function __construct(array $pivot)
    {
        $this->attributes = $pivot;
    }

    public function table(): string
    {
        return $this->getTableName($this->attributes['local_key']);
    }

    public function localKey(): string
    {
        return $this->attributes['local_key'];
    }

    public function foreignKey(): string
    {
        return $this->attributes['foreign_key'];
    }

    public function morphClass(): string
    {
        return $this->attributes['morph_class'] ?? '';
    }

    public function morphType(): string
    {
        return $this->attributes['morph_type'] ?? '';
    }

    private function getTableName(string $qualifiedKeyName)
    {
        return substr($qualifiedKeyName, 0, strpos($qualifiedKeyName, '.'));
    }
}