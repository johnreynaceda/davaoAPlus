<?php

namespace App\Livewire\Member;

use App\Models\Loan;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MyLoan extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Loan::query()->where('user_id', auth()->user()->id))
            ->columns([
                TextColumn::make('created_at')->date()->label('DATE')->searchable(),
                TextColumn::make('loan_amount')->label('LOAN AMOUNT')->formatStateUsing(
                    fn($record) => '₱'. number_format($record->loan_amount,2),
                )->searchable(),
                TextColumn::make('term')->label('TERM')->formatStateUsing(
                    fn($record) => $record->term.' month(s)',
                )->searchable(),
                TextColumn::make('status')->label('STATUS')->searchable()->formatStateUsing(
                    fn($record) => ucfirst($record->status)
                )->badge()->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                })->icon(fn (string $state): string => match ($state) {
                    'pending' => 'heroicon-o-clock',
                    'approved' => 'heroicon-o-hand-thumb-up',
                    'rejected' => 'heroicon-o-hand-thumb-down',
                }),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.member.my-loan');
    }
}
