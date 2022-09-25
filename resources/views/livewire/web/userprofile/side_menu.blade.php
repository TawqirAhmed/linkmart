

<a href="{{ route('user.user_profile', ['id'=>Auth::user()->id]) }}" class="list-group-item active d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a>

<br>

<a href="{{ route('user.user_orders', ['id'=>Auth::user()->id]) }}" class="list-group-item active d-flex justify-content-between align-items-center"> Orders <i class='bx bx-shopping-bag fs-5'></i></a>