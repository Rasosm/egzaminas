@extends('layouts.app')

@section('content')
@section('title', 'Restorant List')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3>All Menu</h3>
                </div>
                <div class="card-body flex">
                    <ul class="list-group">
                        @forelse($menus as $menu)
                        <li class="list-group-item">

                            <div id="{{ $menu['id'] }}" class="list-table d-flex" style="justify-content: space-between">


                                <div>
                                    <h5>{{$menu->title}}</h5>


                                    {{-- <div class="count">({{$restorant->restorantDishes()->count()}})
                                </div> --}}

                            </div>
                            @if(Auth::user()?->role == 'admin')

                            <div class="buttons mt-3" style="align-items: baseline">
                                <a href="{{route('menus-edit', $menu)}}" class="btn btn-outline-success">Edit</a>
                                <form action="{{route('menus-delete', $menu)}}" method="post">
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                            @endif
                </div>
                </li>
                @empty
                <li class="list-group-item">No restorants yet</li>
                @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
