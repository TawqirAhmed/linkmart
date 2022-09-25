<div>
    <li class="nav-item">
        <a href="{{ route('web.product_wishlist') }}" class="nav-link position-relative cart-link"> 
            <span class="alert-count">
                {{ Cart::instance('wishlist')->count() }}
            </span>
            <i class='bx bx-heart'></i>
        </a>
    </li>
</div>
