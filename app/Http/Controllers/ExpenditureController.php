<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenditureController extends Controller
{
    public function index()
    {
        $data = Expenditure::all();
        return view('expenditure', ['expenditures' => $data]);
    }

    public function form(Request $request)
    {
        $page = $request->query('page');
        if ($page == 'edit') {
            $id = request('id');
            $data = Expenditure::find($id);

            return view('expenditure-form', ['page' => 'edit', 'expenditure' => $data]);
        } else if ($page == 'detail') {
            $id = request('id');
            $data = Expenditure::find($id);

            return view('expenditure-form', ['page' => 'detail', 'expenditure' => $data]);
        } else if ($page == 'delete') {
            $id = request('id');
            $data = Expenditure::find($id);

            return view('expenditure-form', ['page' => 'delete', 'expenditure' => $data]);
        } else {
            return view('expenditure-form', ['page' => 'tambah']);
        }
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $rules = [
            'date' => 'required',
            'name' => 'required',
            'amount' => 'required'
        ];
        $messages = [
            'date.required' => 'Tanggal tidak boleh kosong',
            'name.required' => 'Nama pengeluaran tidak boleh kosong',
            'amount.required' => 'Nominal tidak boleh kosong'
        ];
        Validator::make($data, $rules, $messages)->validate();

        Expenditure::create([
            'tenggat_pengeluaran' => $data['date'],
            'nama_pengeluaran' => $data['name'],
            'nominal' => $data['amount']
        ]);

        return redirect()->route('expenditure')->with('message', 'Data pengeluaran berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $rules = [
            'date' => 'required',
            'name' => 'required',
            'amount' => 'required'
        ];
        $messages = [
            'date.required' => 'Tanggal tidak boleh kosong',
            'name.required' => 'Nama pengeluaran tidak boleh kosong',
            'amount.required' => 'Nominal tidak boleh kosong'
        ];
        Validator::make($data, $rules, $messages)->validate();

        $id = request('id');
        $expenditure = Expenditure::find($id);
        $expenditure->tenggat_pengeluaran = $data['date'];
        $expenditure->nama_pengeluaran = $data['name'];
        $expenditure->nominal = $data['amount'];
        $expenditure->save();

        return redirect()->route('expenditure')->with('message', 'Data pengeluaran berhasil diubah');
    }

    public function delete()
    {
        $id = request('id');
        $expenditure = Expenditure::find($id);
        $expenditure->delete();

        return redirect()->route('expenditure')->with('message', 'Data pengeluaran berhasil dihapus');
    }
}
