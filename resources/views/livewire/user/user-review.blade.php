<div>
  <style>
    .text-lg {
      font-size: 2.5rem;
      text-transform: uppercase;
      font-weight: bold;
    }

    .review {
      padding: 30px 20px;
    }

  </style>

  <div class="container review">
    <div class="row">
      <div class="col-md-12">
        <div id="review_form_wrapper">
          <div id="review_form">
            <div id="respond" class="comment-respond">

              <div class="tab-content-item " id="review">
                @if (Session::has('rev_msg'))
                  <div class="alert alert-success">
                    <strong>{{ Session::get('rev_msg') }}</strong>
                  </div>
                @endif
                <div class="wrap-review-form">
                  <div id="comments">
                    <h2 class="woocommerce-Reviews-title">Add review for </span>
                    </h2>
                    <ol class="commentlist">
                      <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                        id="li-comment-20">
                        <div id="comment-20" class="comment_container">
                          <img alt="" src="{{ asset('assets/images/products') }}/{{ $orderItem->product->image }}"
                            height="80" width="80">
                          <div class="comment-text">
                            <p class="meta">
                              <strong class="woocommerce-review__author">{{ $orderItem->product->name }}</strong>
                            </p>
                          </div>
                        </div>
                      </li>
                    </ol>
                  </div><!-- #comments -->

                  <div id="review-form">
                    <form id="commentform" class="comment-form" wire:submit.prevent="addReview">
                      <div class="comment-form-rating">
                        <span>Your rating</span>
                        <p class="stars">
                          <label for="rated-1"></label>
                          <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                          <label for="rated-2"></label>
                          <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                          <label for="rated-3"></label>
                          <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                          <label for="rated-4"></label>
                          <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                          <label for="rated-5"></label>
                          <input type="radio" id="rated-5" name="rating" value="5" checked="checked"
                            wire:model="rating"><br>
                          @error('rating')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </p>
                      </div> <br>
                      <p class="comment-form-author">
                        <label for="author">Name <span class="required">*</span></label>
                        <input id="author" name="author" type="text" value="">
                      </p>
                      <p class="comment-form-email">
                        <label for="email">Email <span class="required">*</span></label>
                        <input id="email" name="email" type="email" value="">
                      </p>
                      <p class="comment-form-comment">
                        <label for="comment">Your review <span class="required">*</span>
                        </label>
                        <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                        @error('comment')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </p>
                      <p class="form-submit">
                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                      </p>
                    </form>
                  </div>

                </div><!-- .comment-respond-->
              </div><!-- #review_form -->
            </div><!-- #review_form_wrapper -->

          </div>
        </div>
      </div>
    </div>
  </div>
