<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms\Components\Section as ComponentsSection;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                ComponentsSection::make("Product Detail")
                    ->description("put your product detail here")
                    ->schema([

                        Forms\Components\TextInput::make('name')->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),

                        Forms\Components\TextInput::make('quantity')
                            ->required()
                            ->numeric(),
                        Forms\Components\FileUpload::make('product_imager'),
                        Forms\Components\TextInput::make('brand')
                            ->required()
                            ->maxLength(10),
                        Forms\Components\TextInput::make('discount')
                            ->required()
                            ->prefix('%')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(99),
                        Forms\Components\Textarea::make('description')
                            ->required(),
                    ])->columns(2),
                ComponentsSection::make("Product relationships")
                    ->schema([
                        Forms\Components\TextInput::make("category_id")
                            ->label("Category")
                            ->required(),

                        Select::make('user_id')
                            ->searchable()
                            ->label("User")
                            ->default(fn() => Auth::id())
                            ->preload()
                            ->relationship(name: "user", titleAttribute: "username")
                            ->required(),
                    ]),



            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->label('Category')
                    ->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.username')
                    ->label('Username')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),

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
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
