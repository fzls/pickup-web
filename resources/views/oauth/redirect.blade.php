@extends('layouts.app')

@section('script')
    <script>
        let params = {
            client_id    : AUTH_CLIENT_ID,
            redirect_uri : AUTH_CALLBACK_URI, //uri for oauth server to redirect, which is the callback in our server
            response_type: AUTH_RESPONSE_TYPE,
            scope        : AUTH_SCOPE
        };
        window.location.replace(AUTH_AUTHORIZE_URL + '/?' + $.param(params));
    </script>
@endsection