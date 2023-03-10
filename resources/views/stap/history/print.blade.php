@extends('layouts.stap.print')
@section('content')
<div class="card">
    <div class="card">
        <div class="table-responsive" id="x-data-table">
            
        </div>
    </div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
    $(document).ready(function() {
        loadData();

    });
    async function loadData() {
        var param = {
            method: 'GET',
            url: '{{ url()->full() }}',
        }
        
        await transAjax(param).then(function(result) {
            $('#x-data-table').html(result)
        }).catch((err) => {
            console.log('Internal Server Error!');
        });
        window.print();
    }
    </script>
@endpush