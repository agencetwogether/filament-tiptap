<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

use FilamentTiptapEditor\TiptapEditor;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Tiptap works')
                ->form([
                    TiptapEditor::make('content')
                        ->live()
                        ->tools(['bold', 'italic'])
                        ->mergeTags(['tag1', 'tag2', 'tag3'])
                        ->columnSpanFull()
                        ->required(),
                ]),
        ];

    }

}
