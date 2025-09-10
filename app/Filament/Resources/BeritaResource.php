<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use App\Models\User; // <-- Tambahkan ini
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    // --- [PERUBAHAN LABEL DAN PENAMAAN] ---
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $navigationGroup = 'Konten'; // Grup menu di sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
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
                            ->unique(Berita::class, 'slug', ignoreRecord: true),

                        // --- [PERUBAHAN FIELD PENULIS] ---
                        Forms\Components\Hidden::make('user_id')
                            ->default(auth()->id()),

                        Forms\Components\RichEditor::make('isi_berita')
                            ->required()
                            ->columnSpanFull()
                            ->disableToolbarButtons([
                                'attachFiles',
                            ]),

                        SpatieMediaLibraryFileUpload::make('media')
                            ->label('Multi Gambar')
                            ->collection('berita_images')
                            ->disk('uploads')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->imageEditor(),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now()),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        // ... (Tidak ada perubahan di method table, jadi dibiarkan sama)
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('media')
                    ->label('Gambar')
                    ->collection('berita_images')
                    ->stacked()
                    ->circular()
                    ->limit(3),
                Tables\Columns\TextColumn::make('judul')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('author.name')->label('Penulis')->sortable(),
                Tables\Columns\IconColumn::make('is_published')->label('Status')->boolean(),
                Tables\Columns\TextColumn::make('published_at')->label('Dipublikasikan pada')->date()->sortable(),
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeritas::route('/'),
            // 'create' => Pages\CreateBerita::route('/create'),
            // 'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}