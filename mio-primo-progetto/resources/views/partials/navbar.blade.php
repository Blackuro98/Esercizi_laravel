<nav class="d-flex gap-3 align-items-center">
    <a href="/" class="link-primary text-decoration-none">Home</a>
    
    @auth
        <a href="{{ url('/projects') }}" class="link-primary text-decoration-none">Progetti</a>
    @endauth

    <span class="text-secondary mx-1">|</span>

    @auth
        <span class="fw-bold">Ciao, {{ Auth::user()->name }}</span>
        <span class="badge bg-secondary">{{ Auth::user()->role ?? 'User' }}</span>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        
        <a href="#" class="link-danger text-decoration-none" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           Logout
        </a>

    @else
        <a href="{{ route('login') }}" class="link-primary text-decoration-none">Accedi</a>
        
        {{-- <a href="{{ route('register') }}" class="link-primary text-decoration-none">Registrati</a> --}}
    @endauth
</nav>