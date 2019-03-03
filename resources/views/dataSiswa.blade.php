@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="table-controls">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahSiswa">
                Tambah Siswa
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahPaketSPP">
                Tambah Paket SPP
            </button>
        </div>
        @if(Session::has('success'))
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <div id="message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif
        <div id="dataSiswa-table"></div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="detailSiswa" tabindex="-1" role="dialog" aria-labelledby="detailSiswa" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailSiswaLabel">Detail Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="tabl table-borderless" width="90%">
                        <tr>
                            <th scope="row">
                                NISN
                            </th>
                            <td scope="row">
                                : <span id="NISN"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                NIS
                            </th>
                            <td scope="row">
                                : <span id="NIS">nis</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Nama
                            </th>
                            <td scope="row">
                                : <span id="NamaSiswa"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                TTL
                            </th>
                            <td scope="row">
                                : <span id="TempatLahir">tempat</span>,
                                <span id="TanggalLahir">tanggal</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Alamat
                            </th>
                            <td scope="row">
                                : <span id="AlamatSiswa"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Kelas
                            </th>
                            <td scope="row">
                                : <span id="Kelas"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Jenjang
                            </th>
                            <td scope="row">
                                : <span id="Jenjang"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Tahun Masuk
                            </th>
                            <td scope="row">
                                : <span id="TahunMasuk"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Biaya SPP
                            </th>
                            <td scope="row">
                                : <span id="BiayaSPP"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Nama Ibu
                            </th>
                            <td scope="row">
                                : <span id="IbuSiswa"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Nama Bapak
                            </th>
                            <td scope="row">
                                : <span id="BapakSiswa"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Nama Wali
                            </th>
                            <td scope="row">
                                : <span id="WaliSiswa"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="tambahSiswaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSiswaLabel">Tambahkan Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('dataSiswa') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="NIS">NIS</label>
                            <input type="text" class="form-control" name="NIS" id="NIS" aria-describedby="NIS" placeholder="Masukkan NIS">
                        </div>
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="text" class="form-control" name="NISN" id="NISN" aria-describedby="NISN" placeholder="Masukkan NISN">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Masukkan Nama Lengkap Siswa">
                        </div>
                        <div class="form-group">
                            <label for="JK">Jenis Kelamin</label>
                            <select class="form-control" name="JK" id="JK">
                                <option disabled selected>Pilih Jenih Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="TTL">Tempat </label>
                                <input type="text" class="form-control" name="TLahir" id="TLahir" placeholder="Masukkan Tempat Lahir">
                            </div>
                            <div class="form-group col">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="TglLahir" id="TglLahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <textarea class="form-control" rows="2" name="Alamat" id="Alamat" placeholder="Masukkan Alamat Siswa"></textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="NamaIbu">Nama Ibu</label>
                            <input type="text" class="form-control" name="NamaIbu" id="NamaIbu" placeholder="Masukkan Nama Ibu Siswa">
                        </div>
                        <div class="form-group">
                            <label for="NamaBpk">Nama Bapak</label>
                            <input type="text" class="form-control" name="NamaBpk" id="NamaBpk" placeholder="Masukkan Nama Bapak Siswa">
                        </div>
                        <div class="form-group">
                            <label for="NamaBpk">Nama Wali</label>
                            <input type="text" class="form-control" name="NamaWali" id="NamaWali" placeholder="Masukkan Nama Wali Siswa">
                        </div>
                        <div class="form-group">
                            <label for="SPP">Biaya SPP</label>
                            <select class="form-control" name="spp" id="SPP">
                                <option value="" disabled selected>Pilih Paket</option>
                                @foreach($spp as $spp)
                                    <option value="{{$spp->id_us}}">{{$spp->biaya_us}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="Kelas">Kelas </label>
                                <input type="text" class="form-control" name="Kelas" id="Kelas" placeholder="Masukkan Kelas Siswa">
                            </div>
                            <div class="form-group col">
                                <label for="Jenjang">Jenjang </label>
                                <select class="form-control" name="Jenjang" id="Jenjang">
                                    <option value="" disabled selected>Pilih Jenjang Siswa</option>
                                    <option value="SD">Sekolah Dasar</option>
                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                    <option value="SMA">Sekolah Menengah Atas</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Angkatan">Tahun Masuk</label>
                                <select class="form-control" name="Angkatan" id="Angkatan">
                                    <option value="" disabled selected>Pilih Tahun Angkatan</option>
                                    @foreach($tahun as $thn)
                                        <option value="{{$thn->id_thn}}">{{$thn->thn_nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="uploadFototxt">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadFotoFile" aria-describedby="uploadFotoFile">
                                <label class="custom-file-label" for="uploadFoto">Klik untuk Pilih Foto</label>
                            </div>
                        </div>
                        <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahPaketSPP" tabindex="-1" role="dialog" aria-labelledby="tambahPaketSPPLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPaketSPPLabel">Tambah Paket SPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="addPaketSPP">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama_us">Nama Paket : </label>
                            <input type="text" class="form-control" name="nama_us" id="nama_us" placeholder="masukkan nama paket spp">
                        </div>
                        <div class="form-group">
                            <label for="biaya_us">Jumlah Uang : </label>
                            <input type="text" class="form-control" name="biaya_us" id="biaya_us" placeholder="masukkan jumlah uang spp">
                        </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah Paket</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var table = new Tabulator("#dataSiswa-table", {
            layout:"fitDataFill",
            placeholder:"No Data",
            index: "NISN",
            columns:[
                {title:"No", formatter:"rownum", align:"center"},
                {title:"NIS", field:"NIS", sorter:"number"},
                {title:"NISN", field:"NISN", sorter:"number"},
                {title:"Nama", field:"Nama", sorter:"string"},
                {title:"L/P", field:"JK", sorter:"string"},
                {title:"Kelas", field:"kelas"},
                {title:"Jenjang", field:"jenjang"},
                {title:"Thn Masuk", field:"angkatan", sorter:"number"},
                {title:"SPP", field:"SPP"},
                { field:"tmptlahir", visible: false },
                { field:"tgllahir", visible: false },
                { field:"alamat", visible: false },
                { field:"namaibu", visible: false },
                { field:"namabpk", visible: false },
                { field:"namawali", visible: false },
            ],
            rowClick:function (e, row) {
                $nisn = row.getIndex();
                $nis = row.getCell('NIS').getValue();
                $nama = row.getCell('Nama').getValue();
                $jk = row.getCell('JK').getValue();
                $tempat = row.getCell('tmptlahir').getValue();
                $tanggal = row.getCell('tgllahir').getValue();
                $alamat = row.getCell('alamat').getValue();
                $kelas = row.getCell('kelas').getValue();
                $jenjang = row.getCell('jenjang').getValue();
                $thnmsk = row.getCell('angkatan').getValue();
                $biayaspp = row.getCell('SPP').getValue();
                $ibusiswa = row.getCell('namaibu').getValue();
                $bpksiswa = row.getCell('namabpk').getValue();
                $walisiswa = row.getCell('namawali').getValue();

                console.log("click " + $nis);

                $('#detailSiswa').modal('show');
                $('#NISN').html($nisn);
                $('#NIS').html($nis);
                $('#NamaSiswa').html($nama);
                $('#JK').html($jk);
                $('#TempatLahir').html($tempat);
                $('#TanggalLahir').html($tanggal);
                $('#AlamatSiswa').html($alamat);
                $('#Kelas').html($kelas);
                $('#Jenjang').html($jenjang);
                $('#TahunMasuk').html($thnmsk);
                $('#BiayaSPP').html($biayaspp);
                $('#IbuSiswa').html($ibusiswa);
                $('#BapakSiswa').html($bpksiswa);
                $('#WaliSiswa').html($walisiswa);
            }
        });
        table.setData("{{URL::to('ajaxDataSiswa')}}");
    </script>
@endsection
