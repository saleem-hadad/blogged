<li class="nav-item">
    <a class="nav-link" href="/">
        <i class="ni ni-planet"></i> Site Page
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/blog">
        <i class="ni ni-book-bookmark"></i> Blog Page
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#" onclick="document.getElementById('logoutForm').submit();">
        <i class="ni ni-button-power"></i> Logout
    </a>
</li>
<form id="logoutForm" action="/logout" method="POST">
    {{ csrf_field() }}
</form>