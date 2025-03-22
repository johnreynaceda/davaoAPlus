<?php

namespace App\Livewire\Admin;

use App\Models\Payment;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Report extends Component implements HasForms
{
    use InteractsWithForms;

    public $selected_report;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('selected_report')->options([
                    'Members' => 'Members',
                    'Payments' => 'Payments',
                ])->live()
            ]);
    }

    public function render()
    {
        return view('livewire.admin.report', [
            'reports' => $this->generatedReport(),
        ]);
    }

    public function generatedReport()
    {
        if ($this->selected_report == 'Members') {
            return User::where('user_type', 'member')->get();
        } elseif ($this->selected_report == 'Payments') {
            return Payment::where('is_paid', true)->get();
        } else {
            return null;
        }

    }
}
