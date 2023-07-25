<?php

namespace ControlUIKit\Traits;

trait TimeFunctions
{
    private function setKeys(array $array): array
    {
        return collect($array)->mapWithKeys(function ($item) {
            return [(int) $item => str_pad((string) $item, 2, '0', STR_PAD_LEFT)];
        })->toArray();
    }

    private function setHours(mixed $hours = null): array
    {
        if (is_string($hours)) {
            return $this->setKeys(explode(',', $hours));
        }

        if (is_array($hours)) {
            return $this->setKeys($hours);
        }

        if ($this->showAmPm) {
            return $this->setKeys(range(0, 11));
        }

        return $this->setKeys(range(0, 23));
    }

    private function setMinutes(mixed $minutes = null): array
    {
        if (is_string($minutes)) {
            return $this->setKeys(explode(',', $minutes));
        }

        if (is_array($minutes)) {
            return $this->setKeys($minutes);
        }

        return $this->setKeys([0, 15, 30, 45]);
    }

    private function setSeconds(mixed $seconds = null): array
    {
        if (is_string($seconds)) {
            return $this->setKeys(explode(',', $seconds));
        }

        if (is_array($seconds)) {
            return $this->setKeys($seconds);
        }

        return $this->setKeys(range(0, 59));
    }

    private function setFromFormat(): void
    {
        $this->showAmPm = str_contains($this->format, 'A');
        $this->hours = $this->setHours();
        $this->minutes = $this->setMinutes();
        $this->seconds = $this->setSeconds();
    }
}
