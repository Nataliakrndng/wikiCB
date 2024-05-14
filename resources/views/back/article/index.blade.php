@extends('back.layout.template')

@section('title', 'List Article')

@push('cssDataTables')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
@endpush

@section('content')

    <main class="p-4 -mt-6 sm:ml-56">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Article</h1>
        </div>

        <button class="btn btn-outline-dark mb-2"> <a href="{{ url('article/create')}}">Add </a> </button>

        <div class="swal" data-swal="{{session('success')}}"></div>

        <div class="p-4 border-2 shadow-inner shadow-md shadow-slate-500/40 sm:rounded-lg">

            <table class="table table-striped table-bordered table-secondary" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Publish Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="text-align: center">
                </tbody>
            </table>
        </div>
    </main>

@endsection

@push('jsDataTabless')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const swal = $('.swal').data('swal');
            if (swal) {
                Swal.fire({
                    'title': 'Success',
                    'text': swal,
                    'icon': 'success',
                })
            }

        function deleteArticle(e) {
            let id = e.getAttribute('data-id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                    if(result.value){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'DELETE',
                            url: '/article/' + id,
                            dataType: "json",
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: response.message,
                                    icon: 'success',
                            }).then ((result) => {
                                window.location.href= '/article';
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                }
            })
        }
    </script>

    <script>
       $(document).ready(function(){
        $('#dataTable').DataTable({
            processing: true,
            serverside: true,
            ajax: '{{ url()->current() }}',
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                },
                {
                    data: 'title',
                    name: 'title',
                },
                {
                    data: 'category_id',
                    name: 'category_id',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'publish_date',
                    name: 'publish_date',
                },
                {
                    data: 'action',
                    name: 'action',
                },
            ]
        })
       })
    </script>
@endpush
