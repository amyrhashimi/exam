<div>
    <div class="container">

        <div class="d-flex justify-content-end">
            <button wire:click="comeBack()" type="button" class="btn btn-sm btn-light-primary btn-hover-scale btn-color-primary btn-active-primary btn-active-color-wihte ">@lang('records.back')</button>
        </div>

        @foreach( $questions as $index => $question )
            <livewire:portal.records.single-question :index="$index" :question="$question" />
        @endforeach

    </div>
</div>
