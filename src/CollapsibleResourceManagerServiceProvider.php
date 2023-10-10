<?php

namespace Workup\CollapsibleResourceManager;

use Laravel\Nova\Nova;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class CollapsibleResourceManagerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        MenuItem::macro('icon', function (string $value) {
            return $this->data(array_merge($this->data ?? [], [ 'icon' => $value ]));
        });

        Nova::serving(function (ServingNova $event): void {

            Nova::script('collapsible-resource-manager', __DIR__ . '/../dist/js/tool.js');
            Nova::style('collapsible-resource-manager', __DIR__ . '/../dist/css/card.css');

        });
    }
}
