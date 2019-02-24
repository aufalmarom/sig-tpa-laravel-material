@extends('templates.master')

@section('content')

    <div class="row">
        <button class="btn btn-rose" type="button" data-toggle="collapse" data-target="#faktorevaluasi" aria-expanded="false" aria-controls="collapseExample">
            Formula
        </button>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="collapse" id="faktorevaluasi">
                <div class="card card-body">
                    <h3><i>U<sub>i</sub></i> = &Sigma;<i>W<sub>j</sub></i> * <i>u<sub>ij</sub></i></h3>
                    <h4>Keterangan :</h4>
                    <h5>- <i>U<sub>i</sub></i> : Nilai Bobot Evaluasi</h5>
                    <h5>- <i>W<sub>j</sub></i> : Nilai Nilai Bobot Relatif</h5>
                    <h5>- <i>u<sub>ij</sub></i> : Nilai Faktor Evaluasi</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        @php
            $no_daerah = 1;
        @endphp
        @foreach ($datas as $data)
        <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <i class="material-icons">perm_identity</i>
                    </div>
                <h4 class="card-title">Bobot Evaluasi {{$data->kecamatan->daerah}} D{{$no_daerah}}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Parameter</th>
                                <th class="text-center">Faktor Evaluasi D{{$no_daerah}}</th>
                                <th class="text-center">Bobot Relatif </th>
                                <th class="text-center">Bobot Evaluasi </th>
                                {{-- <th class="text-right">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @php
                                    $totalFE = 0;
                                    $totalBR = 0;
                                    $totalBE = 0;
                                @endphp
                                <td class="text-center">1</td>
                                <td>Kelerengan</td>
                                <td class="text-center">
                                    @php
                                        $totalFE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_kelerengan, 1);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_kelerengan, 1)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBR += BobotRelatif($datas2[0]->id, $datas2[0]->bobot);
                                    @endphp
                                    {{BobotRelatif($datas2[0]->id, $datas2[0]->bobot)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_kelerengan, 1) * BobotRelatif($datas2[0]->id, $datas2[0]->bobot);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_kelerengan, 1) * BobotRelatif($datas2[0]->id, $datas2[0]->bobot)}}</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Penggunaan Lahan</td>
                                <td class="text-center">
                                    @php
                                        $totalFE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_penggunaan_lahan, 2);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_penggunaan_lahan, 2)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBR += BobotRelatif($datas2[1]->id, $datas2[1]->bobot);
                                    @endphp
                                    {{BobotRelatif($datas2[1]->id, $datas2[1]->bobot)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_penggunaan_lahan, 2) * BobotRelatif($datas2[1]->id, $datas2[1]->bobot);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_penggunaan_lahan, 2) * BobotRelatif($datas2[1]->id, $datas2[1]->bobot)}}</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Rawan Bencana Longsor</td>
                                <td class="text-center">
                                    @php
                                        $totalFE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_rawan_bencana_longsor, 3);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_rawan_bencana_longsor, 3)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBR += BobotRelatif($datas2[2]->id, $datas2[2]->bobot);
                                    @endphp
                                    {{BobotRelatif($datas2[2]->id, $datas2[2]->bobot)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_rawan_bencana_longsor, 3) * BobotRelatif($datas2[2]->id, $datas2[2]->bobot);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_rawan_bencana_longsor, 3) * BobotRelatif($datas2[2]->id, $datas2[2]->bobot)}}</td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>Curah Hujan</td>
                                <td class="text-center">
                                    @php
                                        $totalFE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_curah_hujan, 4);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_curah_hujan, 4)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBR += BobotRelatif($datas2[3]->id, $datas2[3]->bobot);
                                    @endphp
                                    {{BobotRelatif($datas2[3]->id, $datas2[3]->bobot)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_curah_hujan, 4) * BobotRelatif($datas2[3]->id, $datas2[3]->bobot);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_curah_hujan, 4) * BobotRelatif($datas2[3]->id, $datas2[3]->bobot)}}</td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>Hidrogeologi</td>
                                <td class="text-center">
                                    @php
                                        $totalFE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_hidrogeologi, 5);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_hidrogeologi, 5)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBR += BobotRelatif($datas2[4]->id, $datas2[4]->bobot);
                                    @endphp
                                    {{BobotRelatif($datas2[4]->id, $datas2[4]->bobot)}}</td>
                                <td class="text-center">
                                        @php
                                        $totalBE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_hidrogeologi, 5) * BobotRelatif($datas2[4]->id, $datas2[4]->bobot);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_hidrogeologi, 5) * BobotRelatif($datas2[4]->id, $datas2[4]->bobot)}}</td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>Jenis Tanah</td>
                                <td class="text-center">
                                    @php
                                        $totalFE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_jenis_tanah, 6);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_jenis_tanah, 6)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBR += BobotRelatif($datas2[5]->id, $datas2[5]->bobot);
                                    @endphp
                                    {{BobotRelatif($datas2[5]->id, $datas2[5]->bobot)}}</td>
                                <td class="text-center">
                                    @php
                                        $totalBE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_jenis_tanah, 6) * BobotRelatif($datas2[5]->id, $datas2[5]->bobot);
                                    @endphp
                                    {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_jenis_tanah, 6) * BobotRelatif($datas2[5]->id, $datas2[5]->bobot)}}</td>
                            </tr>
                            <tr>
                            <td class="text-center">7</td>
                            <td>Rawan Bencana Banjir</td>
                            <td class="text-center">
                                    @php
                                    $totalFE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_rawan_bencana_banjir, 7);
                                @endphp
                                {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_rawan_bencana_banjir, 7)}}</td>
                            <td class="text-center">
                                @php
                                    $totalBR += BobotRelatif($datas2[6]->id, $datas2[6]->bobot);
                                @endphp
                                {{BobotRelatif($datas2[6]->id, $datas2[6]->bobot)}}</td>
                            <td class="text-center">
                                    @php
                                    $totalBE += FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_rawan_bencana_banjir, 7) * BobotRelatif($datas2[6]->id, $datas2[6]->bobot);
                                @endphp
                                {{FaktorEvaluasi($data->id_kecamatan, $data->nilai_klasifikasi_rawan_bencana_banjir, 7) * BobotRelatif($datas2[6]->id, $datas2[6]->bobot)}}</td>
                        </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td>Total</td>
                                <td class="text-center">
                                    {{ $totalFE }}</td>
                                <td class="text-center">
                                    {{ $totalBR }}</td>
                                <td class="text-center">{{ $totalBE }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @php
            $no_daerah++;
        @endphp
        @endforeach




    </div>

@endsection
