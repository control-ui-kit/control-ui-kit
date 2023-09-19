<?php

namespace ControlUIKit\Traits;

use Illuminate\View\ComponentAttributeBag;

trait LivewireAttributes
{
    public function livewireAttribute(ComponentAttributeBag $wireModel): array
    {
        $wireCount = count($wireModel->getAttributes());

        if ($wireCount) {
            $wireModelType = key($wireModel->getAttributes());
            $model = $wireModel->getAttributes()[$wireModelType];
            $suffix = str_replace('wire:model', '', $wireModelType);
        } else {
            $model = null;
            $suffix = '';
        }

        return [$model, $suffix];
    }
}
