{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Contact | PETCARE
@endsection

{{-- Content of checkout --}}
@section('main-content')
<form action="{{route('payments.purchase')}}" method="post">
    @csrf
    <button>Purchase Paypal</button>
</form>
@endsection

@section('custom-scripts')

@endsection