<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers\ImagesRelationManager;
use App\Filament\Resources\RoomResource\RelationManagers\FacilitiesRelationManager;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $modelLabel = 'Kamar';

    protected static ?string $navigationLabel = 'Manajemen Kamar';

    protected static ?string $navigationGroup = 'Kos Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kamar')
                    ->description('Isi detail informasi kamar kos')
                    ->collapsible()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Kamar')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),
                            
                        Forms\Components\Select::make('type')
                            ->label('Tipe Kamar')
                            ->options([
                                'Include Listrik' => 'Include Listrik',
                                'Listrik Sendiri' => 'Listrik Sendiri',
                            ])
                            ->required()
                            ->native(false),
                            
                        Forms\Components\TextInput::make('price_monthly')
                            ->label('Harga Bulanan')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->inputMode('decimal'),
                            
                        Forms\Components\TextInput::make('price_yearly')
                            ->label('Harga Tahunan')
                            ->numeric()
                            ->prefix('Rp')
                            ->inputMode('decimal'),
                            
                        Forms\Components\TextInput::make('size')
                            ->label('Ukuran (m²)')
                            ->numeric()
                            ->suffix('m²'),
                            
                        Forms\Components\TextInput::make('capacity')
                            ->label('Kapasitas (orang)')
                            ->numeric()
                            ->default(1)
                            ->suffix('orang'),

                        Forms\Components\TextInput::make('initial_quantity')
                            ->label('Jumlah Awal Kamar')
                            ->numeric()
                            ->minValue(0)
                            ->required()
                            // ->disabled(fn ($operation) => $operation !== 'create')
                            ->helperText('Jumlah kamar saat pertama kali dibuat (tidak bisa diubah setelah dibuat)'),
                            
                        Forms\Components\TextInput::make('quantity')
                            ->label('Jumlah Kamar')
                            ->numeric()
                            ->default(1)
                            ->minValue(0)
                            ->step(1)
                            ->helperText('Jumlah total kamar yang tersedia untuk tipe ini')
                            ->live()
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('is_available', $state > 0)),
                            
                        Forms\Components\Toggle::make('is_available')
                            ->label('Tersedia')
                            ->default(true)
                            ->disabled()
                            ->helperText('Status ketersediaan dihitung otomatis berdasarkan jumlah kamar'),
                            
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(0),
                            
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull()
                            ->rows(3),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Kamar')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),
                    
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Include Listrik' => 'success',
                        'Listrik Sendiri' => 'warning',
                        default => 'gray',
                    }),
                    
                Tables\Columns\TextColumn::make('price_monthly')
                    ->label('Harga/Bulan')
                    ->money('IDR')
                    ->sortable()
                    ->alignEnd(),

                Tables\Columns\TextColumn::make('initial_quantity')
                    ->label('Jumlah Awal')
                    ->sortable()
                    ->alignCenter(),
                    
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->sortable()
                    ->alignCenter(),
                    
                Tables\Columns\TextColumn::make('available_rooms')
                    ->label('Tersedia')
                    ->getStateUsing(fn (Room $record): int => $record->is_available ? $record->quantity : 0)
                    ->badge()
                    ->color(fn (Room $record) => $record->is_available ? 'success' : 'danger')
                    ->alignCenter(),
                    
                Tables\Columns\IconColumn::make('is_available')
                    ->label('Status')
                    ->boolean()
                    ->alignCenter(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'Include Listrik' => 'Include Listrik',
                        'Listrik Sendiri' => 'Listrik Sendiri',
                    ])
                    ->label('Filter Tipe Kamar'),
                    
                Tables\Filters\TernaryFilter::make('is_available')
                    ->label('Status Ketersediaan')
                    ->placeholder('Semua')
                    ->trueLabel('Tersedia')
                    ->falseLabel('Habis'),
                    
                Tables\Filters\Filter::make('has_available_rooms')
                    ->label('Memiliki Kamar Kosong')
                    ->query(fn (Builder $query) => $query->where('quantity', '>', 0)->where('is_available', true))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->color('info'),
                    
                Tables\Actions\EditAction::make()
                    ->color('warning'),
                    
                Tables\Actions\Action::make('updateQuantity')
                    ->label('Update Jumlah')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->color('gray')
                    ->form([
                        Forms\Components\TextInput::make('quantity')
                            ->label('Jumlah Kamar')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->step(1)
                            ->default(fn (Room $record) => $record->quantity),
                    ])
                    ->action(function (Room $record, array $data): void {
                        $record->update([
                            'quantity' => $data['quantity'],
                            'is_available' => $data['quantity'] > 0,
                        ]);
                    }),
                    
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    Tables\Actions\BulkAction::make('updateAvailability')
                        ->label('Update Ketersediaan')
                        ->icon('heroicon-o-check-circle')
                        ->form([
                            Forms\Components\Toggle::make('is_available')
                                ->label('Tersedia')
                                ->required(),
                        ])
                        ->action(function (Collection $records, array $data): void {
                            $records->each(function (Room $record) use ($data) {
                                $record->update([
                                    'is_available' => $data['is_available'],
                                ]);
                            });
                        }),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            ImagesRelationManager::class,
            FacilitiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            // 'view' => Pages\ViewRoom::route('/{record}'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}