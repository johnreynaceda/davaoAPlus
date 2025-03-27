<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
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
                TextColumn::make('is_approve')
                    ->label('STATUS')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state ? 'Approved' : 'Pending')
                    ->color(fn(bool $state): string => $state ? 'success' : 'warning')
                    ->searchable(),
            ])
            ->actions([
                Action::make('approve')
                    ->button()
                    ->color('success')
                    ->icon('heroicon-s-hand-thumb-up')
                    ->action(function ($record) {
                        $record->update(['is_approve' => true]);

                        if (!empty($record->contact)) {
                            $number = $record->contact;
                            $message = "DAVAO A+ \n\nYour account has been approved. Thank you.";
                            $this->sendSms($number, $message);
                        }

                        return redirect()->route('admin.member');
                    })
                    ->visible(fn($record) => !$record->is_approve),
            ]);
    }

    public function sendSms($number, $message)
    {
        $ch = curl_init();
        $parameters = [
            'apikey' => '046125f45f4f187e838905df98273c4e', // Your API KEY
            'number' => $number,
            'message' => $message, // Encode message properly
            'sendername' => 'Estanz',
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            \Log::error('SMS sending failed: ' . $output);
        } else {
            \Log::info('SMS sent successfully: ' . $output);
        }
    }

    public function render()
    {
        return view('livewire.admin.member-list');
    }
}
