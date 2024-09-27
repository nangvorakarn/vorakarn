@extends('layouts.myapp')
@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i> </span>
                <span class="alert-text"><strong>Success!</strong>{{session('status')}} </span>
            </div>
        @endif
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col">
                            <h6>สินค้าของเรา ({{ $products->count() }} รายการ)</h6>
                        </div>
                        <div class="col-2">

                            <a href="{{ route('products.create') }}" class="btn btn-success px-3 py-2"><i class="fa fa-plus"></i> เพิ่มสินคา้</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ชื่อ</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ราคา</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">จ านวนคงเหลือ</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">เครื่องมือ
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $p)
                            <tr>
                                <td>
                                    <p class="text-xs px-4 font-weight-bold mb-0">{{$loop->index}}</p>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{$p->getImageUrl()}}" class="avatar avatar-sm me-3"
                                                 alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$p->name}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$p->productType->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{$p->price}}</p>
                                    <p class="text-xs text-secondary mb-0">บาท</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{$p->qty}}</p>
                                    <p class="text-xs text-secondary mb-0">ชิ้น</p>
                                </td>
                                <td class="align-middle">
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="btn btn-outline-success px-3 py-2"><i
                                                class="fa fa-pencil"></i> แก้ไข</a>
                                        <button type="submit" class="btn btn-outline-danger px-3 py-2"
                                                onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')"><i
                                                class="fa fa-trash"></i> ลบ</button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
