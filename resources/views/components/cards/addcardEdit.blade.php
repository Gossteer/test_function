<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-link" wire:click="clickNext1()"></button>
    <button class="fas fa-times" wire:click="click_chow()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <textarea wire:model.defer="cardadd.text" maxlength="255" class="texForTexarea @error('cardadd.text') {{"error"}} @enderror" title=" @error('cardadd.text') {{$message}} @enderror "  style="{{$attributes['backgroundscrollBar']}}"></textarea>
    </div>
    <div class="articles__footer">
        <div  class="select  @error('cardadd.tag_id') {{"error"}} @enderror"  title="@error('cardadd.tag_id') {{$message}} @enderror" id="selectcardadd" style="{{$attributes['backgroundscrollBar']}}">
            <div class="select__head" id="selectheadcardadd">{{$cardadd->tag->tag}}</div>
            <ul class="select__list" id="selectlistcardadd" style="display: none;">
                @foreach ($selectTags as $selectTag)
                    <li x-data x-on:click="$wire.set('cardadd.tag_id', {{$selectTag->id}})" class="select__item" id="selectlistitemcardadd">{{$selectTag->tag}}</li>
                @endforeach
            </ul>
        </div>
        <time title="{{$attributes['timeCreate']}}">{{$attributes['dateCreate']}}</time>
    </div>
</div>



{{--
     Сделать валидацию данных
     Проработать двойной клик и последующую смену стилей
    --}}

    <script>
        jQuery(($) => {
            $('#selectcardadd').on('click', '#selectheadcardadd', function () {
                if ($(this).hasClass('open')) {
                    $(this).removeClass('open');
                    $(this).next().fadeOut();
                } else {
                    $('#selectheadcardadd').removeClass('open');
                    $('#selectlistcardadd').fadeOut();
                    $(this).addClass('open');
                    $(this).next().fadeIn();
                }
            });

            $('#selectcardadd').on('click', '#selectlistitemcardadd', function () {
                $('#selectheadcardadd').removeClass('open');
                $(this).parent().fadeOut();
                $(this).parent().prev().text($(this).text());
                // $(this).parent().prev().prev().val($(this).attr("idselect"));
                // $(this).parent().prev().prev().text($(this).attr("idselect"));
            });

            $(document).click(function (e) {
                if (!$(e.target).closest('#selectcardadd').length) {
                    $('#selectheadcardadd').removeClass('open');
                    $('#selectlistcardadd').fadeOut();
                }
            });
        });
    </script>

