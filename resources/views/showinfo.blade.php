@extends('layouts.myapp')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">เกี่ยวกับร้าน ชอบช้อป</p>
                    </div>
                </div>
                <div class="card-body">
                    <div>

                        <ul>
                            <li>เจ้าของร้าน : {{ $name }}</li>
                            <li>เบอร์โทรศัพท์ : {{ $phone }}</li>
                            <li>ที่ต้งัร้าน : {{ $address }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
