<?php

namespace App\Livewire;

use App\Models\Loan;
use App\Models\Payment;
use Carbon\Carbon;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class MemberSidebar extends Component implements HasForms
{
    use WithFileUploads;
    use InteractsWithForms;
    public $total_loan = 0;
    public $loan_id;

    public $payment_id;
    public $monthly_payment;
    public $due;

    public $payment_modal = false;

    public $proof_of_payment = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               FileUpload::make('proof_of_payment')->required(),
            ]);
    }

    public function mount(){
        
        $data = Loan::where('user_id', auth()->user()->id)->where('status', 'approved')->first();
      
       if ($data) {
        $this->total_loan = $data->sum('loan_amount');
        $this->loan_id = Loan::where('user_id', auth()->user()->id)->first();
        $this->monthly_payment = $data->payments->where('is_paid', false)->first();
        $this->payment_id = $data->payments->where('is_paid', false)->first()->id;
       }
        
    }

    public function pay(){
    
    }

    public function payNow(){
        $record = Loan::where('user_id', auth()->user()->id)->first();

        $loan = Payment::where('id', $this->payment_id)->first();
        foreach ($this->proof_of_payment as $key => $value) {
            $loan->update(
                [
                    'proof_of_payment' => $value->store('PROOF OF PAYMENT', 'public'),
                ]
            );
        }
       
        $remaining = Payment::where('loan_id', $this->loan_id)->where('is_paid', true)->sum('monthly_payment');
                        $months_paid = Payment::where('loan_id', $this->loan_id)->where('is_paid', true)->count();
                        $months_left = $record->term - $months_paid;
                        
                        // Calculate the remaining loan balance
                        $remaining_balance = $record->loan_amount - $remaining;
                        
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
                            'loan_id' => $this->loan_id->id,
                            'monthly_payment' => $monthly_payment,
                            'interest' => $monthly_interest,
                            
                            'due_date' => Carbon::parse($loan->due_date)->addMonth(),
                        ]);

                        $this->payment_modal = false;
                        $this->mount();

    }

    public function render()
    {
        return view('livewire.member-sidebar',[
            'payments' =>  $this->loan_id ? Payment::where('loan_id', $this->loan_id->id)->where('is_paid', true)->orderByDesc('updated_at')->get() : []
        ]);
    }
    
}
