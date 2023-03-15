{{-- <style>
    #map { height: 350px; }
</style> --}}
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Jam Masuk</th>
        <th scope="col">Jam Pulang</th>
        <th scope="col">Status</th>
        {{-- <th scope="col">Aksi</th> --}}
        </tr>
    </thead>
    <tbody>
        @forelse ($table as $key => $tb)
            <tr>
                <th scope="row">{{ $table->firstItem() + $key }}</th>
                <td>{{ date('d-m-Y', strtotime($tb->tanggal)) }}</td>
                <td><a href="#" data-toggle="modal" data-target="#modal-show" class="photo-masuk">{{ $tb->jam_masuk }}</a></td>
                <td><a class="photo-pulang" href="{{ asset('storage/stap/img/'. $tb->photo_pulang) }}">{{ $tb->jam_pulang }}</a></td>
                @if (strtotime($tb->jam_masuk) > strtotime('10:00:00'))
                <td>Terlambat</td>
                @else
                <td>Tepat Waktu</td>
                @endif
            </tr>

            <div class="modal fade modalbox" id="modal-show" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Absen Pagi</h5>
                            <a href="javascript:;" data-dismiss="modal">Close</a>
                        </div>
                        <div class="modal-body">
                                <div class="form-group basic">
                                    <div class="input-wrapper text-center">
                                        <img class="img-fluid rounded" src="{{ asset('storage/stap/img/'. $tb->photo_masuk) }}" alt="">
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nama</label>
                                        <input id="cuty-id" type="hidden" name="cuty_id">
                                        <input type="text" class="form-control" id="name" value="{{ auth()->guard('stap')->user()->name }}" required=""><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Tanggal</label>
                                        <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($tb->tanggal)) }}" required=""><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Jam Masuk</label>
                                        <input type="text" class="form-control" value="{{ $tb->jam_masuk }}" required=""><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Lokasi Absen</label>
                                        <input type="text" class="form-control" value="{{ $tb->lat_long_masuk }}" required=""><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                                    </div>
                                    <div id="map"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <tr>
                <td colspan="8" class="text-center">
                    <div class="empty">
                        <div class="empty-img">
                            <svg  style="width: 96px; height: 96px" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12.983 8.978c3.955 -.182 7.017 -1.446 7.017 -2.978c0 -1.657 -3.582 -3 -8 -3c-1.661 0 -3.204 .19 -4.483 .515m-2.783 1.228c-.471 .382 -.734 .808 -.734 1.257c0 1.22 1.944 2.271 4.734 2.74"></path>
                                <path d="M4 6v6c0 1.657 3.582 3 8 3c.986 0 1.93 -.067 2.802 -.19m3.187 -.82c1.251 -.53 2.011 -1.228 2.011 -1.99v-6"></path>
                                <path d="M4 12v6c0 1.657 3.582 3 8 3c3.217 0 5.991 -.712 7.261 -1.74m.739 -3.26v-4"></path>
                                <line x1="3" y1="3" x2="21" y2="21"></line>
                            </svg>
                        </div>
                        <p class="empty-title">Tidak ada data yang tersedia</p>
                        <div class="empty-action">
                            <button onclick="loadData()" class="btn btn-primary">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                 </svg>
                                Refresh
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="dataTables_info" role="status" aria-live="polite">Showing {{ $table->firstItem() }} to {{ $table->lastItem() }} of {{ $table->total() }}entries</div>
        </div>
        {{ $table->links('vendor.pagination.index') }}
    </div>
</div>


