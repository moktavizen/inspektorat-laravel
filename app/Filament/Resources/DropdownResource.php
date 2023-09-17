<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DropdownResource\Pages;
use App\Filament\Resources\DropdownResource\RelationManagers;
use App\Models\Dropdown;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DropdownResource extends Resource
{
    protected static ?string $model = Dropdown::class;

    protected static ?string $modelLabel = 'Dropdown Menu';
    protected static ?string $pluralModelLabel = 'Dropdown Menus';


    protected static ?string $navigationIcon = 'heroicon-o-bars-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Dropdown Name')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Dropdown Name')
                    ->limit(50)
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDropdowns::route('/'),
        ];
    }
}
