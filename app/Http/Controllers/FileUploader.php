<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FileUploader extends Controller
{
    private function uploadCsvOrTsv(Request $request) {

        $success = false;

        $request->validate([
            'file' => 'required|mimeTypes:text/plain,text/csv,text/tsv,csv,tsv',
        ]);

        try {
            //read csv file and skip data
            $file = $request->file('file');

            $handle = fopen($file->path(), 'r');

            //skip the header row
            $header = fgetcsv($handle);

            // Default to comma separator.
            $separator = ',';

            if(count(explode(';', $header[0])) > 5) {
                $separator = ';';
            }

            // ignore another row.
            fgetcsv($handle);

            $chunksize = 100;

            while(!feof($handle))
            {
                $chunkdata = [];

                for($i = 0; $i < $chunksize; $i++)
                {
                    $data = fgetcsv($handle, null, $separator);
                    if($data === false)
                    {
                        break;
                    }
                    $chunkdata[] = $data;
                }

                foreach($chunkdata as $row) {
                    $model = new Movie([
                        'year' => $row[0],
                        'length' => $row[1],
                        'title' => $row[2],
                        'subject' => $row[3],
                        'actor' => $row[4],
                        'actress' => $row[5],
                        'director' => $row[6],
                        'popularity' => $row[7],
                        'awards' => $row[8],
                        'image' => $row[9],
                    ]);
                    $model->save();
                }
            }
            fclose($handle);

            $success = true;
        } catch (\Exception $e) {
            $success = false;
            echo $e->getMessage();
        } finally {

            if(isset($handle) && is_resource($handle)) {
                fclose($handle);
            }
        }

        return $success;
    }

    public function upload(Request $request): RedirectResponse
    {
        try {
            $message = ($this->uploadCsvOrTsv($request)) ? 'File uploaded successfully'
                : 'An error occured while uploading the file.';
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
        }

        return redirect()->route('dashboard')->with('message', $message);
    }
}
