<?php
  
namespace App\Imports;

use App\Models\Registration;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Hash;
  
class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
   private $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }
    public function model(array $row)
    {
        // Assuming the event_id is passed as an additional parameter or in the row
        $eventId = $row['event_id'] ?? null;

        // Process the user data
        return new Registration([
            'name' => $row['name'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'age' => $row['age'],
            'cash'=> $row['cash'],
            'event_id' => $this->eventId
        ]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function rules(): array
    {
        return [
            'event_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'age'=>'required', 
            'cash'=>'required', 
        ];
    }
}