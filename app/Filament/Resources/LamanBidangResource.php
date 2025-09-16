<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LamanBidangResource\Pages;
use App\Models\LamanBidang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Actions\Action; // <-- Tambahkan ini
use Filament\Notifications\Notification; // <-- Tambahkan ini


class LamanBidangResource extends Resource
{
    protected static ?string $model = LamanBidang::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // --- [PENGATURAN SUB-MENU] ---
    protected static ?string $modelLabel = 'Laman Bidang';
    protected static ?string $pluralModelLabel = 'Laman Bidang';
    protected static ?string $navigationLabel = 'Laman Bidang';
    protected static ?string $navigationGroup = 'Halaman';
    protected static ?string $navigationParentItem = 'Bidang'; // <-- Ini membuat jadi sub-menu dari 'Bidang'


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->unique(LamanBidang::class, 'slug', ignoreRecord: true),
                Forms\Components\RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_published')->label('Publikasikan')->default(true),
                Forms\Components\Select::make('user_id')->label('Dibuat oleh')->relationship('user', 'name')->default(auth()->id())->disabled()->dehydrated(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\IconColumn::make('is_published')->label('Status')->boolean(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // --- [TOMBOL COPY LINK] ---
                Action::make('copyLink')
                    ->label('Copy Link')
                    ->icon('heroicon-o-clipboard-document')
                    ->color('gray')
                    ->action(function ($record) {
                        $url = route('laman-bidang.show', $record);
                        return Notification::make()
                            ->title('Link berhasil disalin!')
                            ->body($url)
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation() // Untuk menampilkan notifikasi
                    ->modalHeading('Salin Link Publik')
                    ->modalDescription(fn ($record) => 'URL: ' . route('laman-bidang.show', $record))
                    ->modalSubmitActionLabel('Tutup'),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLamanBidangs::route('/'),
            // 'create' => Pages\CreateLamanBidang::route('/create'),
            // 'edit' => Pages\EditLamanBidang::route('/{record}/edit'),
        ];
    }    
}