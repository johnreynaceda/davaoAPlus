<?php

namespace App\Livewire\Admin;

use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;



class MemberList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('user_type', 'member'))
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('is_approve')->label('STATUS')->badge()->formatStateUsing(
                    fn ($state) => $state ? 'Approved' : 'Pending'
                )->color(fn (string $state): string => match ($state) {
                    '0' => 'warning',
                    '1' => 'success',
                   
                })->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('approve')->button()->color('success')->icon('heroicon-s-hand-thumb-up')->action(
                    fn ($record) => $record->update(['is_approve' => true])
                )->visible(fn ($record) => !$record->is_approve),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.member-list');
    }
}
