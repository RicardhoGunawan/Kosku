<?php

namespace App\Filament\Pages\Settings;

use Closure;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;

use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;

class SiteSettings extends BaseSettings
{
    public static function getNavigationLabel(): string
    {
        return 'Pengaturan Situs';
    }

    public function getTitle(): string
    {
        return 'Pengaturan Umum Situs';
    }

    public function schema(): array|Closure
    {
        return [
            Tabs::make('Pengaturan')
                ->schema([
                    Tabs\Tab::make('Informasi Umum')
                        ->schema([
                            TextInput::make('site.name')
                                ->label('Nama Situs')
                                ->required(),
                            Textarea::make('site.description')
                                ->label('Deskripsi Situs'),
                            FileUpload::make('site.logo')
                                ->label('Logo Situs')
                                ->image()
                                ->directory('settings/logo'),
                        ]),
                    Tabs\Tab::make('Tentang Kami')
                        ->schema([
                            Section::make('Bagian Tentang Kami')
                                ->description('Atur bagian Tentang Kami yang akan tampil di halaman utama.')
                                ->schema([
                                    Textarea::make('about.description')
                                        ->label('Deskripsi')
                                        ->rows(5)
                                        ->dehydrateStateUsing(fn($state) => trim($state, '"'))
                                        ->formatStateUsing(fn($state) => trim($state, '"')),

                                    FileUpload::make('about.image')
                                        ->label('Gambar')
                                        ->image()
                                        ->directory('about')
                                        ->preserveFilenames()
                                        ->visibility('public')
                                        ->imagePreviewHeight('150'),
                                ]),
                        ]),




                    Tabs\Tab::make('Kontak')
                        ->schema([
                            TextInput::make('contact.phone')
                                ->label('Telepon'),
                            TextInput::make('contact.email')
                                ->label('Email')
                                ->email(),
                            TextInput::make('contact.address')
                                ->label('Alamat')
                                ->columnSpanFull(),
                        ]),

                    Tabs\Tab::make('Media Sosial')
                        ->schema([
                            TextInput::make('social.facebook')
                                ->label('Facebook')
                                ->prefix('https://facebook.com/'),
                            TextInput::make('social.instagram')
                                ->label('Instagram')
                                ->prefix('https://instagram.com/'),
                            TextInput::make('social.twitter')
                                ->label('Twitter')
                                ->prefix('https://twitter.com/'),
                        ]),
                    Tabs\Tab::make('Keunggulan')
                        ->schema([
                            Section::make('Pengaturan Bagian')
                                ->schema([
                                    TextInput::make('features.tag')
                                        ->label('Label Tag')
                                        ->default('KENAPA MEMILIH KAMI'),
                                    TextInput::make('features.title')
                                        ->label('Judul Bagian')
                                        ->default('Keunggulan Kosku'),
                                    Textarea::make('features.subtitle')
                                        ->label('Subjudul')
                                        ->default('Kami menyediakan tempat kos terbaik dengan berbagai keunggulan untuk kenyamanan Anda')
                                        ->rows(2),
                                ]),

                            Repeater::make('features.items')
                                ->label('Daftar Keunggulan')
                                ->schema([
                                    TextInput::make('icon')
                                        ->label('Ikon (kelas Font Awesome)')
                                        ->required()
                                        ->placeholder('fas fa-shield-alt'),
                                    TextInput::make('title')
                                        ->label('Judul')
                                        ->required(),
                                    Textarea::make('description')
                                        ->label('Deskripsi')
                                        ->rows(3),
                                ])
                                ->defaultItems(4)
                                ->maxItems(4)
                                ->columns(1),
                        ]),
                ])
                ->columnSpanFull()
        ];
    }
}