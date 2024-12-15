<?php

namespace App\Imports;

use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PermissionImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Permission([
            'name' => $row['name'],
            'group_name' => $row['group_name'],
            'guard_name' => $row['guard_name'],
            
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
