<?php

namespace App\Filament\Admin\Resources\BranchesResource;

use App\Filament\Admin\Resources\BranchesResource\Actions\BranchesAction;
use App\Filament\Admin\Resources\BranchesResource\Forms\BranchesForm;
use App\Filament\Admin\Resources\BranchesResource\Tables\BranchesTable;
use App\Models\Branches;
use App\Models\Provinces;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Filament\Actions\Action;

class BranchesResource extends Resource
{
    protected static ?string $model = Branches::class;
    protected static ?string $label = 'Chi Nhánh';
    protected static ?string $navigationGroup = 'Quản lý khu vực';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'name';

    public static function table(Table $table): Table
    {
        return BranchesTable::table($table);
    }

    public static function form(Form $form): Form
    {
        return BranchesForm::form($form);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranches::route('/create'),
            'edit' => Pages\EditBranches::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Tên chi nhánh' => $record->name,
            'Khu vực' => $record->province->name,
            'Địa chỉ' => $record->address
        ];
    }

    public static function getGlobalSearchResultActions(Model $record): array
    {
        return [
            Action::make('Cập nhật')
                ->iconButton()
                ->icon('heroicon-s-pencil')
                ->url(static::getUrl('edit', ['record' => $record])),
            Action::make('Xóa')
                ->iconButton()
                ->icon('heroicon-s-eye')
                ->url(static::getUrl('index'))
        ];

    }
}
