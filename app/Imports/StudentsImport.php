<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'phone' => $row['phone'],
            'reg_date' => $this->transformDate($row['reg_date']), // Convert date here
            'role' => 'Student',
            'mother_name' => $row['mother_name'],
            'gender' => $row['gender'],
            'address' => $row['address'],
            'class_id' => $row['class_id'],
            'fee_amount' => $row['fee_amount'],
            'discount' => $row['discount'],
            'net_fee_amount' => $row['net_fee_amount'],
            'status' => $row['status'],
        ]);
    }

    /**
     * Transform the date format
     * @param string $value
     * @return string|null
     */
    private function transformDate($value)
    {
        // Check if the value is numeric, if so, it might be a date serial number
        if (is_numeric($value)) {
            // Convert Excel date serial number to Unix timestamp
            $timestamp = ($value - 25569) * 86400;
            // Convert Unix timestamp to 'Y-m-d' format
            return date('Y-m-d', $timestamp);
        }
        // If it's not numeric, it might already be in the correct format, return as is
        return $value;

        
    }
}
