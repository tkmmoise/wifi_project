<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Exceptions\CsvException;
use Illuminate\Support\Facades\Storage;

class AdminDashController extends Controller
{

    public function showRechargeForm()
    {
        return view('admin.pages.rechargeTickets');
    }
    public function showRemainingTickets()
    {
        $NumbremainingTickets =Ticket::all()->count();
        return view('admin.pages.remainingTickets',compact('NumbremainingTickets'));
    }
    public function showListTickets()
    {
        $tickets = Ticket::paginate(3);
        //dd($tickets);
        return view('admin.pages.listTickets',compact('tickets'));
    }


    //post routes 

    public function RechargeTickets(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes::csv,txt'
        ]);

        $file = $request->file('file');
        $filenameWithExt = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $locations = 'tickets';

        $file->move($locations,$fileNameToStore);
        $filePath = public_path($locations."/".$fileNameToStore);

        
        $scvdata = $this->csvToArray($filePath);
        
        try {
            if(file_exists($filePath)){
                unlink($filePath);
            }
            //handling exception
            foreach ($scvdata as $data) {
    
                foreach ($data as $key => $value) {
                    if($value == ""){
                        throw new CsvException();
                    }
                }
            }
            // save tickets to database
            foreach ($scvdata as $data) {
                Ticket::create($data);
            }
            return redirect('/admin')->with('successMsg', 'Tickets uploaded!');
            
        } catch (CsvException $e) {
            report($e);
            return back()->withError("valeur nulle");
        }
        

    }


    // function helpers

    private function csvToArray($filename = '', $delimiter = ',')
    {
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
    }
}
