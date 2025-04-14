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

class ManagerList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('user_type', 'manager'))->headerActions([
                    Action::make('new_manager')
                        ->label('New Manager')
                        ->icon('heroicon-o-plus')->color('success')->form([
                                \Filament\Forms\Components\TextInput::make('name')
                                    ->label('Name')
                                    ->required(),
                                \Filament\Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),
                                \Filament\Forms\Components\TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->required(),
                            ])->modalWidth('lg')->action(
                            function ($data) {
                                $user = User::create([
                                    'name' => $data['name'],
                                    'email' => $data['email'],
                                    'password' => bcrypt($data['password']),
                                    'user_type' => 'manager',
                                ]);
                            }
                        )
                ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),

            ])
            ->actions([

            ]);
    }

    public function render()
    {
        return view('livewire.admin.manager-list');
    }
}
