<?php

namespace App\Livewire\Admin;

use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use App\Models\Member;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddPayment extends Component implements HasForms
{
    use InteractsWithForms;

    public $member;

    public $payment;
    public $total_remaining;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               Select::make('member')->reactive()->options(
        User::whereHas('loans')->pluck('name', 'id'),
               )
            ]);
    }

    public function updatedMember(){
        $data = Payment::whereHas('loan', function($record){
            $record->where('user_id', $this->member);
        })->where('is_paid', false)->first();

        $paid =Payment::whereHas('loan', function($record){
            $record->where('user_id', $this->member);
        })->where('is_paid', true)->sum('monthly_payment');
        
        $this->total_remaining = $data->loan->loan_amount - $paid;

        $this->payment = $data;

    }

    public function donePayment(){
        sleep(2);
        $this->payment->update([
            'is_paid' => true
        ]);

                     $remaining = Payment::where('loan_id', $this->payment->loan_id)->where('is_paid', true)->sum('monthly_payment');
                        $months_paid = Payment::where('loan_id', $this->payment->loan_id)->where('is_paid', true)->count();
                        $months_left = $this->payment->loan->term - $months_paid;
                        
                        // Calculate the remaining loan balance
                        $remaining_balance = $this->payment->loan->loan_amount - $remaining;
                        
                        // Monthly interest rate (5%)
                        $monthly_rate = 0.05;
                        
                        // Calculate the monthly payment for the remaining balance
                        if ($months_left > 0) {
                            $numerator = $monthly_rate * pow(1 + $monthly_rate, $months_left);
                            $denominator = pow(1 + $monthly_rate, $months_left) - 1;
                            $monthly_payment = $remaining_balance * ($numerator / $denominator);
                        } else {
                            $monthly_payment = 0; // Prevent division by zero if no months are left
                        }
                        
                        // Calculate the monthly interest for the remaining balance
                        $monthly_interest = $remaining_balance * $monthly_rate;
                        
                        // Total interest for the remaining months
                        $total_interest = $monthly_interest * $months_left;
                        
                        // Calculate the total payment for the remaining balance
                        $total_payment = $monthly_payment + $monthly_interest;
                        
                        // Create a new payment record with calculated amounts
                        Payment::create([
                            'loan_id' => $this->payment->loan_id,
                            'monthly_payment' => $monthly_payment,
                            'interest' => $monthly_interest,
                            
                            'due_date' => Carbon::parse($this->payment->due_date)->addMonth(),
                        ]);

    }

    public function render()
    {
        return view('livewire.admin.add-payment');
    }
}
