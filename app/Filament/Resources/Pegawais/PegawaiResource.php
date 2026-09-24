<?php

namespace App\Filament\Resources\Pegawais;

use App\Filament\Resources\Pegawais\Pages\CreatePegawai;
use App\Filament\Resources\Pegawais\Pages\EditPegawai;
use App\Filament\Resources\Pegawais\Pages\ListPegawais;
use App\Filament\Resources\Pegawais\Schemas\PegawaiForm;
use App\Filament\Resources\Pegawais\Tables\PegawaisTable;
use App\Models\Pegawai;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $modelLabel = 'Data'; // Add Button label

    protected static ?string $pluralModelLabel = 'Data Pegawai'; // Model Label

    protected static ?string $navigationLabel = 'Data Pegawai'; // Navigation label

    protected static string|UnitEnum|null $navigationGroup = 'Management'; // Menu Group label

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'pegawai'; // Record title attribute

    public static function getGloballySearchableAttributes(): array // Global searchable attributes
    {
        return [
            'nama',
            'nip',
            'jabatan',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return PegawaiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PegawaisTable::configure($table);
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
            'index' => ListPegawais::route('/'),
            'create' => CreatePegawai::route('/create'),
            'edit' => EditPegawai::route('/{record}/edit'),
        ];
    }
}
