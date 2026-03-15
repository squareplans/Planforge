<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class FinancialStatements extends Component
{
    use WithPagination;
    
    public $period;
    public $data;

    public function mount()
    {
        $this->period = null;
    }
    
    public function updatedPeriod($value)
    {
        // Load data based on selected period
        $this->data = DB::table('financial_statements')
            ->where('period', $value)
            ->get();
    }
    
    public function render()
    {
        return view('livewire.financial-statements', [
            'data' => $this->data,
        ]);
    }
}
