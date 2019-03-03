@extends('layouts.master')

@section('content')
<div class="container-fluid container-utama">
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="justify-content-center">
        <div class="container-fluid">
            <div class="table-controls">
                <div class="form-row">
                    <div class="col-auto">
                        <select class="custom-select" id="filterjjg-value">
                            <option value="" disabled selected>Pilih Jenjang</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <select class="custom-select" id="filterthn-value">
                            <option value="" disabled selected>Pilih Tahun</option>
                            @foreach($tahun as $thn)
                                <option value="{{$thn->thn_nama}}">{{$thn->thn_nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="filter-value" class="btn btn-primary">
                            Tampilkan Data
                        </button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTahunAjaran">
                            Tambah Tahun Ajaran
                        </button>
                    </div>
                </div>
            </div>
            <div id="alldata-table"></div>
        </div>
    </div>
</div>
@endsection

@section('modal')
    <div class="modal fade" id="addTahunAjaran" tabindex="-1" role="dialog" aria-labelledby="addTahunAjaranLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTahunAjaranlLabel">Tambah Tahun Ajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('addTahunAjaran') }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col">
                                <select class="form-control" name="NISN">
                                    <option value="">Pilih Nama Siswa</option>
                                    @foreach($siswa as $siswa)
                                    <option value="{{$siswa->NISN}}">{{$siswa->Nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <select class="form-control" name="tahunajaran">
                                    <option>Pilih Tahun Ajaran</option>
                                    @foreach($tahun as $thn)
                                        <option value="{{$thn->id_thn}}">{{$thn->thn_nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="transaksi" tabindex="-1" role="dialog" aria-labelledby="transaksi" aria-hidden="true">
        <div class="modal-dialog modal-trans" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaksiLabel">Transaksi title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <label>NISN     : </label><span id="labelNISN"></span>
                    </div>
                    <div class="container-fluid">
                        <label>Nama     : </label><span id="labelNama"></span>
                    </div>
                    <hr>
                    <form id="form-trans" method="post" action="{{route('transaksi')}}">
                        {{ csrf_field() }}
                        <div id="form-trans" class="form-row simpan-trans" style="display:none">
                            <input type="hidden" name="NISN" id="inputNISN">
                            <div class="form-group col">
                                <label>Tanggal Bayar : </label>
                                <input class="form-control" name="tglBayar" type="date" >
                            </div>
                            <div class="form-group col">
                                <label>Jumlah Bayar : </label>
                                <input class="form-control" name="jumlahByr" type="text" >
                            </div>
                            <div class="form-group col">
                                <label>Untuk Bulan : </label>
                                <select class="form-control" name="utkBulan">
                                    <option value="" disabled selected>Pilih Bulan</option>
                                    @foreach($bulan as $bln)
                                        <option value="{{$bln->id_bln}}">{{$bln->bln_nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label>Untuk Tahun : </label>
                                <select class="form-control" name="utkTahun">
                                    <option value="" disabled selected>Pilih Tahun</option>
                                    @foreach($tahun as $bln)
                                        <option value="{{$bln->id_thn}}">{{$bln->thn_nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success simpan-trans" style="display: none;">
                                Simpan Pembayaran
                            </button>
                        </div>
                    </form>
                    <div>Riwayat Transaksi : </div>
                    <div id="transDetail-table"></div>
                </div>
                <div class="modal-footer">
                    <div id="results"></div>
                    <button type="button" id="ajax-trigger" class="btn btn-primary">Tampilkan Riwayat</button>
                    <button type="button" id="tambah-trans" class="btn btn-success">Tambah Transaksi</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#tambah-trans").click(function () {
            $("#form-trans").show("slow");
            $(".simpan-trans").show("slow");
            $("#tambah-trans").hide();
        });
    </script>
@endsection


@section('scripts')
    <script>

        var nisn;

        function updateFilter(){
            table.setFilter([
                {field: "Tahun", type: "=", value: $("#filterthn-value").val()},
                {field: "Jenjang", type: "=", value: $("#filterjjg-value").val()}
                ]);
//            table.setFilter("Jenjang", "=", $("#filterjjg-value").val());
        }

        $("#filter-value").click(updateFilter);

        var table = new Tabulator("#alldata-table", {
            initialFilter:[
                {field:"Tahun", type:"=", value:"{{$thn->thn_nama}}"}
            ],
            layout:"fitDataFill",
            placeholder:"No Data",
            index:"NISN",
            height: "800px",
            columns:[
                {title:"No", formatter:"rownum", align:"center"},
                {title:"NISN", field:"NISN"},
                {title:"Nama", field:"Nama"},
                {title: "Bulan", columns:[
                        {title:"Januari", field:"Januari", formatter:"tickCross", align:"center"},
                        {title:"Februari", field:"Februari", formatter:"tickCross", align:"center"},
                        {title:"Maret", field:"Maret", formatter:"tickCross", align:"center"},
                        {title:"April", field:"April", formatter:"tickCross", align:"center"},
                        {title:"Mei", field:"Mei", formatter:"tickCross", align:"center"},
                        {title:"Juni", field:"Juni", formatter:"tickCross", align:"center"},
                        {title:"Juli", field:"Juli", formatter:"tickCross", align:"center"},
                        {title:"Agustus", field:"Agustus", formatter:"tickCross", align:"center"},
                        {title:"September", field:"September", formatter:"tickCross", align:"center"},
                        {title:"Oktober", field:"Oktober", formatter:"tickCross", align:"center"},
                        {title:"November", field:"November", formatter:"tickCross", align:"center"},
                        {title:"Desember", field:"Desember", formatter:"tickCross", align:"center"},
                    ]},
                {title: "Tahun", field:"Tahun", visible: false},
                {title: "Jenjang", field:"Jenjang", visible: false}
            ],
            rowClick:function (e, row) {
                $('#transaksi').modal('show');

                $index = row.getIndex();
                $nama = row.getCell("Nama").getValue();
                $('#transaksiLabel').html("Transaksi " + $nama);
                $('#labelNISN').html(" " + $index);
                $('#inputNISN').val($index);
                $('#labelNama').html(" " + $nama);
                nisn = row.getIndex();
            }
        });
        table.setData("{{URL::to('ajaxData')}}");


        var deleteIcon = function(cell, formatterParams, onRendered){ //plain text value
            return '<a href="#"><i class="fas fa-trash"></i></a>';
        };
        var tableTR = new Tabulator("#transDetail-table", {
            placeholder:"No Data",
            height:"311px",
            columns:[
                {title:"No", formatter:"rownum", align:"center"},
                {title:"Riwayat", field:"Riwayat", sorter:"date"},
                {title:"Dibayar", field:"Dibayar"},
                {title:"Bulan", field:"Bulan"},
                {title:"Tahun", field:"Tahun", sorter:"number"},
                {title:"Hapus", formatter:deleteIcon, width:40, align:"center", cellClick:function(e, cell){
                    var del = confirm("Data yang dihapus akan hilang dan tidak bisa dikembalikan.");
                    if(del){
                        window.location.href = "kefungsi deelte";
                        alert("data transaksi terhapus!");
                    }
                }},
            ]
        });
        $("#ajax-trigger").click(function(){
            $("#ajax-trigger").html("Muat Ulang Riwayat");
            $.ajax({
                url: "{{URL::to("ajaxDataTrans")}}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    nisn: nisn,
                },
                success: function (data){
                    tableTR.setData(data);
                }
            });
            tableTR.setData('{{URL::to("ajaxDataTrans")}}');
        });
    </script>
@endsection
