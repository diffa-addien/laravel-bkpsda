<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload; // <-- Ganti komponen
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn; // <-- Ganti komponen
use Illuminate\Database\Eloquent\Builder;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $modelLabel = 'Slider';
    protected static ?string $pluralModelLabel = 'Slider';
    protected static ?string $navigationLabel = 'Background Slider';
    protected static ?string $navigationGroup = 'Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('slider_image') // <-- Ganti komponen
                    ->label('Gambar Slider')
                    ->collection('sliders') // Nama collection harus sama dengan di Model
                    ->disk('uploads')
                    ->required()
                    ->image()
                    ->imageEditor(),
                Forms\Components\TextInput::make('title')
                    ->label('Judul (Opsional)')
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle')
                    ->label('Sub Judul (Opsional)')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktifkan')
                    ->default(true),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('slider_image') // <-- Ganti komponen
                    ->label('Gambar')
                    ->collection('sliders'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\IconColumn::make('is_active')->label('Aktif')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->label('Urutan')->sortable(),
            ])
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
            ->reorderable('sort_order');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('media');
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            // 'create' => Pages\CreateSlider::route('/create'),
            // 'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }    
}