<?php

namespace App\Livewire\Admin;

use App\Models\Payment;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PaymentList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Payment::query()->where('proof_of_payment', '!=', null)->orderByDesc('updated_at'))
            ->columns([
                TextColumn::make('due_date')->date()->label('DUE DATE')->searchable(),
                TextColumn::make('loan.user.name')->label('NAME')->searchable(),
                TextColumn::make('monthly_payment')->label('AMOUNT')->formatStateUsing(
                    fn($record) => '₱'.number_format($record->monthly_payment + $record->interest,2)
                )->searchable(),
                TextColumn::make('updated_at')->label('PAYMENT DATE')->date()->searchable(),
                TextColumn::make('is_paid')->badge()->label('STATUS')->formatStateUsing(
                    fn($record) => $record->is_paid ? 'PAID' : 'Payment Approval'
                )->color(fn (string $state): string => match ($state) {
                    '0' => 'warning',
                    '1' => 'success',
                })->icon(fn (string $state): string => match ($state) {
                    '0' => 'heroicon-o-clock',
                    '1' => 'heroicon-o-check',
                })->searchable(),
                TextColumn::make('id')->label('')->formatStateUsing(function ($record) {
                    $updatedAt = \Carbon\Carbon::parse($record->updated_at);
                    $dueDate = \Carbon\Carbon::parse($record->due_date);
                
                    return $updatedAt->lte($dueDate) ? 'On-Time' : 'Delay';
                })->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make('view')->label('View Payment')->color('warning')->icon('heroicon-m-eye')->form([
                        ViewField::make('rating')
                            ->view('filament.forms.proof')
                    ]),
                    Action::make('approve')->label('Approve Payment')->color('success')->icon('heroicon-m-hand-thumb-up')->action(
                        fn($record) => $record->update(['is_paid' => true]),
                    ),
                ])
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.payment-list');
    }
}
