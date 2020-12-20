{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Order finish | PETCARE
@endsection

{{-- Content of index --}}
@section('main-content')
<div id="contact-page" class="container">
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p id="flash-message" class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
    </div>
<h3>Order Service completed!</h3>
<p>We have sent you an email confirmation of your order. Please check your mailbox.</p>
<p>Thank you for your trust in our products.</p>
<p>If you need assistance, please call our hotline for assistance when needed:
    <br>
    TEL: 0339-522-221
</p>
</div>
@endsection