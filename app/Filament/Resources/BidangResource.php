<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BidangResource\Pages;
use App\Models\Bidang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BidangResource extends Resource
{
    protected static ?string $model = Bidang::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $modelLabel = 'Bidang';
    protected static ?string $pluralModelLabel = 'Bidang';
    protected static ?string $navigationLabel = 'Bidang';
    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Utama Bidang')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(Bidang::class, 'slug', ignoreRecord: true),
                    ]),
                
                Forms\Components\Section::make('Sub Halaman 1 (Opsional)')
                    ->schema([
                        Forms\Components\TextInput::make('sub_halaman_1_judul')->label('Judul'),
                        Forms\Components\TextInput::make('sub_halaman_1_url')->label('URL'),
                        Forms\Components\Textarea::make('sub_halaman_1_deskripsi')->label('Deskripsi Singkat'),
                    ])->columns(2),

                Forms\Components\Section::make('Sub Halaman 2 (Opsional)')
                    ->schema([
                        Forms\Components\TextInput::make('sub_halaman_2_judul')->label('Judul'),
                        Forms\Components\TextInput::make('sub_halaman_2_url')->label('URL'),
                        Forms\Components\Textarea::make('sub_halaman_2_deskripsi')->label('Deskripsi Singkat'),
                    ])->columns(2),

                Forms\Components\Section::make('Sub Halaman 3 (Opsional)')
                    ->schema([
                        Forms\Components\TextInput::make('sub_halaman_3_judul')->label('Judul'),
                        Forms\Components\TextInput::make('sub_halaman_3_url')->label('URL'),
                        Forms\Components\Textarea::make('sub_halaman_3_deskripsi')->label('Deskripsi Singkat'),
                    ])->columns(2),

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
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBidangs::route('/'),
            // 'create' => Pages\CreateBidang::route('/create'),
            // 'edit' => Pages\EditBidang::route('/{record}/edit'),
        ];
    }    
}