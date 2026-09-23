<?php

namespace App\Filament\Resources\Pegawais\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PegawaisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nip')->label('NIP')->searchable()->sortable(),
                TextColumn::make('nama')->label('Nama')->searchable()->sortable(),

                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->badge()
                    ->formatStateUsing(fn(string $state) => $state === 'L' ? 'Laki-laki' : 'Perempuan')
                    ->color(fn(string $state) => $state === 'L' ? 'info' : 'pink'),

                TextColumn::make('tanggal_lahir')
                    ->label('Usia')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->age . ' tahun')
                    ->sortable(),

                TextColumn::make('pendidikan_terakhir')->label('Pendidikan')->badge()->sortable(),
                TextColumn::make('jabatan')->label('Jabatan')->searchable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
