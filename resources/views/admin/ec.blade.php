@extends('layouts.app')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Permanent+Marker&display=swap');
    @page { size: landscape; }
</style>
@endsection

@section('content')
<section id="certificate-template">
    <div class="container pb-5" style="background: #fff;" id="main-container">
        <div class="row">
            <div class="col-md-12 pb-3 text-center" style="font-family: 'Ubuntu', sans-serif;">
                <h1>{{ $settings->site_title }}</h1>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4 pb-3 text-center">
                <img src="{{ $settings->site_logo->getUrl() }}" alt="{{ $settings->site_title }}" width="80" class="pb-2">
            </div>
            <div class="col-md-4 text-right">
                {{ qrCode(url('/employees/certificate/'.$team->id), 'svg', 100) }}
            </div>
            <div class="col-md-12 pb-4 text-center">
                <h2 style="font-family: 'Kaushan Script', cursive; font-size:35px;"><strong>Certificate of Experience<strong></h2>
                <h5 class="pt-2 text-secondary"><strong>REF: EMP-{{ $team->id }}<strong></h5>
            </div>
            <div class="col-md-12 text-center">
                <p style="font-weight: 500; line-height:35px; font-size:16px;">This is to certify that Mr./Ms. <strong style="text-decoration: underline;">{{ $team->name }}</strong> son / daughter of <strong>{{ $team->father_name }}</strong> has worked as <strong style="text-decoration: underline;">{{ $team->position }}</strong> in our company from <strong style="text-decoration: underline;">{{ $team->started_from }}</strong> to <strong style="text-decoration: underline;">{{ $team->ended_at }}</strong>
                    During his working period we found him honest, hardworking, and dedicated employee with the professional attitude and very good job knowledge . He is amible in nature and character is well . <br />
                    We Wish him every success in life .
                </p>
            </div>
            <div class="col-md-12">
                <h5 class="pb-3 ">Your Sincerly,</h5>
                <h5 class="pt-4 text-left">
                    <hr style="width:20%;" class="float-left">
                </h5><br />
                <h5 class="pb-2 pt-3" style="text-decoration: underline">Sukra Raj Pokhrel</h5>
                <h5>Managing Director</h5>
            </div>
        </div>
    </div>
</section>

@endsection



@section('scripts')
<script>
    var printable = document.getElementById('main-container').innerHTML;
    var originalContent = document.body.innerHTML;

    document.body.innerHTML = printable;
    window.print();
    document.body.innerHTML = originalContent;
</script>
@endsection
