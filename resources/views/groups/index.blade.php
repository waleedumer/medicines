@extends('layouts.app', ['title' => __('User Management')])

@section('content')
@include('layouts.headers.cards')
    <div class="container-fluid mt--7 ">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Groups') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button data-toggle="modal" data-target="#addGroup" class="btn btn-sm btn-primary">{{ __('Add Group') }}</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Discount Rate') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->discount_rate }}%</td>
                                        <td>{{ $group->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('groups.destroy', $group) }}" method="post">
                                                            @csrf
                                                            
                                                            <a class="dropdown-item" href="{{ route('groups.edit', $group) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $groups->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
    <div class="modal fade" tabindex="-1" id="addGroup" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                        <form method="post" action="{{ route('groups.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Group information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Name') }}</label>
                                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}"  required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('% Discount Rate') }}</label>
                                            <input type="text" name="discount" class="form-control" placeholder="{{ __('Discount Rate') }}"  required>
                                        </div>
                                    </div>
                                    <div class="text-center col-md-12">
                                        <button type="submit" class="btn btn-success w-100">{{ __('Save') }}</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
