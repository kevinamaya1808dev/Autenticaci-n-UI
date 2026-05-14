<?php

namespace App\Filament\Resources\Productos;

use App\Filament\Resources\Productos\Pages;
use App\Models\Producto;
use App\Models\Categoria;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Support\Str;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Productos';
    protected static ?string $modelLabel = 'Producto';
    protected static ?string $pluralModelLabel = 'Productos';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Section::make('Información general')->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) =>
                        $set('slug', Str::slug($state))),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Forms\Components\Select::make('categoria_id')
                    ->label('Categoría')
                    ->options(Categoria::where('activo', true)->pluck('nombre', 'id'))
                    ->required()
                    ->searchable(),

                Forms\Components\RichEditor::make('descripcion')
                    ->label('Descripción')
                    ->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Precio e inventario')->schema([
                Forms\Components\TextInput::make('precio')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->minValue(0),

                Forms\Components\TextInput::make('precio_oferta')
                    ->label('Precio oferta')
                    ->numeric()
                    ->prefix('$')
                    ->minValue(0),

                Forms\Components\TextInput::make('existencia')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),

                Forms\Components\Toggle::make('activo')
                    ->default(true),

                Forms\Components\Toggle::make('destacado')
                    ->default(false),
            ])->columns(2),

            Forms\Components\Section::make('Imágenes')->schema([
                Forms\Components\FileUpload::make('imagenes')
                    ->label('Fotos del producto')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->directory('productos')
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->sortable(),
                Tables\Columns\TextColumn::make('precio')
                    ->money('MXN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('precio_oferta')
                    ->label('Precio oferta')
                    ->money('MXN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('existencia')->sortable(),
                Tables\Columns\IconColumn::make('activo')->boolean()->sortable(),
                Tables\Columns\IconColumn::make('destacado')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('categoria')
                    ->relationship('categoria', 'nombre'),
                Tables\Filters\TernaryFilter::make('activo'),
                Tables\Filters\TernaryFilter::make('destacado'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit'   => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}