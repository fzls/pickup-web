@extends('layouts.app')

@section('script')
    <script>
        let get_non_array_query = function (variable) {
            let query = window.location.search.substring(1);
            let vars  = query.split('&');
            for (let i = 0; i < vars.length; i++) {
                let pair = vars[i].split('=');
                if (decodeURIComponent(pair[0]) == variable) {
                    return decodeURIComponent(pair[1]);
                }
            }
            console.log('Query variable %s not found', variable);
        };

        axios.post(AUTH_ISSUE_TOKEN_URL, {
            grant_type   : AUTH_GRANT_TYPE,
            client_id    : AUTH_CLIENT_ID,
            client_secret: AUTH_CLIENT_SECRET,
            redirect_uri : AUTH_CALLBACK_URI,
            code         : get_non_array_query('code')
        }).then(function (response) {
            let jwt          = response.data.access_token;
            let sections     = jwt.split('.');
            let jwt_header   = atob(sections[0]);
            let access_token = JSON.parse(jwt_header)['jti'];
            window.localStorage.setItem(AUTH_TOKEN_LOCAL_STORAGE_KEY, access_token);
            window.location.replace('/');
        });
    </script>
@endsection