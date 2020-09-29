<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        $filename = 'noimage.jpg';
        return new Post([
            'user_id' => auth()->id(),
            'title'      =>  $row["0"],
            'body'     =>  $row["1"],
            'cover_image' => $filename,
        ]  );
    }
}
