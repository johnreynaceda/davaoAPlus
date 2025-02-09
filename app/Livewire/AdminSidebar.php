<?php

namespace App\Livewire;

use App\Models\Loan;
use App\Models\Payment;
use Livewire\Component;

class AdminSidebar extends Component
{
    public $total_loan = 0;

    public function render()
    {
        $this->total_loan =  Loan::where('status', 'approved')->sum('loan_amount');
        return view('livewire.admin-sidebar',[
            'payments' => Payment::where('is_paid', true)->orderByDesc('updated_at')->get()->take(4)
        ]);
    }
}
