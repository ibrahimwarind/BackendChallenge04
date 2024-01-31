<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupByOwnersController extends Controller
{
    public function groupByOwners()
    {
        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B",
        ];

        $result = $this->groupByOwnersService($files);

        return response()->json($result);
    }

    private function groupByOwnersService($files)
    {
        $result = [];

        foreach ($files as $file => $owner) {
            if (!isset($result[$owner])) {
                $result[$owner] = [];
            }
            $result[$owner][] = $file;
        }

        return $result;
    }
}
