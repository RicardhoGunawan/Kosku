<?php

namespace App\Filament\Resources\RoomResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FacilitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'facilities';

    protected static ?string $title = 'Fasilitas Kamar';

    protected static ?string $icon = 'heroicon-o-wrench-screwdriver';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('facility_id')
                    ->relationship(
                        name: 'facility',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('type')->orderBy('name')
                    )
                    ->label('Fasilitas')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull()
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name} ({$record->type})"),

                Forms\Components\Toggle::make('is_available')
                    ->label('Tersedia')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Fasilitas')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'room' => 'primary',
                        'public' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'room' => 'Fasilitas Kamar',
                        'public' => 'Fasilitas Umum',
                        default => $state,
                    }),

                Tables\Columns\IconColumn::make('pivot.is_available')
                    ->label('Tersedia')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Tipe Fasilitas')
                    ->options([
                        'room' => 'Fasilitas Kamar',
                        'public' => 'Fasilitas Umum',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->form(fn (Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect()
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name} ({$record->type})"),
                        
                        Forms\Components\Toggle::make('is_available')
                            ->label('Tersedia')
                            ->default(true),
                    ]),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Toggle::make('pivot.is_available')
                            ->label('Tersedia'),
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->form(fn (Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect()
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name} ({$record->type})"),
                            
                        Forms\Components\Toggle::make('is_available')
                            ->label('Tersedia')
                            ->default(true),
                    ]),
            ]);
    }

    public static function getModelLabel(): string
    {
        return 'Fasilitas';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Fasilitas Kamar';
    }
}