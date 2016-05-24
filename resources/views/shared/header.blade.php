  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                DEMOCURD
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
            @if (!Auth::guest())
             <li><a href="{{ url('/addinfo') }}">Add Info</a></li>
             @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
  
<div class="row">
    <div class="col-lg-8">
       
    </div>

    <div class="col-lg-4">
        {!! Form::open(array('url' => 'search', 'class' => 'form', 'method' => 'POST')) !!}
        <div class="input-group">
            {!! Form::text('entry', null, array('id' => 'search',
             'class'=>'form-control', 
             'placeholder'=>'Search for...',
             'onkeyup' => 'chk_search()')) !!}

             <span class="input-group-btn">
                {!! Form::button('GO!', array( 'id' => 'submit_search',
                   'class'=>'btn btn-default', 
                   'type'=>'submit',
                   'disabled' => 'true')) !!}
               </span>                                      
           </div>
           {!! Form::close() !!} 
       </div>
   </div>
     </div>
</nav>
