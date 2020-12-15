<?php

namespace App\Imports;
use App\Order;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;


class ImportOrders implements  ToCollection

        {
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required | numeric',
            '*.1' => 'required | numeric',
            '*.2' => 'required | numeric',
            '*.3' => 'numeric|min:2',
            '*.4' => 'numeric|min:2',
            '*.5' => 'required | string',
            '*.6' => 'required | numeric ',
            '*.7' => 'required | string',
            '*.8' => 'required | string',
            '*.9' => 'required | string',
        ])->validate();

        foreach ($rows as $row) {
            Order::create([
                'deliverer_id'     => $row[0],
                'product_id'    => $row[1],
                'responsible_id'    => Auth::user()->id,
                'quantity'    => $row[3],
                'totalprice'    => $row[4],
                'client_name'    => $row[5],
                'client_phone'    => $row[6],
                'client_city'    => $row[7],
                'client_addrs'    => $row[8],
                'note'    => $row[9],
            ]);
        }
    }
//    public function model(array $row)
//    {
//        return new Order([
//
//            'deliverer_id'     => $row[0],
//            'product_id'    => $row[1],
//            'responsible_id'    => $row[2],
//            'quantity'    => $row[3],
//            'totalprice'    => $row[4],
//            'client_name'    => $row[5],
//            'client_phone'    => $row[6],
//            'client_city'    => $row[7],
//            'client_addrs'    => $row[8],
//            'note'    => $row[9],
//        ]);
//
//    }
}
