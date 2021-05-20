<div class="wrap-icon-section minicart">
  <a href="#" class="link-direction">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <div class="left-info">
      @if (Cart::instance('cart')->count() > 1)
        <span class="index">{{ Cart::instance('cart')->count() }} items</span>
      @elseif (Cart::instance('cart')->count() > 0)
        <span class="index">{{ Cart::instance('cart')->count() }} item</span>
      @endif
      <span class="title">CART</span>
    </div>
  </a>
</div>
