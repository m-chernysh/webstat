@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="/browser">Browser</a></li>
                    <li><a href="/os">OS</a></li>
                    <li><a href="/geo">Geo</a></li>
                    <li><a href="/referer">Referer</a></li>
                </ul>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <h1 class="page-header">Dashboard</h1>

                <div class="row placeholders">
                    <a href="/browser" class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>Browsers</h4>
                        <span class="text-muted">Something else</span>
                    </a>
                    <a href="/os" class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>OSystems</h4>
                        <span class="text-muted">Something else</span>
                    </a>
                    <a href="/geo" class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>GeoIP</h4>
                        <span class="text-muted">Something else</span>
                    </a>
                    <a href="/referer" class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>Referer</h4>
                        <span class="text-muted">Something else</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
