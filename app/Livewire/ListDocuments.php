<?php

namespace App\Livewire;

use App\Models\Document;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ListDocuments extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Document::query())
            ->columns([
                TextColumn::make('title')
                    ->label('Document Name')
                    ->limit(111)
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->label('Uploaded At')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->actions([
                Action::make('download')
                    ->icon('heroicon-m-folder-arrow-down')
                    ->color('success')
                    ->url(fn (Document $file) => Storage::url($file->getOriginal('document')))
                    ->openUrlInNewTab(),
            ])

            ->emptyStateHeading('Document data is empty')
            ->emptyStateDescription('Admin has not uploaded any document');
    }

    public function render()
    {
        return view('livewire.list-documents');
    }
}
