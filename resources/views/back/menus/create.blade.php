@extends('layouts.app')

@section('content')
@section('title', 'New Restorant')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7" style="margin-top: 0">
            <div class="card m-4">
                <div class="card-header create">
                    <h3>Create new menu</h3>

                </div>
                <div class="card-body">
                    <form action="{{route('menus-store')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Menu</label>
                            <input type="text" name="menu_title" class="form-control" placeholder="title" value="{{old('menu_title')}}">
                        </div>


                </div>
                <div class="mb-3" style="justify-content: center; display: flex">
                    <button type="submit" class="btn btn-outline-warning mt-4">Save</button>

                </div>
                @csrf

                </form>
            </div>
        </div>
    </div>

</div>
</div>

@endsection
