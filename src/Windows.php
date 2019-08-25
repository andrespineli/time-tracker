<?php

declare(strict_types=1);

namespace TimeTracker;

use TimeTracker\Collection;

class Windows extends Collection
{
    public function registerActivity(string $keyWord)
    {
        foreach ($this->array as $key => $window) {
            if ($window->name() ==  $keyWord) {
                $window->secondIncrease();
                $this->array[$key] = $window;
                Config::register($this->json());
                return;
            }
        }

        $this->add(new Window($keyWord));
    }

    private function json()
    {
        $json = [];

        foreach ($this->array as $window) {
            $json[] = [
                'window' => $window->name(),
                'seconds' => $window->activitySeconds(),
                'hours' => $window->activityHours()
            ];
        }

        $json['spent_seconds'] = array_sum(array_map(function ($value) {
            return $value['seconds'];
        }, $json));

        $json['spent_hours'] = array_sum(array_map(function ($value) {
            return $value['hours'];
        }, $json));

        return json_encode($json, JSON_PRETTY_PRINT);
    }
}
