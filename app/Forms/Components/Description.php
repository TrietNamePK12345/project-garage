<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class Description extends Component
{
    protected string $view = 'forms.components.description';

    public ?string $content = null;

    public static function make(): static
    {
        return app(static::class);
    }

}
