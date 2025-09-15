<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenResource\Pages;
use App\Models\Dokumen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder; // <-- Pastikan ini ada

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
    protected static ?string $modelLabel = 'Dokumen';
    protected static ?string $pluralModelLabel = 'Dokumen';
    protected static ?string $navigationLabel = 'Dokumen';
    protected static ?string $navigationGroup = 'Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->hint('Opsional') // <-- [PERUBAHAN] Menambahkan hint
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('dokumen_file')
                    ->label('File Dokumen')
                    ->collection('dokumen_file')
                    ->disk('uploads')
                    ->required()
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ])
                    ->maxSize(10240),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publikasikan Dokumen')
                    ->default(true),
                Forms\Components\Select::make('user_id')
                    ->label('Diupload oleh')
                    ->relationship('user', 'name')
                    ->default(auth()->id())
                    ->disabled()
                    ->dehydrated(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Diupload oleh')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Dokumen $record): string => $record->getFirstMediaUrl('dokumen_file'))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // <-- [PERUBAHAN] Menambahkan method ini untuk Eager Loading
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('media');
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDokumens::route('/'),
            // 'create' => Pages\CreateDokumen::route('/create'),
            // 'edit' => Pages\EditDokumen::route('/{record}/edit'),
        ];
    }    
}