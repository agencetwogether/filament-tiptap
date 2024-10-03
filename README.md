## Issue with Tiptap editor in RelationManager

This repo demonstrate an issue with Tiptap editor

```git clone git@github.com:agencetwogether/filament-tiptap.git```

```cd filament-tiptap```

```composer install```

```npm install```

```npm run build```

```cp .env.example .env```

```php artisan key:generate```

```php artisan migrate --seed```

Go to your browser and connect with credentials
```admin@admin.com // password```

See the problem in View Post Page, when you click on `Tiptap works` button in header action, tags can be dragged in modal

If you click on `Tiptap not working` in header Comments Relation manager, tags can't be dragged... If you close Merge tags button, on the right and then open Merge tags you can drag one tag, until you close again Merge tags menu...

```ViewPost Page```
```php
use Filament\Actions\Action;

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
```

```CommentsRelationManager Page```
```php
use Filament\Tables\Actions\Action;

->headerActions([
    //Tables\Actions\CreateAction::make(),
    Action::make('Tiptap not working')
        ->form([
            TiptapEditor::make('content')
                ->live()
                ->tools(['bold', 'italic'])
                ->mergeTags(['tag1', 'tag2', 'tag3'])
                ->columnSpanFull()
                ->required(),
        ]),
    ])
```

I notice if I have only one Relation Manager and so no tabs to navigate between relation managers, tags works !
