<?php
// app/Filament/Resources/RoomResource.php
namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
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

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $modelLabel = 'Kamar';

    protected static ?string $navigationLabel = 'Manajemen Kamar';

    protected static ?string $navigationGroup = 'Kos Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kamar')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Kamar')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('type')
                            ->label('Tipe Kamar')
                            ->options([
                                'Include Listrik' => 'Include Listrik',
                                'Listrik Sendiri' => 'Listrik Sendiri',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('price_monthly')
                            ->label('Harga Bulanan')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('price_yearly')
                            ->label('Harga Tahunan')
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('size')
                            ->label('Ukuran (m²)')
                            ->numeric(),
                        Forms\Components\TextInput::make('capacity')
                            ->label('Kapasitas')
                            ->numeric()
                            ->default(1),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_available')
                            ->label('Tersedia')
                            ->default(true),
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Kamar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe'),
                Tables\Columns\TextColumn::make('price_monthly')
                    ->label('Harga Bulanan')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_available')
                    ->label('Tersedia')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'Include Listrik' => 'Include Listrik',
                        'Listrik Sendiri' => 'Listrik Sendiri',
                    ]),
                Tables\Filters\TernaryFilter::make('is_available')
                    ->label('Ketersediaan'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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