@extends('layouts.app')

@section('content')
@section('title', 'Edit Restorant')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7" style="margin-top: 0">
            <div class="card m-4">
                <div class="card-header create">
                    <h3>Edit Menu</h3>

                </div>
                <div class="card-body">
                    <form action="{{route('menus-update', $menu)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Menu</label>
                            <input type="text" name="menu_title" class="form-control" value="{{$menu->title}}">

                        </div>





                        <div class="mb-3" style="justify-content: center; display: flex">
                            <button type="submit" class="btn btn-outline-warning mt-4">Save</button>

                        </div>

                        @csrf
                        @method('put')

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
