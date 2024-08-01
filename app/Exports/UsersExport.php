<?php
  
namespace App\Exports;
    
use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
    
class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Registration::select("event_id", "name", "email", "gender", "age","cash")->get();
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["event_id", "name", "email","gender","age","cash"];
    }
}