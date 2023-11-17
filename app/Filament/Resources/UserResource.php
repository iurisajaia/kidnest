<?php

namespace App\Filament\Resources;

use App\Enums\UserRoleEnum;
use App\Enums\UserStatusEnum;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
//                Forms\Components\TextInput::make('password')
//                    ->password()
//                    ->required()
//                    ->maxLength(255),
                Forms\Components\TextInput::make('private_number')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('profile_image')
                    ->image(),
                Select::make('user_role_id')
                    ->relationship('role', 'title')
                    ->default(1)
                    ->preload()
                    ->required()
                    ->reactive(),
                Forms\Components\KeyValue::make('user_data'),
                Forms\Components\Select::make('status')
                ->options([
                    UserStatusEnum::MOTHER => 'დედა',
                    UserStatusEnum::FATHER => 'მამა',
                    UserStatusEnum::SISTER_BROTHER => 'და/ძმა',
                    UserStatusEnum::GRANDPARENT => 'ბებია/ბაბუა',

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('private_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role.title')->sortable(),
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
                Tables\Filters\SelectFilter::make('user_role_id')
                    ->options([
                        UserRoleEnum::KINDERGARTEN['id'] => 'ბაღი',
                        UserRoleEnum::EDUCATOR['id'] => 'აღმზრდელი',
                        UserRoleEnum::MANAGER['id'] => 'მენეჯერი',
                        UserRoleEnum::PARENT['id'] =>'მშობელი',
                        UserRoleEnum::PSYCHOLOGIST['id'] => 'ფსიქოლოგი',
                    ])
                ->label('როლი')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
