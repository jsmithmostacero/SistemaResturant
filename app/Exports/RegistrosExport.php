<?php

namespace App\Exports;

use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistrosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ventasMensuales =  DB::table('pedidos')
            ->selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->groupBy('mes')
            ->pluck('total', 'mes');
        return $ventasMensuales;
    }
}
