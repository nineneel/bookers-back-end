<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Book Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        $block_option = ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G'];
        $row_option = ['1' => '1', '2' => '2', '3' => '3', '4' => '4'];
        $lane_option = ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8'];

        return $form
            ->schema([
                Card::make()->schema([
                    Grid::make([
                        'default' => 1,
                        'sm' => 2,
                    ])->schema([
                        TextInput::make('title')->required(),
                        TextInput::make('year')->numeric()->required(),
                    ]),
                    Grid::make([
                        'default' => 1,
                        'sm' => 2,
                    ])->schema([
                        Select::make('genre_id')
                            ->multiple()
                            ->relationship('genres', 'name')
                            ->options(Genre::all()->pluck('name', 'id'))->required(),
                        Select::make('author_id')
                            ->multiple()
                            ->relationship('authors', 'name')
                            ->options(Author::all()->pluck('name', 'id'))
                            ->searchable()->required()
                    ]),

                    Textarea::make('description')->required(),
                    SpatieMediaLibraryFileUpload::make('cover')->collection('books')->required(),
                    Grid::make([
                        'default' => 1,
                        'sm' => 2,
                    ])->schema([
                        Fieldset::make('Location')
                            ->relationship('location')
                            ->schema([
                                Grid::make([
                                    'sm' => 3
                                ])->schema([
                                    Select::make('block')
                                        ->options($block_option)->required(),
                                    Select::make('lane')
                                        ->options($lane_option)->required(),
                                    Select::make('row')
                                        ->options($row_option)->required()
                                ])
                            ]),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('title'),
                TextColumn::make('year'),
                SpatieMediaLibraryImageColumn::make('cover')->collection('books'),
            ])
            ->filters([])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
