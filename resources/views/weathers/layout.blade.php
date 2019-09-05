<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Weather')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
        <style>
            .is-complete {
                text-decoration:line-through;
            }
        </style>
    </head>
    <body>
    	<div class="container">
    		@yield('content')
    	</div>
    </body>
</html>
