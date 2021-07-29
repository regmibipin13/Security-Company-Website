@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings1['total_number']) }}</div>
                                    <div>{{ $settings1['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings2['total_number']) }}</div>
                                    <div>{{ $settings2['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Generate QR
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('/admin') }}" method="GET">
                                        <div class="form-group">
                                            <label for="path">Redirect To</label>
                                            <input type="text" class="form-control" name="url" class="Paste the url of the page" value="{{ request()->url }}">
                                        </div>
                                        <button type="submit" class="btn btn-success">Generate</button>
                                    </form>
                                </div>
                                @if(request()->has('url') && request()->url !== '' && request()->url !== null)
                                <div class="card-body">
                                    <div id="printable">
                                        {{ qrCode(request()->url, 'svg') }}
                                    </div>
                                    <br />
                                    <button class="btn btn-primary" onclick="printDiv('printable');">Print QR</button>
                                    <a class="btn btn-primary" href="data:image/png;base64, {!! base64_encode(qrCode(request()->url, 'png')) !!} " download>Download QR</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    function printDiv(divName = null) {
        var printableContents = document.getElementById(divName).innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = printableContents;

        window.print();

        document.body.innerHTML = originalContent;

    }
</script>
@endsection
