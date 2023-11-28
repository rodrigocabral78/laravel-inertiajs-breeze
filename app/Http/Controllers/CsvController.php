<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class CsvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $basePath  = base_path('database/csv/');
        if (is_dir($basePath)) {
            $files = File::allFiles($basePath);
            foreach ($files as $file) {
                // dd($file);
                $fileName = $file->getFilename();
                $pathinfo = pathinfo($file);
                // $fileName = $pathinfo['filename'];
                $stream  = fopen($basePath . $fileName, "r");
                // if (($stream) !== false) {
                $rows_all = count(file($basePath . $fileName));
                $cols     = '';
                $first    = true;
                while (!feof($stream)) {
                    // echo '-- inicio: ' . $rows_all-- . '<br>';
                    Log::info('-- inicio: ' . $rows_all--);

                    // $rows[] = fgetcsv($stream);
                    // dd($row_all, count($rows), $rows[0]);
                    $row      = (array) fgetcsv($stream);
                    $cols_all = count($row);
                    // dd($rows_all, $row, $cols_all);
                    if (!$first) {
                        $values  = '';
                        $binding = '';
                        for ($c=0; $c < $cols_all; $c++) {
                            $binding .= "'" . $row[$c] . "',";
                            $values .= "?,";
                        }
                        // foreach ($row as $col) {
                        //     $binding .= "'" . $col . "',";
                        //     $values .= "?,";
                        // }
                        $binding = mb_substr($binding, 0, -1);
                        $values  = mb_substr($values, 0, -1);
                        // dd($row_all, $row);
                        // $query  = "INSERT INTO " . $pathinfo['filename'] . " ($cols) VALUES ($values);";
                        // echo "$query, [$binding];<br>";
                        // dd($query, [$binding]);
                        // DB::insert($query, [$binding]);
                        $query = "-- ROW: $rows_all --
INSERT INTO " . mb_strtolower($pathinfo['filename']) . " ($cols) VALUES ($binding);
";
                        // echo "$query<br>";
                        // dd($query);

                        $base_path_sql = mb_strtolower(base_path('database/sql/'));
                        @mkdir($base_path_sql, 0755, true);
                        $path_sql = mb_strtolower($base_path_sql . DIRECTORY_SEPARATOR . $pathinfo['filename'] . '.sql');
                        File::append($path_sql, $query);
                        // File::put($path_sql, $query);
                        Log::info($query);
                    } else {
                        $cols  = '';
                        foreach ($row as $col) {
                            $cols .= $col . ',';
                        }
                        $cols  = mb_substr(mb_strtolower($cols), 0, -1);
                    }
                    $first = false;
                    // dd($file, $pathinfo, $fileName, $row, $num, $values);
                }
                // echo 'fim: ' . $rows_all . '<br>';
                Log::info('fim: ' . $rows_all);

                fclose($stream);
                // }
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
