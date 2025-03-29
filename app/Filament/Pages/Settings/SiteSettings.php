<?php

namespace App\Filament\Pages\Settings;

use Closure;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
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
                ])
                ->columnSpanFull()
        ];
    }
}