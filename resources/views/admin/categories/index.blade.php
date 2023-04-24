@extends('admin.layouts.main')

@section('seo-title')
<title>{{ __('All categories') }}  {{ config('website.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
@endsection

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file"></i></div>
                        {{ __('All categories') }}
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3"></div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    @include('admin.layouts.partials.flashmessages')
    <div class="card">
        <div class="card-header">List of all categories</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Priority</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>               
                    @if(count($categories) > 0)
                        @foreach($categories as $value)
                            <tr>
                                <td>{{ $value->priority }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    @if($value->active == 1)
                                        <a class="btn btn-sm btn-primary" href='{{ route("categories.status", ["category" => $value->id]) }}'>Active</a>
                                    @else
                                        <a class="btn btn-sm btn-warning" href='{{ route("categories.status", ["category" => $value->id]) }}'>Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a data-bs-placement="top" title="Change profile" class="btn btn-sm btn-success tooltip-custom" href='{{ route("categories.edit", ["category" => $value->id]) }}'>Edit</a>
                                        <a data-bs-toggle="modal" data-bs-placement="top" title="Delete category" data-bs-target="#deleteModal"  class="btn btn-sm btn-danger tooltip-custom" data-name="{{$value->name}}" data-href='{{ route("categories.delete", ["category" => $value->id]) }}'>Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
        <a type="button" class="btn btn-danger" id="delete-button-modal">Delete</a>
      </div>
    </div>
  </div>
</div>


@endsection


@section('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <!-- <script src="/templates/admin/js/datatables/datatables-simple-demo.js"></script> -->

    <script>
        window.addEventListener('DOMContentLoaded', event => {

            const datatablesSimple = document.getElementById('allDatatables');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple, {
                    columns: [
                        // {
                        //     select: 5,
                        //     sortable: false,
                        //     searchable: false
                        // },
                        {
                            select: 6,
                            sortable: false,
                            searchable: false
                        }
                    ],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/sr.json',
                    },
                });
            }
            
        });
    </script>

    <script>
        const deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const link = button.getAttribute('data-href');
                const categoryForDelete = button.getAttribute('data-name');
                // If necessary, you could initiate an AJAX request here
                // and then do the updating in a callback.
                //
                // Update the modal's content.
                const modalTitle = deleteModal.querySelector('.modal-title')
                const modalBody = deleteModal.querySelector('.modal-body')

                modalBody.textContent = "Are you sure that you want to delete category " + categoryForDelete + "?";

                const modalDeleteButton = deleteModal.querySelector('#delete-button-modal');
                // console.log(modalDeleteButton);
                modalDeleteButton.href = link;
            })


        $(function () {
            $('.tooltip-custom').tooltip();
            // Enable tooltips globally
            // var tooltipTriggerList = [].slice.call(document.querySelectorAll('.tooltip-custom]'));
            // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            //     return new bootstrap.Tooltip(tooltipTriggerEl);
            // });
        })



    </script>


@endsection

