@extends('admin.master')

@section('title', 'All Experts')

@section('content')
    <section>
        <div class="content pt-3">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">

                        @if (session('msg'))
                            <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                        @endif

                        <h1>All Experts</h1>
                        <a href="{{ route('admin.experts.create') }}"
                            class="btn btn-success">{{ __('Add New') }}</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>ID</th>
                                    <th>Expert Img</th>
                                    <th>Name</th>
                                    <th>Company Id&Name</th>
                                    <th>Expert Id&Name</th>
                                    <th>Hour Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($experts as $expert)
                                    <tr>
                                        <td>{{ $expert->id }}</td>
                                        @if ($expert->image)
                                            <td>
                                                <img class="img-circle img-bordered-sm" height="65" width="65"
                                                    src="{{ Storage::url($expert->image) }}" alt="expert image">
                                            </td>
                                        @else
                                            <td style="color:red;">No Pic</td>
                                        @endif

                                        <td>{{ $expert->name }}</td>
                                        @if ($expert->company_id != null)
                                            <td>{{ $expert->company->name }}</td>
                                        @else
                                            <td>There is no company</td>
                                        @endif
                                        <td>
                                            @php
                                                $foundExpert = false;
                                            @endphp

                                            @forelse ($users as $user)
                                                @if ($expert->doctor_id == $user->id && $user->type == 'doctor')
                                                    {{ $user->name }}
                                                    @php
                                                        $foundExpert = true;
                                                        break;
                                                    @endphp
                                                @endif
                                            @empty
                                            @endforelse

                                            @if (!$foundExpert)
                                                There is no Expert
                                            @endif
                                        </td>


                                        <td>{{ $expert->hour_price }}</td>
                                        <td>
                                            <a href="{{ route('admin.experts.edit', $expert) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> </a>
                                            <form class="d-inline"
                                                action="{{ route('admin.experts.destroy', $expert->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you sure!?')"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
