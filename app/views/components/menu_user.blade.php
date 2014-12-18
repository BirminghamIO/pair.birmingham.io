<div>
    Hi, I'm {{ Auth::user()->name }}, but you can call me {{ Auth::user()->nick }}. <br>
    My e-mail adress is {{ Auth::user()->email }}.<br>
    Visit my website: {{ Auth::user()->www }}<br>
    <a href="{{ URL::to('logout') }}">Logout</a>
</div>