<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DropdownItemResource\Pages;
use App\Filament\Resources\DropdownItemResource\RelationManagers;
use App\Models\DropdownItem;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use FilamentTiptapEditor\TiptapEditor;

class DropdownItemResource extends Resource
{
    protected static ?string $model = DropdownItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(12)
            ->schema([
                Section::make()
                    ->columnSpan(9)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Item Name')
                            ->required()
                            ->maxLength(2048)
                            ->live(debounce: 1000)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(2048),
                        TiptapEditor::make('body')
                            ->label('Content')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make()
                    ->columnSpan(3)
                    ->schema([
                        Forms\Components\Select::make('dropdown_id')
                            ->relationship('dropdown', 'title')
                            ->required(),
                        Forms\Components\DateTimePicker::make('created_at')
                            ->disabled()
                            ->seconds(false),
                        Forms\Components\DateTimePicker::make('updated_at')
                            ->disabled()
                            ->seconds(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Item Name')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('dropdown.title')
                    ->label('Dropdown Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y H:i')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->defaultSort('sort', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDropdownItems::route('/'),
            'create' => Pages\CreateDropdownItem::route('/create'),
            'edit' => Pages\EditDropdownItem::route('/{record}/edit'),
        ];
    }
}
