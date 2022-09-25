<div class="card bg-transparent rounded-0 shadow-none">
    <div class="card-body">
        <div class="steps steps-light">
            <a class="step-item active" href="{{ route('web.product_cart') }}">
                <div class="step-progress"><span class="step-count">1</span>
                </div>
                <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
            </a>
            <a class="step-item active current" href="{{ route('user.checkOutDetails') }}">
                <div class="step-progress"><span class="step-count">2</span>
                </div>
                <div class="step-label"><i class='bx bx-user-circle'></i>Details</div>
            </a>
            <a class="step-item" href="#">
                <div class="step-progress"><span class="step-count">3</span>
                </div>
                <div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
            </a>
            <a class="step-item" href="checkout-review.html">
                <div class="step-progress"><span class="step-count">4</span>
                </div>
                <div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
            </a>
        </div>
    </div>
</div>