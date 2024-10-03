<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::Incomes()->get()->sum('amount');
        $pengeluaran = Transaction::Expense()->get()->sum('amount');

        return [
            Stat::make('Pengeluaran',$pengeluaran ),
            Stat::make('Pemasukan', $pemasukan),
            Stat::make('Selisih', $pemasukan - $pengeluaran),
        ];
    }
}
