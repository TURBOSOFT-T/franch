<div>

    @include('components.alert')
    <form wire:submit.prevent="submitReview">
     
        <div class="rating-wrapper d-flex-center mb--40">
            Your Rating <span class="require">*</span>
             <div class="reating-inner ml--20">
                @for($i = 1; $i <= 5; $i++)
                    <a wire:click="setRating({{ $i }})" 
                       class="{{ $rate >= $i ? 'text-warning' : '' }}">
                        <i class="fal fa-star"></i>
                    </a>
                @endfor
            </div> 

        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Message</label>
                    <textarea wire:model.lazy="review" placeholder="   {!! \App\Helpers\TranslationHelper::TranslateText('Votre message') !!}"></textarea>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-submit">
                    <button type="submit" id="submit" class="axil-btn btn-bg-primary2 w-auto">   {!! \App\Helpers\TranslationHelper::TranslateText('Laissez votre commentaire') !!}</button>
                </div>
            </div>
        </div>
    </form>

</div>
