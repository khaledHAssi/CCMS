@extends('user_dash.companyManager.master')

@section('title', 'Companies')

@section('content')
  <!-- DataTables -->
<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
            @endif

                        <div class="container-xxl py-5 ">
                            <div class="container">
                                <div class="row g-4 align-items-end mb-4 flex">

                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                       {{-- <img class="img-circle img-bordered-sm" height="65" width="65"
                                src="{{ Storage::url($user->image) }}" alt="user image"> --}}
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp details" data-wow-delay="0.3s">
                                        <div style="display:flex;">
                                            <h4 - style="margin-left:0px;">Name:</h4>
                                            <h5 style="margin-left:0px;margin-top: 1.5% ">
                                                {{-- {{$user->name}} --}}
                                            </h5>
                                        </div>
                                        <div style="display:flex;">
                                            <h4 - style="margin-left:0px;">Email:</h4>
                                            <h5 style="margin-left:0px;margin-top: 1.5% ">
                                                {{-- {{$user->company_nameOrId}} --}}
                                            </h5>
                                        </div>
                                        <div style="display:flex;">
                                            <h4 - style="margin-left:0px;">phone: </h4>
                                            <h5 style="margin-left:0px;margin-top: 1.5% ">
                                                {{-- {{$user->phone}} --}}

                                            </h5>
                                        </div>


                                        </div>
                                    </div>
                                </div>
                                </div>



                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

<!-- DataTables -->
{{-- <script src="{{asset('adminassets/plugins/datatables/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{asset('adminassets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
{{-- <script src="{{asset('adminassets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script> --}}
{{-- <script src="{{asset('adminassets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> --}}

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop
