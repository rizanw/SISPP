@extends('layouts.master')

@section
    <div class="container">
        <div class="row justify-content-center">
            <div class="container">
                <div class="table-controls">
                <span>
                    <label>Tahun:</label>
                    <select id="filter-value">
                        <option value="" disabled selected>Pilih Tahun</option>
                        @foreach($tahun as $thn)
                            <option value="{{$thn->thn_nama}}">{{$thn->thn_nama}}</option>
                        @endforeach
                    </select>
                </span>
                </div>
                <div id="trans"></div>
            </div>
        </div>
    </div>
@endsection
