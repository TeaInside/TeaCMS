<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="Tea CMS"/>        
        <title>{{ trans('login.title') }}</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/css/tea.css"/>
        <!-- <link rel="stylesheet" href="/css/signin.css"/> -->
        <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/login.js"></script>
    </head>
    <body class="text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-xs-12 col-md-6 h-100 align-self-center" style="background-color:red">
                        <p class="login_title text-center font-weight-bold color_primary">{{ env('APP_NAME') }}</p>
                        <p class="text-center font-weight-bold color_black ls-1">{{ trans('login.welcome')}}</p>
                        <p class="text-center font-weight-bold color_grayBlack ls-1">{{ trans('login.sign_in_info')}}</p>
                        <form class="form-signin" action="javascript:void(0);" id="form">
                            <img class="mb-4" src="/logo.png" alt="" width="300" height="100">
                            <h1 class="h3 mb-3 font-weight-normal">{{ trans('login.title') }}</h1>
                            <label for="email" class="sr-only">{{ trans('login.email') }}</label>
                            <input type="text" id="email" class="form-control" placeholder="{{ trans('login.email') }}" required autofocus/>
                            <label for="password" class="sr-only">{{ trans('login.password') }}</label>
                            <input type="password" id="password" class="form-control" placeholder="{{ trans('login.password') }}" required/>
                            <input type="hidden" name="_token" id="_token"/>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"/> {{ trans('login.remember_me') }}
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">{{ trans('login.title') }}</button>
                            <p class="mt-5 mb-3 text-muted">&copy; {{ date("Y") }}</p>
                        </form>
                    </div>
                    <div class="col-xs-12 col-md-6" style="background-color:#000;">
                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript">
            let st = new login;
                st.getToken();
                st.listen();
        </script>
    </body>
</html>
